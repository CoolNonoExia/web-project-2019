@extends('layouts.auth')

@section('title')
    Connexion
@endsection

@section('content')
    <style>
        input {
            background-color: transparent !important;
            color: #fff !important;
            border-color: #fff !important;
        }
        input::placeholder {
            color: #ced4da !important;
        }
        #card {
            box-shadow: 0px 0px 15px #101010;
            background-color: #111;
            background-image: linear-gradient(135deg, #679, #111);
            border: 0px;
            margin: 20px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-sm-10">
                <div class="resize"></div>
                <div id="card" class="card text-white">
                    <div class="card-body" style="padding: 40px 80px;">
                        <div class="text-center">
                            <img src="{{ asset('img\BDE_logo.png') }}" style="width: 200px; margin-bottom: 20px" />
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('Adresse e-mail') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Mot de passe') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember" style="font-size: 11px; padding: 4px 0px">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom: 0px">
                                <button type="submit" class="btn btn-warning btn-block font-weight-bold" style="padding: .5rem .75rem; color: #334">
                                    {{ __('SE CONNECTER') }}
                                </button>
                            </div>

                            @if (Route::has('register'))
                                <span class="form-group">
                                    <a class="btn btn-link text-warning" href="{{ route('register') }}" style="font-size: 11px; padding: 0px">
                                        {{ __('S\'inscrire') }}
                                    </a>
                                </span>
                            @endif
                            @if (Route::has('password.request'))
                                <span class="form-group float-right">
                                    <a class="btn btn-link text-warning" href="{{ route('password.request') }}" style="font-size: 11px; padding: 0px">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                </span>
                            @endif
                            <div class="form-group">
                                <a class="btn btn-link text-warning" href="{{ route('home') }}" style="font-size: 11px; padding: 0px">
                                    <i class="fas fa-arrow-left"></i> {{ __('Retour à l\'accueil') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="resize"></div>
            </div>
        </div>
    </div>

    <script>
        function onResize(){
            cardH = $('#card').height() + 40;
            winH = $(window).height();
            $('.resize').height(
                (winH - cardH)/2
            );
        }

        $(window).on('resize', function(){
            onResize()
        });
        onResize();
    </script>
@endsection
