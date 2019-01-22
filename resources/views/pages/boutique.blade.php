@extends('layouts.default')
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
                <img class="d-block w-100" src="./images/polo.png" alt="First slide">
                <div class="carousel-caption d-none d-md-block"> Polo CESI personnalisable: 15€</div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/sweat.png" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">Sweet-shirt CESI personnalisable: 25€</div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/pins.png" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">Pins CESI: 2€</div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/mug.png" alt="Fourth slide">
                <div class="carousel-caption d-none d-md-block">Mug CESI: 5€</div>
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

    </html>
@stop
