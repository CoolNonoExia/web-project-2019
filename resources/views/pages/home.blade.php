@extends('layouts.default')

@section('title')
    Accueil
@endsection

@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-blue"><i class="fas fa-home"></i> Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-outline-blue"><i class="fas fa-calendar-day"></i> Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue"><i class="fas fa-cash-register"></i> Boutique</button></a>
    @if(session()->has('logged_in') && session('logged_in'))
        <a href="{{ route('idea') }}"><button class="btn btn-outline-blue"><i class="far fa-lightbulb"></i> Boîte à idées</button></a>
    @endif
@endsection

@section('content')
    <div>
        <p> Le bureau des élèves ou BDE est une association qui anime la vie étudiante de son école ou son université. Ce bureau est composé d'étudiants élus par leurs camarades et qui les représentent auprès de l'administration. </p>
        <br>
        <p> Ici vous trouverez une splendide page Evenement, regroupant tous les événements passées et à venir organisé par le BDE. </p>
        <p>Vous pouvez vous inscrire aux événements qui vous intérèsse. Vous puovez également commenter, liker les événements auxquelles vous avez participés</p>
        <br>
        <p> Vous trouverez une page boutique complète, proposant une gamme variée de produit fait par votre BDE</p>
        <br>
        <p> Vous avez des idées d'évenements ? Faites un tour dans la section boîte à idées et proposer la votre !   </p>
        <p> Vous pouvez aussi votez pour les idées proposées par les autres étudiants.</p>
        <p> Les idées avec le plus de votes seront surement selectionnée par le BDE et organisée ! Alors n'hésitez pas ! </p>
        <br>
        <p> Vous trouvez ci dessus un lien menant aux mentions légales du site. Un bouton représenté par une balance se trouve dans le footer pour afficher cette même page</p>
        <a href="{{route('legal')}}"> Mention légal</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-9" style="margin: 30px 0px; background-color: #BD0F14; color: white; font-weight: bold; padding:4px">
            <p>Evenement à venir</p>
        </div>
    </div>
    <div class="row">
        <div id="carousel-home" class="carousel slide col-4 offset-4" data-ride="carousel";>
            <ol class="carousel-indicators">
                <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-home" data-slide-to="1"></li>
                <li data-target="#carousel-home" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                @foreach($events as $event)
                    <div class="carousel-item {{$active ? 'active' : ''}}" >
                        <?php $img = $imgs->find($event['id_images_events']) ?>
                        <img class="d-block w-100" src="{{asset('storage\\img\\events\\'.$img['id'].'.'.$img['ext'])}}" style="height: 200px";>
                        <div class="carousel-caption d-none d-md-block" style="color: #9b000c"></div>
                    </div>
                    <?php $active = false; ?>
                @endforeach
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
    </div>

@endsection
