<x-layout>
    <div class="container ">
        <div class="row ">
            <div class="col-12 col-md-8 col-lg-12 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden altezza-container">
                    <div class="card-img-left2 d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body p-4 p-md-5 my-auto">
                        <h1 class="card-title text-center mb-5 fw-bold fs-3">Accedi a Presto</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control @error('email') is.invalid @enderror" id="email" value="{{ old('email') }}" placeholder="Inserisci il tuo indirizzo email" required autofocus>
                                <label for="email">Email</label>
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control @error('password') is.invalid @enderror" id="password" value="{{ old('password') }}" placeholder="Inserisci la tua password">
                                <label for="password">Password</label>
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Effettua l'accesso</button>
                            </div>
                            <a class="d-block text-center mt-2 small" style="text-decoration: none;" href="{{ route('register') }}">Non hai un account? Registrati</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>