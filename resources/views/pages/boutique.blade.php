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
            let idx = element.selectedIndex;
            let val = element.options[idx].value;

            if(val==='name')
            {

                location.replace('{{route('boutiqueSpe',$id=1)}}');
            } else {
                location.replace('{{route('boutiqueSpe',$id=2)}}');
            }
        }

        function onradiobtn(element) {

            let id = element.id;


            if(id == 0)
            {
                location.replace('{{route('boutique')}}');

            }else{
                location.replace('{{ route('boutique') }}/T'+id);

            }
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
            });
        }

    </script>
    @if(session()->has('logged_in') && session('logged_in') && session('role') == 2)
        <a href ="{{route('productAdd')}}" class="btn btn-blue"> <i class="fas fa-plus"></i> Ajouter un produit</a>
    @endif
    @if($carousel != "")

    <p style="text-align: center; color: #101010; font-size: larger"><b> ILS NE SERONT BIENTOT PLUS EN STOCK ! </b></p>
    <hr>
    <div class="row">
        <div id="carousel-home" class="carousel slide col-4 offset-4" data-ride="carousel";>
            <ol class="carousel-indicators">
                <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-home" data-slide-to="1"></li>
                <li data-target="#carousel-home" data-slide-to="2"></li>

            </ol>

            <div class="carousel-inner">
                @foreach($carousel as $carousels)
                    <div class="carousel-item {{$active ? 'active' : ''}}" >
                        <?php $img = $imgs->find($carousels['id_products']) ?>
                        <img class="d-block w-100" src="{{asset('img\\products\\'.$img['id'].'.'.$img['ext'])}}" style="width:550px; height: 450px";>
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
    <div class="dropdown  text-right col-12 ">
        <span>Trier par : </span>
        <select id="select" name="tri" class="custom-select" style="width:100px;" onchange="updated(this)">
            <option {{$name}} value="name">Nom</option>
            <option {{$price}} value="price">Prix</option>
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
                <input class="custom-control-input" type="radio" name="cat" id="{{$category['id']}}" value="option" onclick="onradiobtn(this)"{{ $category['id'] == $tri ? $check : $uncheck }}>
                <label class="custom-control-label" for="{{$category['id']}}">
                    {{$category['name']}}
                </label>
            </div>
            @endforeach
        </div>
        <div class="col-8">
            <div class="row">
            @foreach($products as $product)
            <div class="col" >
                <?php $img = $imgs->find($product['id_images_products']) ?>
                <img class="img-fluid" src="{{asset('img\\products\\'.$img['id'].'.'.$img['ext'])}}" alt="Responsive image" style="max-width:250px; max-height: 150px";>
                <p style="text-align: center">  {{$product['name']}} </p>
                <p>{{$product['description']}}</p>
                <p> Get this product for only {{$product['price']}}€ </p>
                @if(session()->has('logged_in') && session('logged_in'))
                    <button class="btn btn-blue" onclick="onClick({{$product['id']}})"> Ajouter au panier </button>
                @endif
            </div>
            @endforeach
            </div></div>
    </div>
@endsection
