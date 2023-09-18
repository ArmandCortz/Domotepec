@extends('layouts.app')

@section('content')
    
    @push('styles')
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @endpush
    <div class="container">
        <div class="row justify-content-center pt-5 mt-3 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <form method="POST" action="{{ route('login')}}">
                    @csrf

                    <div class="form-group text-center pt-3">
                        <img src="/img/img/Logo-Domotepec-1.jpeg" alt="" class="rounded-circle img-fluid"
                            style="max-height: 100px; max-width: 100px;">
                        <h1 class="text-light">Bienvenido/a</h1>
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        {{-- <input type="text" class="form-control" placeholder="Ingrese su Usuario"> --}}
                        <input id="email" type="email" placeholder="Ingrese su Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mx-sm-4 pb-3">
                        {{-- <input type="text" class="form-control" placeholder="Ingrese su Contraseña"> --}}
                        <input id="password" type="password" placeholder="Ingrese su contraseña"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <button type="submit" class="btn btn-block ingresar">
                            {{ __('Ingresar') }}
                        </button>
                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                {{ __('Olvide mi contraseña?') }}
                            </a>
                        @endif --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    @endpush
@endsection
