@extends('layouts.auth')

@section('title')
    Inscription
@endsection

@section('content')
    <style>
        input, select {
            background-color: transparent !important;
            color: #fff !important;
            border-color: #fff !important;
        }
        input::placeholder {
            color: #ced4da !important;
        }
        select {
            background-color: #333A48 !important;
            color: #fff !important;
            border-color: #fff !important;
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
            <div class="col-lg-7 col-md-10">
                <div class="resize"></div>
                <div id="card" class="card text-white">
                    <div class="card-body" style="padding: 40px 80px;">
                        <div class="text-center">
                            <img src="{{ asset('img\BDE_logo.png') }}" style="width: 200px; margin-bottom: 20px" />
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-8">
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Johnson..." required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                                <div class="col-md-8">
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="Cave..." required>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_campus" class="col-md-4 col-form-label text-md-right">{{ __('Campus') }}</label>

                                <div class="col-md-8">
                                    <select id="id_campus" class="form-control{{ $errors->has('id_campus') ? ' is-invalid' : '' }}" name="id_campus" value="{{ old('id_campus') }}" required>
                                        <option disabled selected value class="d-none">-- choisissez une option --</option>
                                        @foreach($campuses as $campus)
                                            <option value="{{ $campus['id'] }}">{{ $campus['name'] }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('id_campus'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_campus') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="cave.johnson@viacesi.fr..." required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom: 0px">
                                <button type="submit" class="btn btn-warning btn-block font-weight-bold" style="padding: .5rem .75rem; color: #334">
                                    {{ __('S\'INSCRIRE') }}
                                </button>
                            </div>

                            @if (Route::has('login'))
                                <span class="form-group">
                                    <a class="btn btn-link text-warning" href="{{ route('login') }}" style="font-size: 11px; padding: 0px">
                                        {{ __('Se connecter') }}
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
                // cardH < winH ? (winH - cardH)/2 : 0
                (winH - cardH)/2
            );
        }

        $(window).on('resize', function(){
            onResize()
        });
        onResize();
    </script>
@endsection
