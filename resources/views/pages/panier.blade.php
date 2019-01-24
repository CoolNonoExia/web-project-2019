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
    <p style="text-align: right"><b>Voici votre panier</b></p>
</html>
    <div>

    </div>
@stop
