@extends('layouts.default')
@section('title')
    Boutique
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

    <p style="text-align: center"><b>Voici votre panier</b></p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr id="tr{{ $product['product']['id'] }}">
                    <td scope="row">{{ $product['product']['name'] }}</td>
                    <td><input onchange="onChangeQuantity(this.value, {{ $product['product']['id'] }})" class="text-center" type="number" value="{{ $product['quantity'] }}"></td>
                    <td><span>{{ $product['product']['price'] }}</span> €</td>
                    <td><button class="btn btn-danger" onclick="onClickRemove({{ $product['product']['id'] }})"><i class="fas fa-times"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row align-items-center justify-content-end">
        <span class="font-weight-bold">Total : <span id="total"></span> €</span>
        <button class="btn btn-outline-blue" style="margin: 15px">Commander</button>
    </div>

    <script>
        calculateTotal();
        function calculateTotal(){
            total = 0;

            for(i = 0; i < $('tbody tr').length; i++){
                tr = $('tbody tr').eq(i);
                total += tr.find('input').val() * tr.find('span').text();
                debugger;
            }

            $('#total').text(total);
        }

        function onClickRemove(id){
            $.ajax({
                url:'{{ url('/panier/remove') }}',
                type: "post",
                dataType: 'json',
                data: { id_pro: id },
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function(){
                $('#tr' + id).remove();
                calculateTotal();
            });
        }

        function onChangeQuantity(value, id){
            $.ajax({
                url:'{{ url('/panier/quantity') }}',
                type: "post",
                dataType: 'json',
                data: { id_pro: id, value: value },
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function(){
                calculateTotal();
            });
        }
    </script>
@endsection
