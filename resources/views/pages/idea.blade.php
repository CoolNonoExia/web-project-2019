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
    <p style="text-align: center"><b>Boîte à Idées</b></p>
    <hr>

    <p style="text-align: center">Vous retrouverez ici l'ensemble des évènements proposés par les étudiants du Campus CESI de Nice</p>
    <p style="text-align: center">N'hésitez pas à voter pour un évènement si celui-ci vous intéresse !</p>
    <p style="text-align: center">Si un évènement reçoie suffisament de votes le BDE l'organiseras sûrement</p>
    <hr>

    <p><b>Proposer un évènement</b></p>
    <input class=""

@endsection
