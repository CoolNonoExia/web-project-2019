<style>
    header
    {
        background-color: #101010;
        padding: 20px;
    }
    header {margin-bottom: 30px;}
    header .btn {margin: 5px;}

    h1 {
        color: #fff;
        font-size: 60px;
    }

    /* Buttons with custom cesi-blue color */
    .btn-blue {
        color: #fff;
        background-color: #4A6EB5;
        border-color: #4A6EB5;
    }
    .btn-blue:hover {
        color: #fff;
        background-color: #4464A5;
        border-color: #3D5B95;
    }
    .btn-blue:focus, .btn-blue.focus {
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
    }
    .btn-outline-blue {
        color: #4A6EB5;
        background-color: transparent;
        border-color: #4A6EB5;
    }
    .btn-outline-blue:hover {
        color: #fff;
        background-color: #4A6EB5;
        border-color: #4A6EB5;
    }
    .btn-outline-blue:focus, .btn-outline-blue.focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }

    .topspace {margin-top: 20px;}

</style>




<div class="row">
    <div class="col-2 col-lg-1">
        <a href="index.html">
            <img class="img-fluid" src="{{ asset('img/BDE_logo.png') }}" />
        </a>

        <p class="text-center">
            <iframe name="date du jour" id="date-du-jour" style="width:105px;height:75px;" src="https://www.mathieuweb.fr/calendrier/date-jour-blanc2.html" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
        </p>
    </div>
    <div class="col-8 col-lg-10">
        <h1 class="text-center topspace"> Le BDE, plus qu'une idée, un avenir. </h1>
        <br>

        <div class="text-center">
            <a href="index.html"><button class="btn btn-blue">Accueil</button></a>
            <a href="events.html"><button class="btn btn-outline-blue">Evenements</button></a>
            <a href="shop.html"><button class="btn btn-outline-blue">Boutique</button></a>
        </div>
    </div>
    <div class="col-2 col-lg-1">
        <div class="topspace row justify-content-end">
            <a href="signin.html"><button class="btn btn-outline-warning">Se connecter</button></a>
        </div>
        <div class="row justify-content-end">
            <a href="signup.html"><button class="btn btn-outline-warning">S'inscrire</button></a>
        </div>
    </div>
</div>
