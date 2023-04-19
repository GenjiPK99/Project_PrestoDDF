<x-layout>
    <div class="container mt-5">
        <div class="row ">
            <div class="col-lg-10 col-xl-9 mx-auto ">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body p-4 p-sm-5">
                        <h1 class="card-title text-center mb-5 fw-bold fs-3">Registrati a Presto.it</h1>
                        <form method="POST" action="{{ route('register') }}">

                            @csrf
                            
                            <div class="form-floating mb-3" >
                                <input type="text" name="name" class="form-control @error('name') is.invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Inserisci Nome Utente" required autofocus>
                                <label for="name">Nome Utente</label>
                            </div>

                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control @error('email') is.invalid @enderror" id="email" value="{{ old('email') }}"placeholder="name@example.com">
                                <label for="email">E-mail</label>
                            </div>
                            
                            @error('email')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control @error('password') is.invalid @enderror" id="password" value="{{ old('password') }}"placeholder="Crea Password">
                                <label for="password">Password</label>
                            </div>

                            @error('password')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                            <div class="form-floating mb-3">
                                <input type="password" name="password_confirmation"class="form-control @error('password_confirmation') is.invalid @enderror" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Reinserisci Password">
                                <label for="password_confirmation">Conferma Password</label>
                            </div>

                            @error('password_confirmation')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Registrati</button>
                            </div>
                            
                            <a class="d-block text-center mt-2 small" href="{{route('login')}}" style="text-decoration:none;">Hai un Account? Accedi </a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout>