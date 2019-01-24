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

    <script>
        function updated(element) {

            let idx = element.selectedIndex;
            let val = element.options[idx].value;

            if(val==='name')
            {
                location.replace('{{route('boutique')}}');
            } else {
                location.replace('{{route('boutiqueP')}}');
            }
        }
    </script>

    <p style="text-align: center; color: #101010; font-size: larger"><b> ILS NE SERONT BIENTOT PLUS EN STOCK !</b></p>
    <hr>
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

    <hr size="8" align="center" width="100%">
    <span style="text-align: left">Notre boutique propose une collection d'article qui dépassent l'entendement !</span>
    <div class="dropdown  text-right col-12 ">
        <span>Trier par : </span>
        <select id="select" name="tri" class="custom-select" style="width:100px;" onchange="updated(this)">
            <option {{$name}} value="name">Nom</option>
            <option {{$price}} value="price">Prix</option>
        </select>
    </div>

    <div class="row">
        <div class="col-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Tout
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Vêtement
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Informatique
                </label>
            </div>
        </div>
        <div class="col-8"><div class="row">
            @foreach($product as $products)
            <div class="col">
                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center">  {{$products['name']}} </p>
                <p>{{$products['description']}}</p>
                <p> Get this product for only {{$products['price']}}€ </p>
                <button class="btn btn-blue"> Ajouter au panier </button>
                <p></p>

                {{--<img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 5 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
                <p></p>

                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 9 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>--}}
            </div>
            @endforeach
            {{--<div class="col-sm">
                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 2 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
                <p></p>

                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 6 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
                <p></p>

                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 10 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
            </div>
            <div class="col-sm">
                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 3 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
                <p></p>

                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 7 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
                <p></p>

                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 11 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
            </div>
            <div class="col-sm">
                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 4 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
                <p></p>

                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 8  </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
                <p></p>

                <img class="img-fluid" src="./images/sweat.png" alt="Responsive image">
                <p style="text-align: center"> Article 12 </p>
                <p> Get this product for only ...€ </p>
                <button> Ajouter au panier </button>
            </div>--}}
            </div></div>
    </div>
@endsection
