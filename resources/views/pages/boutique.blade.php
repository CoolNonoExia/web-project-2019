@extends('layouts.default')

@section('title')
    Boutique
@endsection

@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue"><i class="fas fa-home"></i> Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-outline-blue"><i class="fas fa-calendar-day"></i> Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-blue"><i class="fas fa-cash-register"></i> Boutique</button></a>
    @if(session()->has('logged_in') && session('logged_in'))
        <a href="{{ route('idea') }}"><button class="btn btn-outline-blue"><i class="far fa-lightbulb"></i> Boîte à idées</button></a>
    @endif
@endsection

@section('content')

    <script>
        function updated(element) {
            let val = element.options[element.selectedIndex].value;
            let val2 = $('#select2').val();

            location.replace('{{ route('boutique') }}?sortBy=' + val + '&sort=' + val2);
        }

        function updated2(element) {
            let val = element.options[element.selectedIndex].value;
            let val2 = $('#select').val();

            location.replace('{{ route('boutique') }}?sortBy=' + val2 + '&sort=' + val);
        }

        function onradiobtn(element) {
            let id = element.id;

            location.replace('{{ route('boutique') }}?cat=' + id);
        }

        function onClick(id) {
            $.ajax({
                url:'{{ url('/boutique/s') }}',
                type: "post",
                dataType: 'json',
                data: { id_pro: id },
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function(){
                $('#snackbar').addClass('show');
                setTimeout(function(){
                    $('#snackbar').removeClass('show');
                }, 2000);
            });
        }

        $(document).ready(function(){
            $("#hide").click(function(){
                $("#addcat").hide(1000);
            });
            $("#show").click(function(){
                $("#addcat").show(1000);
            });
        });

    </script>

    <style>
        #snackbar {
            visibility: hidden; /* Hidden by default. Visible on click */
            min-width: 250px; /* Set a default minimum width */
            margin-left: -125px; /* Divide value of min-width by 2 */
            background-color: #333; /* Black background color */
            color: #fff; /* White text color */
            text-align: center; /* Centered text */
            border-radius: 2px; /* Rounded borders */
            padding: 16px; /* Padding */
            position: fixed; /* Sit on top of the screen */
            z-index: 1; /* Add a z-index if needed */
            left: 50%; /* Center the snackbar */
            bottom: 30px; /* 30px from the bottom */
        }

        /* Show the snackbar when clicking on a button (class added with JavaScript) */
        #snackbar.show {
            visibility: visible; /* Show the snackbar */
            /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
            However, delay the fade out process for 1.5 seconds */
            -webkit-animation: fadein 0.5s, fadeout 0.5s 1.5s;
            animation: fadein 0.5s, fadeout 0.5s 1.5s;
        }

        /* Animations to fade the snackbar in and out */
        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }
    </style>

    <div id="snackbar" class="bg-success">Article ajouté au panier</div>

    @if(session()->has('logged_in') && session('logged_in') && session('role') == 2)
        <h2>Administration</h2>
        <a href ="{{route('productAdd')}}" class="btn btn-blue"><i class="fas fa-plus"></i> Ajouter un produit</a>
        <a id="show" class="btn btn-blue text-white"><i class="fas fa-plus"></i> Ajouter une catégorie</a>
        <form id="addcat" method="POST" action="{{ route('catAdd') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Catégorie</label>
                <input class="form-control{{ $errors->has('cat') ? ' is-invalid' : '' }}" id="cat" name="cat" value="{{ old('cat') }}" placeholder="Sport, maquillage...">
                @if ($errors->has('cat'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cat') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-success text-white">Ajouter</button>
        </form>
        <hr/>
    @endif

    @if($carousels != "")
        <p style="text-align: center; color: #101010; font-size: larger"><b> ILS NE SERONT BIENTOT PLUS EN STOCK ! </b></p>
        <div class="row">
            <div id="carousel-home" class="carousel slide col-4 offset-4" data-ride="carousel";>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-home" data-slide-to="1"></li>
                    <li data-target="#carousel-home" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    @foreach($carousels as $carousel)
                        <div class="carousel-item {{$active ? 'active' : ''}}" >
                            <?php $img = $imgs->find($carousel['id_images_products']) ?>
                            <img class="d-block w-100" src="{{asset('storage\\img\\products\\'.$img['id'].'.'.$img['ext'])}}" style="height: 200px";>
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
    @endif
    <hr size="8" align="center" width="100%">
    <span style="text-align: left">Notre boutique propose une collection d'article qui dépassent l'entendement !</span>
    <div class="dropdown text-right" style="margin-bottom: 30px">
        <span>Trier par : </span>
        <select id="select" name="tri" class="custom-select" style="width:100px;" onchange="updated(this)">
            <option {{$name}} value="name">Nom</option>
            <option {{$price}} value="price">Prix</option>
        </select>
        <select id="select2" name="sense" class="custom-select" style="width:130px;" onchange="updated2(this)">
            <option {{$asc}} value="asc">Croissant</option>
            <option {{$desc}} value="desc">Décroissant</option>
        </select>
    </div>

    <div class="row">
        <div class="col-2">
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="cat" id="0" value="all" onclick="onradiobtn(this)" {{ $tri == 0 ? $check : $uncheck}}>
                <label class="custom-control-label" for="0">
                    Tout
                </label>
            </div>
            @foreach($categories as $category)
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="cat" id="{{$category['id']}}" value="option" onclick="onradiobtn(this)" {{ $category['id'] == $tri ? $check : $uncheck }}>
                <label class="custom-control-label" for="{{$category['id']}}">
                    {{$category['name']}}
                </label>
            </div>
            @endforeach
        </div>
        <div class="col-10">
            @foreach($products as $productRow)
                <div class="row">
                    @foreach($productRow as $product)
                        <div class="col-3" style="padding: 50px">
                            @if($product != null)
                                <?php $img = $imgs->find($product['id_images_products']) ?>
                                <img class="img-fluid" src="{{asset('storage\\img\\products\\'.$img['id'].'.'.$img['ext'])}}">
                                <div class="font-weight-bold">{{$product['name']}}</div>
                                <div>{{$product['description']}}</div>
                                @if(session()->has('logged_in') && session('logged_in'))
                                    @if($product['in_stock'])
                                        <div class="text-right">Prix : <span class="font-weight-bold">{{$product['price']}}€</span></div>
                                        <button class="btn btn-blue btn-block" onclick="onClick({{$product['id']}})"> Ajouter au panier <i class="fas fa-cart-plus"></i></button>
                                    @else
                                        <button class="btn btn-danger btn-block disabled">Rupture de stock</button>
                                    @endif
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $("#addcat").hide();
    </script>
@endsection
