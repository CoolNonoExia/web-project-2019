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

    <p style="text-align: center">Vous retrouverez ici l'ensemble des évènements proposés par les étudiants du Campus CESI de Nice</p>
    <p style="text-align: center">N'hésitez pas à voter pour un évènement si celui-ci vous intéresse !</p>
    <p style="text-align: center">Si un événement reçoit suffisament de votes, le BDE l'organisera sûrement</p>
    <hr>

    <div class="row justify-content-center">
        <div class="col-9" style="margin: 30px 0px; background-color: #1b4b72; color: white; font-weight: bold; padding:4px">
            <p>Evenements proposés</p>
        </div>
    </div>

    <hr>

    <p style="text-align: center"><b>Proposer un évènement</b></p>
    <form method="post" action="idea.blade.php" enctype="multipart/form-data">
        <label for="title"><b>Titre de l'évènement</b></label>
    <input type="text" name="title" value="titre" /><br>
        <label for="description"><b>Description de l'évènement</b></label>
    <input type="text" name="description" value="description" /><br>
    <input type="hidden" name="max_size" value="1048576" />
        <label type="image"><b>Illustration évènement</b></label>
    <input type="file" name="image" value="image" /><br>
    <input style="float: right;"class="btn btn-outline-blue" type="submit" name="submit" value="Proposer" />
    </form>

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
