@extends('layouts.default')
@section('title')
    Evenements
@endsection
@section('content')

       <div class="container">
           <div style="margin-bottom: 40px;">
               <div class="row">

                   <div class="checkbox col-4">
                       <label><input type="checkbox" value="true"> Evénement passés</label>
                   </div>
                   <div class="dropdown  text-right col-8 ">
                       <span>Trier par : </span>
                       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Date
                       </button>
                       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                           <a class="dropdown-item" href="#">Payant</a>
                           <a class="dropdown-item" href="#">Gratuit</a>
                           <a class="dropdown-item" href="#">Nom</a>
                       </div>
                   </div>
               </div>
           </div>

           <div>
               <div class="col mx-auto" style="background-color: #BD0F14; color: white; font-weight: bold; padding:4px">

                   <p> Evenement à venir </p>

               </div>
           </div>
           <div class="row">
               <div class="col">
                   <p style="font-weight: bold;"> {{($event['title'])}}</p>
               </div>
               <div class="col-2">
                   <p>
                       {{$event['events_date']}}
                   </p>
               </div>
           </div>
            <div class="border">
                <div class="row">
                    <div class="col">
                        <p>{{$event['description']}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        @if($event['is_free']==0)
                            Free
                        @else
                            Payant
                        @endif
                    </div>
                </div>
            </div>

       </div>
@stop
