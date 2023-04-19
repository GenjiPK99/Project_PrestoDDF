<x-layout>

<div id="container">
  <div class="row text-center ">
    <div class="col-12 col-md-12">
      <h1 class="fw-bold  display-3 mt-5" style="color:#065dd8;">{{$announcement->title}}</h1>
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        @if($announcement->images)
        <div class="carousel-inner ">
        @foreach($announcement->images as $image)
          <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="3500">
            <div class="w-100 d-flex justify-content-center">
              <img src="{{ $image->getUrl(400 , 400) }}" class="p-3 rounded mx-auto" alt="..." >
            </div>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          @endforeach 
      </div>
        @else
        <div class="carousel-item" data-bs-interval="3500">
          <img src="https://picsum.photos/600/200" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/600/200" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      @endif
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      <h4 class="fs-1 fw-bold text-center mt-3">{{__('ui.descriptionAnnouncement')}}</h4>
      <p class="mt-3 ms-5 me-5 text-center">{{$announcement->body}}</p>
      <a class="card-link shadow btn btn-primary" href="{{ route('categoryShow' , ['category'=>    $announcement->category]) }}">
          <li class="list-group-item">
              {{__('ui.allCategory2')}} {{$announcement->category->name}}
          </li>
      </a>
      <h2 class="list-group-item py-2">{{ $announcement->price }}€ </h2>
      <h3 class="list-group-item"><p class="sfondocustom">{{__('ui.publishedon')}} {{ $announcement->created_at->format('d/m/Y') }}</h3>
      <h3>{{__('ui.createby')}} {{$announcement->user->name}}</h3>
    </div>
  </div>
</div>  

</x-layout>