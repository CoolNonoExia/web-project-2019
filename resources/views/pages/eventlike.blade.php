@extends('layouts.default')

@section('title')
    Evenements
@endsection

@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue">Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-blue">Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue">Boutique</button></a>
    @if(session()->has('logged_in') && session('logged_in'))
        <a href="{{ route('idea') }}"><button class="btn btn-outline-blue"><i class="far fa-lightbulb"></i> Boîte à idées</button></a>
    @endif
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

            <div>
                <a class="btn btn-link i"> <i class="fas fa-thumbs-up"></i></a>
            </div>
            <span class="text-right">
                @if($event['is_free'])
                    Free
                @else
                    Payant
                @endif

            </span>
            <hr style="margin-top:25px; border-top: 1px dashed #8c8b8b;">
        </div>
        @endforeach

        <br>

        <div class="col-8">
            <button class="btn btn-blue"> <i class="fas fa-plus"></i> Ajouter un commentaire </button>
            <div class="row">
                <div class="col">
                    <span style="font-weight: bold;"> Commentaires </span>
                </div>
            </div>
            <?php $i = 0; ?>
            @foreach($comments as $comment)
                <span>{{ $users[$i]['first_name'] }} {{ $users[$i]['last_name'] }}</span>
                <div class="border" style="height:102px;">
                    <div>{{ $comment['comment'] }}</div>
                </div>
                <hr style="margin-top:25px; border-top: 1px dashed #8c8b8b;">
                <?php $i++; ?>
            @endforeach
        </div>

    </div>

@endsection
