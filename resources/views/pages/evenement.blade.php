@extends('layouts.default')

@section('title')
    Evenements
@endsection

@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue">Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-blue">Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue">Boutique</button></a>
@endsection

@section('content')
    <script>
        function wololo(element) {
            let idx = element.selectedIndex;
            let val = element.options[idx].value;

            if(val==='eve')
            {
                location.replace('{{route('eve')}}');
            } else {
                location.replace('{{route('even')}}');
            }
        }
    </script>

   <div class="container-fluid">
       <div class="row justify-content-center">
           <div class="col-8">
               <div class="row">
                       <div class="custom-control custom-switch col-4">
                           <input type="checkbox" checked="checked" class="custom-control-input" id="customSwitch1">
                           <label class="custom-control-label" for="customSwitch1">Evenements passés</label>
                       </div>
                       <div class="dropdown  text-right col-8 ">
                           <span>Trier par : </span>
                           <select id="select" name="tri" class="custom-select" style="width:100px;" onchange="wololo(this)">
                               <option selected>Choice</option>
                               <option value="eve">Date</option>
                               <option value="even">Nom</option>
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
               <img src="{{asset('img\\events\\'.$img['id'].'.'.$img['ext'])}}" class="img-fluid" style="max-height: 100%; max-width: 100%;" />
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
                   <img src="{{asset('img\\events\\'.$img['id'].'.'.$img['ext'])}}" class="img-fluid" style="max-height: 100%; max-width: 100%;" />
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
   </div>
@endsection
