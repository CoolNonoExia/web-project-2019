@extends('layouts.default')

@section('title')
    Evenements
@endsection

@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue"><i class="fas fa-home"></i> Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-blue"><i class="fas fa-calendar-day"></i> Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue"><i class="fas fa-cash-register"></i> Boutique</button></a>
    @if(session()->has('logged_in') && session('logged_in'))
        <a href="{{ route('idea') }}"><button class="btn btn-outline-blue"><i class="far fa-lightbulb"></i> Boîte à idées</button></a>
    @endif
@endsection

@section('content')
    <script>
        function updated(element) {
           
            let idx = element.selectedIndex;
            let val = element.options[idx].value;

            if(val==='eve')
            {
                location.replace('{{route('eve')}}');
            } else {
                location.replace('{{route('even')}}');
            }
        }

        function check(element){


            if (element.checked){

                        location.replace('{{route('eve')}}');
            }else {
                location.replace('{{route('eveP')}}');
            }

        }

        function click(element) {



        }
    </script>

   <div class="container-fluid">

       @if(session()->has('logged_in') && session('logged_in') && session('role') == 2)
           <a href ="{{route('eveAdd')}}" class="btn btn-blue"> <i class="fas fa-plus"></i> Ajouter un evenement</a>
       @endif
       <div class="row justify-content-center">

           <div class="col-8">

               <div class="row">
                       <div class="custom-control custom-switch col">
                           <input type="checkbox" {{$check}} class="custom-control-input" id="customSwitch1" onchange="check(this)">
                           <label class="custom-control-label" for="customSwitch1">Evenements passés</label>
                       </div>
                       <div class="dropdown  text-right col">
                           <span>Trier par : </span>
                           <select id="select" name="tri" class="custom-select" style="width:100px;" onchange="updated(this)">
                               <option {{$date}} value="eve">Date</option>
                               <option {{$name}} value="even">Nom</option>
                           </select>
                       </div>
               </div>
           </div>
       </div>
       <div class="row justify-content-center">
           <div class="col-9" style="margin: 30px 0px; background-color: #BD0F14; color: white; font-weight: bold; padding:4px">
               <p>Evenement à venir</p>
           </div>
       </div>
       @foreach($events as $event)
       <div class="row">
           <div class="col-2" style="height: 150px;">
               {{-- Images --}}
               <?php $img = $imgs->find($event['id_images_events']) ?>
               <img src="{{ asset('storage/img/events/'.$img['id'].'.'.$img['ext']) }}" class="img-fluid" style="max-height: 100%; max-width: 100%;" />
           </div>
           <div class="col-8">
               <div class="row">
                   <div class="col">
                       <span style="font-weight: bold;"> {{$event['title']}}</span>
                   </div>
                   <div class="col text-right">
                       <span>
                           {{$event['events_date']}}
                       </span>
                   </div>
               </div>
               <div class="border"  style="height:102px;">
                   <div>{{$event['description']}}</div>
               </div>
               <div class="text-right">
                   @if($event['is_free'])
                       Free
                   @else
                       Payant
                   @endif
               </div>
               <hr style="margin-top:25px; border-top: 1px dashed #8c8b8b;">
           </div>
       </div>
       @endforeach
       @if($pastevents != "")
           <div class="row justify-content-center">
           <div class="col-9" style="margin: 30px 0px; background-color: #BD0F14; color: white; font-weight: bold; padding:4px">
               <p>Evenement passés</p>
           </div>
       </div>

       @foreach($pastevents as $pevent)
           <div class="row">
               <div class="col-2" style="height: 150px;">
                   {{-- Images --}}
                   <?php $img = $imgs->find($pevent['id_images_events']) ?>
                   <a href="{{route('eveL', '')}}\{{$pevent['id']}}" onclick="click (this)"><img  src="{{ asset('storage/img/events/'.$img['id'].'.'.$img['ext']) }}" class="img-fluid" style="max-height: 100%; max-width: 100%;" /></a>
               </div>
               <div class="col-8">
                   <div class="row">
                       <div class="col">
                           <span style="font-weight: bold;"> {{$pevent['title']}}</span>
                       </div>
                       <div class="col text-right">
                       <span>
                           {{$pevent['events_date']}}
                       </span>
                       </div>
                   </div>
                   <div class="border" style="height:102px;">
                       <div>{{$pevent['description']}}</div>
                   </div>
                   <div class="text-right">
                       @if($pevent['is_free'])
                           Free
                       @else
                           Payant
                       @endif
                   </div>
                   <hr style="margin-top:25px; border-top: 1px dashed #8c8b8b;">
               </div>
           </div>
       @endforeach
       @endif
   </div>
@endsection
