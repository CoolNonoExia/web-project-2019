@extends('layouts.default')

@section('title')
    Boutique
@endsection

@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue">Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-outline-blue">Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-blue">Boutique</button></a>
@endsection

@section('content')
    <html>
    <p style="text-align: center; color: #101010; font-size: larger"><b> ILS NE SERONT BIENTOT PLUS EN STOCK !</b></p>
    <hr>
    </html>
    <div id="carousel-home" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-home" data-slide-to="1"></li>
            <li data-target="#carousel-home" data-slide-to="2"></li>
            <li data-target="#carousel-home" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="./images/sweat.png" alt="First slide" height="">
                <div class="carousel-caption d-none d-md-block" style="color: #9b000c"><b> Article 1: ...€ </b></div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/sweat.png" alt="Second slide">
                <div class="carousel-caption d-none d-md-block" style="color: #9b000c"><b> Article 2: ...€ </b></div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/sweat.png" alt="Third slide">
                <div class="carousel-caption d-none d-md-block" style="color: #9b000c"><b> Article 3: ...€</b></div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/sweat.png" alt="Fourth slide">
                <div class="carousel-caption d-none d-md-block" style="color: #9b000c"><b> Article 4: ...€ </b></div>
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
    <html>
        <hr size="8"; align="center"; width="100%">
        <p style="text-align: left">Notre boutique propose une collection d'article qui dépassent l'entendement !</p>
        <div class="container">
            <div class="row">
                @foreach($product as $products)
                <div class="col-sm">
                    <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                    <p style="text-align: center">  {{$products['name']}} </p>
                    <p>{{$products['description']}}</p>
                    <p> Get this product for only {{$products['price']}}€ </p>
                    <button class="btn btn-blue"> Ajouter au panier </button>
                    <p></p>
                </div>
                @endforeach
            </div>
        </div>
    </html>
@endsection
