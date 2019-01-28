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

    <div class="row justify-content-center">
        <div class="col-9" style="margin: 30px 0px; background-color: #BD0F14; color: white; font-weight: bold; padding:4px">
            <p>Evenements proposés</p>
        </div>
    </div>

    <hr>

    <p><b>Proposer un évènement</b></p>
    <input type="text" name="title" value="titre" />
    <input type="text" name="description" value="description" />
    <input type="file" name="image" value="image" />

    <button class="btn btn-outline-blue">Proposer</button>


@endsection
