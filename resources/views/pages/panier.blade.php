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
    <hr>

    <hr>
    <p style="text-align: center"><b>Formulaire de commande</b></p>
    <input type="text" name="last_name" value="Nom" />
    <input type="text" name="first_name" value="Prénom" />
    <input type="email" name="email" value="Adresse@email.fr" />


    <button class="btn btn-outline-blue">Commander</button>
@stop
