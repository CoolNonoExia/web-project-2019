<style>
    header
    {
        box-shadow: 0px 0px 15px #101010;
        background-color: #111;
        background-image: linear-gradient(180deg, #679, #111);
        border: 0px;
    }
    header {
        margin-bottom: 30px;
        padding: 10px;
    }
    header .btn {margin: 5px;}

    .super-title, .slogan {
        color: #fff;
        font-size: 30px;
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
</style>




<div class="row">
    <div class="col-4">
        <a href="{{route('home')}}" >
            <img src="{{ asset('img/BDE_logo.png') }}" style="max-height: 100px" />
            <span class="super-title align-middle">BDE CESI NICE</span>
        </a>
    </div>
    <div class="col-4">
        <div class="row justify-content-center">
            <span class="slogan align-middle">Le BDE, plus qu'une idée, un avenir</span>
        </div>
        <div class="row justify-content-center">
            <span>
                @yield('navbar')
            </span>
        </div>
    </div>
    <div class="col-4">
        <div class="row justify-content-end" style="padding-right: 10px">
            <a href="{{ route('login') }}"><button class="btn btn-outline-warning">Se connecter</button></a>
        </div>
        <div class="row justify-content-end" style="padding-right: 10px">
            <a href="{{ route('register') }}"><button class="btn btn-outline-warning">S'inscrire</button></a>
        </div>
    </div>
</div>
