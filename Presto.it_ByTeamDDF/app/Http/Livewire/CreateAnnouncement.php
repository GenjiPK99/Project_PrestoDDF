<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\AddWatermark;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\CreateAnnouncement;



class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $validated;
    public $temporary_images;
    public $images=[];
    public $image;
    public $form_id;
    public $announcement;


    protected $rules = [
        'title' => 'required|min:6|max:20',
        'body' => 'required|min:8',
        'price' => 'required|numeric',
        'category'=> 'required',
        'images.*'=> 'image|max:10240',
        'temporary_images.*'=> 'image|max:10240',
    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto.',
        'min' => 'Il campo :attribute è troppo corto.',
        'max' => 'Il campo :attribute è troppo lungo.',
        'numeric' => 'Il campo :attribute deve essere un numero.',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image'=>'I File devono essere immagini',
        'temporary_images.*.max'=>'L\'immagine dev\'essere massimo di 10MB.',
        'images.image' => 'Il File deve essere un immagine',
        'images.max' => 'L\'immagine dev\'essere massimo di 10MB.',
    ];

    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*'=> 'image|max:10240',
        ]))
        {
            foreach($this->temporary_images as $image){
                $this->images[]= $image;
            }
        }
    }

    public function removeImage($key)
    {
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(){

        $category= Category::find($this->category);
        $user_id= Auth::user()->id;

        
        $this->validate();
        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());

        if(count($this->images)){
            foreach ($this->images as $image){

                // $this->announcement->images()->create(['path'=>$image->store('images' , 'public')]);

                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store( $newFileName , 'public')]);

                RemoveFaces::withChain([

                    new ResizeImage($newImage->path , 400 , 400),
                    new AddWatermark($newImage->id),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch(($newImage->id));
            }
            // File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        

        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();
        return redirect()->to(route('home'))->with('message' , 'Annuncio inserito con successo , sarà pubblicato dopo la sua revisione!');
        $this->cleanForm();
    }

    public function cleanForm(){
        $this->title='';
        $this->body='';
        $this->price='';
        $this->category='';
        $this->image='';
        $this->images = [];
        $this->tempory_images =[];
        $this->form_id= rand();
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
