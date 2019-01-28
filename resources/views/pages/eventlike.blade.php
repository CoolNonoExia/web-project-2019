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

    </script>
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
            <div class="border" style="height:102px;">
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
        @endforeach
        <br>
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

@endsection
