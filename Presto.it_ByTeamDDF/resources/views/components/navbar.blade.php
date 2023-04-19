<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}"><img class="custom-img " src="{{ url('media/PRESTO.IT.png') }}" alt="logopresto"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link text-light active fs-5" aria-current="page" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link text-light dropdown-toggle fs-5" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.allCategory')}}
        </a>
        <ul class="dropdown-menu">
          @foreach ($categories as $category)
          <li><a class="dropdown-item" href="{{ route('categoryShow' , compact ('category')) }}">
            {{ ($category->name) }}</a>
          </li>
          <hr class="dropdown-divider @if($loop->last) d-none @endif">
          @endforeach
        </ul>
      </li>
        @auth
        <li class="nav-item">
          <a class="nav-link text-light fs-5" href="{{ route('announcement.create') }}">{{__('ui.create.Announcements')}}</a>
        </li>
        @endauth
    </ul>
        <form class="d-flex mx-auto searchbar-custom" role="search" method="GET" action="{{ route('announcements.search') }}" >
          <input name="searched" class="form-control me-2" type="search" placeholder="{{__('ui.searchAmongTheAnnouncements')}}" aria-label="Cerca">
          <button class="btn btn-outline-light" type="submit">{{__('ui.search')}}</button>
        </form>
        <ul class="navbar-nav me-5">
          @auth
      <li class="nav-item dropdown mt-5 mt-lg-0">
          @if(Auth::user()->is_revisor)
          <span class="position-absolute top-0 start-custom translate-middle badge rounded-pill bg-danger text-light">   
            {{  App\Models\Announcement::toBeRevisionedCount() }} 
            <span class="visually-hidden">
              Unread messages
            </span>
          </span>
          @endif
            <a class="nav-link text-light dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
              <i class="fa-solid fa-user"></i> {{__('ui.welcome')}} {{Auth::user()->name}}
            </a>
        <ul class="dropdown-menu mb-3">
          @if(Auth::user()->is_revisor)
          <li class="nav-item position-relative">
            <a class="nav-link text-black" aria-current="page" 
              href="{{ route('revisor.indexrevisor') }}">  {{__('ui.revisorzone')}}
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-light"> {{ App\Models\Announcement::toBeRevisionedCount() }} <span class="visually-hidden">Unread messages</span>
              </span>
            </a>
          </li>
          @endif
          <li><hr class="dropdown-divider"></li>
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="btn dropdown-item"type="submit">Log-out</button>
          </form>
        </ul>
      </li>
      @endauth
      @guest
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle textcolor text-light fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{__('ui.login/register')}}
        </a>
        <ul class="dropdown-menu mb-3">
          <li><a class="dropdown-item" href="{{route('login')}}">{{__('ui.login')}}</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.register')}}</a></li>
        </ul>
      </li>
      @endguest
    </ul>
    <div class="dropdown me-3">
      <button class="btn btn-outline-light dropdown-toggle" data-bs-display="static" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-globe"></i>
      </button>
      <ul class="dropdown-menu dropcust">
        <li><x-_locale lang="it"/></li>
        <li><hr class="dropdown-divider" ></li>
        <li><x-_locale lang="en"/></li>
        <li><hr class="dropdown-divider" ></li>
        <li><x-_locale lang="es"/></li>
      </ul>
    </div>
  </div>
</div>
</nav>