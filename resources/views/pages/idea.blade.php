@extends('layouts.default')
@section('title')
    Boîte à idée
@endsection
@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue"><i class="fas fa-home"></i> Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-outline-blue"><i class="fas fa-calendar-day"></i> Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue"><i class="fas fa-cash-register"></i> Boutique</button></a>
    <a href="{{ route('idea') }}"><button class="btn btn-blue"><i class="far fa-lightbulb"></i> Boîte à idées</button></a>
@endsection
@section('content')
    <p style="text-align: center"><b>Boîte à Idées</b></p>
    <hr>

    <p style="text-align: center">Vous retrouverez ici l'ensemble des événements proposés par les étudiants du Campus CESI de Nice</p>
    <p style="text-align: center">N'hésitez pas à voter pour un événement si celui-ci vous intéresse !</p>
    <p style="text-align: center">Si un événement reçoit suffisament de votes, le BDE l'organisera sûrement</p>
    <hr>
    <div class="text-center">
        <button class="btn btn-secondary">Ajoutez vos idées !</button>
    </div>


    <div class="row justify-content-center">
        <div class="col-9" style="margin: 30px 0px; background-color: #1b4b72; color: white; font-weight: bold; padding:4px">
            <p>Activités proposées</p>
        </div>
    </div>

    @foreach($ideas as $idea)
        <br>
        <div class="row">
            <div class="col-1 bg-warning border border-secondary">
                <span>Idée numéro {{$idea['id']}} :</span>
            </div>
        </div>
        <div class="row">
            <div class="border" style="height:50px; width: 350px;">
                <span style="font-weight: bold">{{$idea['title']}}</span>
                <p>{{$idea['description']}}</p>
            </div>
            <span><a class="btn btn-link i" target="_blank"><i class="fas fa-thumbs-up"></i></a> </span>
            <span><a class="btn btn-link i" target="_blank"><i class="fas fa-thumbs-down"></i></a></span>

        </div>
        @endforeach




{{--    <hr>

    <p style="text-align: center"><b>Proposer une activité</b></p>
    <form method="post" action="idea.blade.php" enctype="multipart/form-data">
        <label for="title"><b>Titre de l'évènement</b></label>
    <input type="text" name="title" value="titre" /><br>
        <label for="description"><b>Description de l'évènement</b></label>
    <input type="text" name="description" value="description" /><br>
    <input type="hidden" name="max_size" value="1048576" />
        <label type="image"><b>Illustration évènement</b></label>
    <input type="file" name="image" value="image" /><br>
    <input style="float: right;"class="btn btn-outline-blue" type="submit" name="submit" value="Proposer" />
    </form>--}}

    <!--?php
        $_FILES['']
        if ($_FILES[''][''] > 0) $erreur = "Erreur lors du transfert";
        if ($_FILES[''][''] > $maxsize) $erreur = "Le fichier est trop gros";
        $extension_valides = array('jpg','jpeg','gif','png');
        $extension_upload = strtolower( substr( strrchr($_FILES[''][''], '.') ,1));
        if (in_array($extension_upload,$extension_valides)) echo = "Extension correcte";
        $image_sizes = getimagesize($_FILES['']['']);

    ?-->



@endsection
