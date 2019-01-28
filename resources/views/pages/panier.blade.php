@extends('layouts.default')
@section('title')
    Boutique
@endsection
@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue">Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-outline-blue">Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue">Boutique</button></a>
@endsection
@section('content')

    <p style="text-align: center"><b>Voici votre panier</b></p>
    <hr>

    <hr>
    <p style="text-align: center"><b>Formulaire de commande</b></p>
    <input type="text" name="last_name" value="Nom" />
    <input type="text" name="first_name" value="Prénom" />
    <input type="email" name="email" value="Adresse@email.fr" />


    <button class="btn btn-outline-blue">Commander</button>
@stop
