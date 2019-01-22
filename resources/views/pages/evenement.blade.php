@extends('layouts.default')
@section('content')

        <span class="checkbox">
            <label><input type="checkbox" value="true"> Evénement passés</label>
        </span>
        <span class="dropdown float-right ">
            <span>Trier par :</span>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Date
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" >
                <a class="dropdown-item" href="#">Payant</a>
                <a class="dropdown-item" href="#">Gratuit</a>
                <a class="dropdown-item" href="#">Nom</a>
            </div>
        </span>

@stop
