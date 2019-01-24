@extends('layouts.default')

@section('title')
    Accueil
@endsection

@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-blue">Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-outline-blue">Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue">Boutique</button></a>
@endsection

@section('content')
    <div id="carousel-home" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-home" data-slide-to="1"></li>
            <li data-target="#carousel-home" data-slide-to="2"></li>
            <li data-target="#carousel-home" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('svg/403.svg') }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">image 1</div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('svg/404.svg') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">image 2</div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('svg/500.svg') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">image 3</div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('svg/503.svg') }}" alt="Fourth slide">
                <div class="carousel-caption d-none d-md-block">image 4</div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel-home" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-home" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection
