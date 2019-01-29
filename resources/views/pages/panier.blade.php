@extends('layouts.default')
@section('title')
    Boutique
@endsection
@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue"><i class="fas fa-home"></i> Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-outline-blue"><i class="fas fa-calendar-day"></i> Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue"><i class="fas fa-cash-register"></i> Boutique</button></a>
    @if(session()->has('logged_in') && session('logged_in'))
        <a href="{{ route('idea') }}"><button class="btn btn-outline-blue"><i class="far fa-lightbulb"></i> Boîte à idées</button></a>
    @endif
@endsection
@section('content')

    <p style="text-align: center"><b>Voici votre panier</b></p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td scope="row">{{$product['title']}}</td>
                    <td>{{$product['quantity']}}</td>
                    <td>{{$product['price']}}€</td>
                    <td><a class="btn btn-danger" href="https://www.instagram.com/" target="_blank"><i class="fas fa-times"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <button class="btn btn-outline-blue">Commander</button>
@endsection
