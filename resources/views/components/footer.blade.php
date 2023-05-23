<section class="mt-5">
    <!-- Footer -->
    <footer class="text-center text-white " style="background-color: #376da0;">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: CTA -->
        @auth
        @if(!Auth::user()->is_revisor)
          <section class="">
          <p class="d-flex justify-content-center align-items-center">
            <span class="me-3">{{__('ui.footerzone')}}</span>
            <a href="{{route('become.revisor')}}">
                <button type="button" class="btn btn-outline-light btn-rounded">
                  {{__('ui.becomeanauditor')}}
                </button>
            </a> 
          </p>
        </section>
        @endif
        @endauth
        <!-- Section: CTA -->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="{{route('home')}}">Presto.it</a><br>
        <a class="text-white" href="{{route('ourTeam')}}">By TeamDDF - ABOUT US</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </section>