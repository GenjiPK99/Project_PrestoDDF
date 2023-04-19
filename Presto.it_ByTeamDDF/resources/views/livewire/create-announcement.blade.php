
<div class="container py-3">
    <div class="row justify-content-center mt-5 ">
        <div class="col-12 col-md-9">
            <div class="card border-0 rounded-3 shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h1>{{__('ui.livewireannouncement')}}</h1>
                        @if(session()->has('message'))
                        <div class="my-2 alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif
                    </div>


                    <form wire:submit.prevent="store">
                        @csrf

                        <!-- Image Input -->
                        <div class="mt-3">
                            <input class="form-control shadow @error('temporary_images.*') is-invalid @enderror" wire:model='temporary_images' type="file" name="images" multiple placeholder="Img"/>
                            @error('temporary_images.*')
                            <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        @if(!@empty($images))
                        <div class="container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-12 col-md-12">
                                    <p>{{__('ui.photopreview')}}</p>
                                    <div class="row border border-4 border-primary rounded shadow py-4">
                                        @foreach($images as $key => $image)
                                        <div class="col-12 col-md-6 my-3">
                                            <div class="img-preview mx-auto shadow rounded">
                                                <img class="img-fluid" src="{{$image->temporaryUrl()}}" alt="">
                                            </div>
                                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.deleteimg')}}</button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    

                        <!-- Name Input -->
                        <div class="mt-3">
                            <label for="title">{{__('ui.announcementtitle')}}</label>
                            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            {{$message}}
                            @enderror
                        </div>
                        
                        <!-- Descrizione Input -->
                        <div class="mt-3">
                            <label for="body">{{__('ui.description')}}</label>
                            <textarea wire:model="body" type="text" class="form-control @error('body') is-invalid @enderror"></textarea>
                            @error('body')
                            {{$message}}
                            @enderror
                        </div>
                        
                        <!-- Price Input -->
                        <div class="mt-3">
                            <label for="price">{{__('ui.price')}}</label>
                            <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                            {{$message}}
                            @enderror
                        </div>
                        
                        <!-- Category Input -->
                        
                        <div class="mt-3">
                            <label for="category">{{__('ui.category')}}</label>
                            <select wire:model.defer="category" id="category" class="form-control">
                                <option value="">{{__('ui.selectcategory')}}</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="container mt-3 mb-4">
                            <div class="row ">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary shadow py-2" >{{__('ui.createannouncement')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
