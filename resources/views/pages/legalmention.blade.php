@extends('layouts.default')

@section('title')
    Mention légale
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
    <div>
        <h1>Mentions légales</h1>

        <p> Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour la Confiance dans l'économie numérique, dite L.C.E.N., il est porté à la connaissance des utilisateurs et visiteurs du site </p>

        <p> Le site BDE-CESI-NICE est accessible à l'adresse suivante : (ci-après "le Site"). L'accès et l'utilisation du Site sont soumis aux présentes " Mentions légales" détaillées ci-après ainsi qu'aux lois et/ou règlements applicables.
            La connexion, l'utilisation et l'accès à ce Site impliquent l'acceptation intégrale et sans réserve de l'internaute de toutes les dispositions des présentes Mentions Légales. </p>

       <h2> ARTICLE 1 - INFORMATIONS LÉGALES </h2>

        <p> En vertu de l'Article 6 de la Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé dans cet article l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi. </p>


        <h2> ARTICLE 2 - CONFIDENTIALITE </h2>

        <p> L'Editeur du site porte à la connaissance de l'Utilisateur que dans le cadre de sa navigation sur le site, ses données à caractère personnel ne sont ni traitées, ni collectées. </p>


        <h2> ARTICLE 4 - LOI APPLICABLE ET JURIDICTION </h2>

        <p> Les présentes Mentions Légales sont régies par la loi française. En cas de différend et à défaut d'accord amiable, le litige sera porté devant les tribunaux français conformément aux règles de compétence en vigueur. </p>


        <h2>  ARTICLE 5 - CONTACT </h2>

        <p> Pour tout signalement de contenus ou d'activités illicites, l'Utilisateur peut contacter l'Éditeur à l'adresse suivante : , ou par courrier recommandé avec accusé de réception adressé à l'Éditeur aux coordonnées précisées dans les présentes mentions légales. </p>


        Le site BDE CESI NICE vous souhaite une excellente navigation !
    </div>
@endsection
