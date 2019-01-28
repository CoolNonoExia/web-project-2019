@extends('layouts.default')

@section('title')
    Evenements
@endsection

@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue"><i class="fas fa-home"></i> Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-blue"><i class="fas fa-calendar-day"></i> Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue"><i class="fas fa-cash-register"></i> Boutique</button></a>
    @if(session()->has('logged_in') && session('logged_in'))
        <a href="{{ route('idea') }}"><button class="btn btn-outline-blue"><i class="far fa-lightbulb"></i> Boîte à idées</button></a>
    @endif
@endsection

@section('content')
    <script>

    </script>

    <div class="row justify-content-center">
        <div class="col-9" style="margin: 30px 0px; background-color: #BD0F14; color: white; font-weight: bold; padding:4px">
            <p>Ajout d'evenement </p>
        </div>
    </div>

    <form method="POST" action="{{ route('eveAdd') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ old('title') }}" placeholder="BBQ, concert...">
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <input class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" id="desc" name="desc" value="{{ old('desc') }}" placeholder="Prix, lieu...">
            @if ($errors->has('desc'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('desc') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="date">Date de l'événement</label>
            <input type="datetime-local" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" name="date" value="{{ old('date') }}" >
            @if ($errors->has('date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input class="custom-control-input" type="checkbox" name="free" id="free" value="1">
                <label class="custom-control-label" for="free">
                    Payant
                </label>
            </div>
            <div class="custom-control custom-switch">
                <input class="custom-control-input" type="checkbox" name="recurrent" id="recurrent" value="1">
                <label class="custom-control-label" for="recurrent">
                    Récurrent
                </label>
            </div>
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="imgUpload">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" name="image" value="{{ old('image') }}" aria-describedby="imgUpload" accept="image/jpeg, image/png, image/bmp, image/gif, image/svg">
                <label class="custom-file-label" for="image">Choisir image</label>

                @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <button type="submit" class="btn text-white" style="background-color: #BD0F14;" >Submit</button>
    </form>

    <script>
        $('#image').on('change', function(){
            //get the file name
            let fileName = $(this).val().split('\\').pop();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>

@endsection
