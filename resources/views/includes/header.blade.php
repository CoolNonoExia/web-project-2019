<style>
    header
    {
        box-shadow: 0px 0px 15px #101010;
        background-color: #111;
        background-image: linear-gradient(180deg, #506080, #111);
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




<div class="row align-items-center">
    <div class="col-3">
        <a href="{{route('home')}}" >
            <img src="{{ asset('img/BDE_logo.png') }}" style="max-height: 100px" />
            <span class="super-title align-middle">BDE CESI NICE</span>
        </a>
    </div>
    <div class="col-6">
        <div class="row justify-content-center">
            <span class="slogan align-middle">Le BDE, plus qu'une idée, un avenir</span>
        </div>
        <div class="row justify-content-center">
            <span>
                @yield('navbar')
            </span>
        </div>
    </div>
    @if(session()->has('logged_in') && session('logged_in'))
        <div class="col-1">
            <div class="row justify-content-end" style="padding-right: 10px">
                <a href="{{ route('panier') }}"><button class="btn {{ Request::route()->getName() == 'panier' ? 'btn-warning' : 'btn-outline-warning' }}" style="font-size: 34px"><i class="fas fa-shopping-cart"></i></button></a>
            </div>
        </div>
        <div class="col-2">
            <div class="text-right text-white" style="margin-right: 5px">
                {{ session('first_name') }} {{ session('last_name') }}
            </div>
            <div class="dropdown text-right">
                <button class="btn btn-outline-warning dropdown-toggle" type="button" id="ddlOptions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-tools"></i> Mon compte
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ddlOptions">
                    <?php if(session('role') == 1) { $rolename = 'Étudiant'; } else if(session('role') == 2) { $rolename = 'Membre du BDE'; } else if(session('role') == 3) { $rolename = 'Membre du CESI'; } ?>
                    <h6 class="dropdown-header">{{ $rolename }}</h6>
                        @if(session('role') == 2)
                            <a class="dropdown-item" href="#">Administration</a>
                        @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('panier') }}">Panier</a>
                    <a class="dropdown-item" href="#">Mes commandes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">Déconnexion <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    @else
        <div class="col-3">
            <div class="row justify-content-end" style="padding-right: 10px">
                <a href="{{ route('login') }}"><button class="btn btn-outline-warning">Connexion <i class="fas fa-sign-in-alt"></i></button></a>
            </div>
            <div class="row justify-content-end" style="padding-right: 10px">
                <a href="{{ route('register') }}"><button class="btn btn-outline-warning">Inscription <i class="fas fa-file-signature"></i></button></a>
            </div>
        </div>
    @endif
</div>
