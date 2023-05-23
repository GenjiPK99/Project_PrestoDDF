<x-layout>
  
  <div class="container-fluid p-3 bg-gradient bg-primary shadow b-3">
    <div class="row justify-content-center text-center">
      <div class="col-12 col-md-5 ">
        <h1 class="display-5 text-light ">{{$announcement_to_check ? __('ui.revisoryep') : __('ui.revisornot')}}</h1>
      </div>
    </div>
  </div>
  

  
  <div class="container mt-5 altezzarevis">
  @if($announcement_to_check)
    <div class="row text-center">
      <div class="col-12">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          @if(@$announcement_to_check->images)
          <div class="carousel-inner ">
            @foreach($announcement_to_check->images as $image)
            <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="3500">
              <div class="w-100 d-flex justify-content-center">
                <img src="{{ $image->getUrl(400 , 400) }}" class="p-3 rounded mx-auto" alt="..." >
              </div>
              <div class="col-md-12 border-end">
                <h5 class="tc-accient mt-3 text-center">Tags</h5>
                <div class="p-2">
                  @if($image->labels)
                    @foreach($image->labels as $label)
                    <p class="d-inline">{{$label}},</p>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="col-12 col-md-12 ">
                <div class="card-body">
                  <h5 class="tc-accent"> {{__('ui.revisorimg')}}</h5>
                  <p>{{__('ui.revisorAdult')}}<span class="{{$image->adult}}"></span></p>
                  <p>{{__('ui.revisorProof')}}<span class="{{$image->spoof}}"></span></p>
                  <p>{{__('ui.revisorMedical')}}<span class="{{$image->medical}}"></span></p>
                  <p>{{__('ui.revisorViolence')}}<span class="{{$image->violence}}"></span></p>
                  <p>{{__('ui.revisorRace')}}<span class="{{$image->racy}}"></span></p>
                </div>
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
        </div>
        <div class="container py-4">
          <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
              <ul class="list-group">
                <li class="list-group-item mb-3 fs-5 fw-bold">Titolo: {{$announcement_to_check->title}}</li>
                <li class="list-group-item mb-3">Descrizione: {{$announcement_to_check->body}}</li>
                <li class="list-group-item mb-3">{{__('ui.publishedon')}} {{$announcement_to_check->created_at->format('d/m/Y')}}</li>
              </ul>
              <div class="d-flex justify-content-between">
                <form action="{{route('revisor.accept_announcement' , ['announcement'=>$announcement_to_check])}}" method="POST">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn btn-success shadow">ACCETTA</button>
                </form>
                <form action = "{{route('revisor.reject_announcement' , ['announcement' => $announcement_to_check])}}" method="POST">        
                  @csrf       
                  @method('PATCH')       
                  <button type="submit" class="btn btn-danger shadow">RIFIUTA
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endif
</div>
</x-layout>