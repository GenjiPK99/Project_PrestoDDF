<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\PublicController;

class PublicController extends Controller
{
    public function home(){
        // PER ORDINARE GLI ANNUNCI IN ORDINE DI DATA, DAL PIU' RECENTE.
        // PER ORDINARE DAL PIU' VECCHIO AL PIU' RECENTE USARE ORDERBY ('DESC').
        
        $announcements= Announcement::where('is_accepted' , true)->orderBy('created_at' , 'DESC')->paginate(8);

        return view('home',compact('announcements'));
    }

    public function searchAnnouncement(Request $request){
        $search=true;
        $announcements = Announcement::search($request->searched)->where('is_accepted' , true)->paginate(8);
        return view('home' , compact('announcements') , ['search' => $search]);
    }
     
    public function categoryShow(Category $category){
        return view('categoryShow' , compact('category'));
    }

    public function ourTeam(){
        return view('ourTeam');
    }

    // public function contacts(){
    //     return view('contacts');
    // }
    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}

