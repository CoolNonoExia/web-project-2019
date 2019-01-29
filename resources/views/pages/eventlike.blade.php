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

    </script>
    @foreach($events as $event)
    <div class="row">
        <div class="col-2" style="height: 150px;">
            {{-- Images --}}
            <?php $img = $imgs->find($event['id_images_events']) ?>
            <img src="{{asset('storage\\img\\events\\'.$img['id'].'.'.$img['ext'])}}" class="img-fluid" style="max-height: 100%; max-width: 100%;" />
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
            <br>
            <div>
                    @if($event['vote'])
                        <div>
                            <button disabled class="btn btn-primary" > <i class="fas fa-thumbs-up"></i></button>
                            <span>{{$event['likes_number']}}</span>
                        </div>
                    @else
                        <form method="POST" action="{{ route('voteAdd', '') }}\{{ Request::segment(2) }}" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-link"> <i class="fas fa-thumbs-up"></i></button>
                            <span>{{$event['likes_number']}}</span>
                        </form>
                    @endif

            </div>

            <span class="row">
                @if($event['is_free'])
                    Gratuit
                @else
                    Payant
                @endif

            </span>
        </div>
        @endforeach

        <br>
    </div>

    <div class="row">
                <div class="col-12 bg-dark" style="margin: 30px 0px; color: white; font-weight: bold; padding:2px 5px">
                    <span>Commentaires</span>
                </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-blue" id="show"> <i class="fas fa-plus"></i> Ajouter un commentaire </button>
        </div>
        <div class="col-12">
            <form method="POST" id="Com" action="{{ route('ComAdd', '') }}\{{ Request::segment(2) }}" enctype="multipart/form-data">
                @csrf
                <label class="d-block" for="desc">Commentaire</label>
                <div class="form-group input-group">

                    <input class="d-block form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" id="desc" name="desc" value="{{ old('desc') }}" placeholder="...">
                    @if ($errors->has('desc'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('desc') }}</strong>
                        </span>
                    @endif
                    <button type="submit" class="btn btn-info text-white"  >Add</button>
                </div>
            </form>
        </div>
    </div>
        <?php $i=0; ?>
        @foreach($comments as $comment)
            <span style="font-weight: bold">{{$users[$i]['first_name']}} {{$users[$i]['last_name']}}</span>
            <div class="border" style="height:102px;">
                <div>{{$comment['comment']}}</div>
            </div>
            <hr style="margin-top:25px; border-top: 1px dashed #8c8b8b;">
            <?php $i++; ?>
        @endforeach

    <script>
        $('#image').on('change', function(){
            //get the file name
            let fileName = $(this).val().split('\\').pop();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        $("Com").hide();

        $(document).ready(function(){
            $("#hide").click(function(){
                $("2").hide(1000);
            });
            $("#show").click(function(){
                $("2").show(1000);
            });
        });
     </script>


@endsection
