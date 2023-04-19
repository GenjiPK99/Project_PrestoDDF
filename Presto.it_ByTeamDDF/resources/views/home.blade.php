<x-layout>
  
  
  {{-- INIZIO HEADER --}}

@if(!(isset($search)))
  <div class="container-fluid masthead" style="background-image: url(media/HeaderBg.png);">
    <div class="row pt-5 justify-content-center">
      <div class="col-12 col-sm-4 d-flex justify-content-end">
        <img class="imgbg-custom" src="media\Phone-Girl.png" alt="">
        <a class="text-decoration-none" href="{{ route('announcement.create') }}">
        <button class="button-66 btnAnnuncio d-sm-none">{{__('ui.mastheadbtn')}}</button>
        </a>
      </div>
      
      <div class="d-none d-sm-block col-sm-6 d-flex flex-column align-items-start">
        <div class="text-center">
          <h1 class="display-1 text-center h1-custom">Presto<span class="bg-custom">.it</span></h1>
          <p class="fs-1 p-custom">{{__('ui.masthead')}}</p>
          <a class="text-decoration-none" href="{{ route('announcement.create') }}">
            <button class="button-66 mx-auto">{{__('ui.mastheadbtn')}}</button>
          </a>
       </div>
      </div>
    </div>
  </div>
@endif
  

  {{-- FINE HEADER --}}

  <div class="container py-3 mt-5 ">
    <div class="row align-item-center">
      <div class="col-12 text-center">
        @if(session()->has('message'))
        <div class="mt-1 mb-2  alert alert-primary">
          {{session('message')}}
        </div>
        @endif
        @if(!(isset($search)))
        <h1>{{__('ui.allAnnouncements')}}</h1>
        @else
        <h1>{{__('ui.searchAnnouncements')}}</h1>
        @endif
      </div>
    </div>
  </div>
  
  
  
  {{-- SEZIONE ANNUNCI --}}
  <section>
    <div class="container">
      <div class="row justify-content-center text-center">
        @foreach($announcements as $announcement)
        <div class="col-10 col-md-3 my-3">
          <div class="card mx-3">
            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,400) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="...">
            <div class="card-body">
              <h5 class="card-title fs-4 fw-bold">{{substr($announcement->title , 0 , 17)}}</h5>
              <p class="card-text">{{substr($announcement->body , 0 , 25)}}...</p>
            </div>
            <ul class="list-group list-group-flush align-items-center d-flex">
              <a class="btn btn-primary btn-custom-display shadow" href="{{route('announcement.show' , compact('announcement'))}}" alt="...">{{__('ui.view')}}</a>
              <a class="my-2 pt-2 text-decoration-none btn-custom-category text-dark" href="{{ route('categoryShow' , ['category'=> $announcement->category]) }}"><li class="list-group-item">
                {{__('ui.allCategory2')}} {{$announcement->category->name}}</li></a>
                <li class="list-group-item">{{ $announcement->price }}€</li>
              </ul>
              <div class="card-body">
                <li class="list-group-item"><i class="card-footer ">{{__('ui.publishedon')}} {{ $announcement->created_at->format('d/m/Y') }}</i></li>
              </div>
            </div>
          </div>
          @endforeach
          {{$announcements->links()}}
        </div>
      </div>
    </section>
    {{-- FINE SEZIONE ANNUNCI --}}
    
    
  </x-layout>