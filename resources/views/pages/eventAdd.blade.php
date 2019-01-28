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
    <form method="POST" action="{{ route('evePost') }}">
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Titre</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter titre">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Date de l'evenement</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter date">
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="exampleCheck1">
            <label class="custom-control-label" for="exampleCheck1">Gratuit</label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="Check1">
            <label class="custom-control-label" for="Check1">Recurrent</label>
        </div>

        <br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
            </div>
        </div>

        <br>

        <button type="submit" class="btn btn-danger" style="background-color: #BD0F14;" >Submit</button>
    </form>

@endsection
