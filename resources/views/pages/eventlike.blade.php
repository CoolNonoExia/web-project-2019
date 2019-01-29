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
            <form method="POST" action="{{ route('ComAdd', '') }}\{{ Request::segment(2) }}" enctype="multipart/form-data">
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
        @foreach($comments as $comment)
            <span>{{$comment['id_user']}}</span>

        <div class="border" style="height:102px;">
            <div>{{$comment['comment']}}</div>
        </div>
        <hr style="margin-top:25px; border-top: 1px dashed #8c8b8b;">
        @endforeach

    <script>
        $('#image').on('change', function(){
            //get the file name
            let fileName = $(this).val().split('\\').pop();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        $("form").hide();

        $(document).ready(function(){
            $("#hide").click(function(){
                $("form").hide(1000);
            });
            $("#show").click(function(){
                $("form").show(1000);
            });
        });
     </script>


@endsection
