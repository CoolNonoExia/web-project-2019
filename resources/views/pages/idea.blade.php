@extends('layouts.default')
@section('title')
    Boîte à idée
@endsection
@section('navbar')
    <a href="{{route('home')}}"><button class="btn btn-outline-blue"><i class="fas fa-home"></i> Accueil</button></a>
    <a href="{{route('eve')}}"><button class="btn btn-outline-blue"><i class="fas fa-calendar-day"></i> Evenements</button></a>
    <a href="{{route('boutique')}}"><button class="btn btn-outline-blue"><i class="fas fa-cash-register"></i> Boutique</button></a>
    <a href="{{ route('idea') }}"><button class="btn btn-blue"><i class="far fa-lightbulb"></i> Boîte à idées</button></a>
@endsection
@section('content')
    <p style="text-align: center"><b>Boîte à idées</b></p>
    <hr>

    <p style="text-align: center">Vous retrouverez ici l'ensemble des événements proposés par les étudiants du Campus CESI de Nice</p>
    <p style="text-align: center">N'hésitez pas à voter pour un événement si celui-ci vous intéresse !</p>
    <p style="text-align: center">Si un événement reçoit suffisament de votes, le BDE l'organisera sûrement</p>
    <hr>
    <div class="text-center">
        <button class="btn btn-success font-italic" id="show">Ajoutez vos idées !</button>
    </div>

    <form method="POST" action="{{ route('ideaAdd') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ old('title') }}" placeholder="BBQ, concert...">
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <input class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" id="desc" name="desc" value="{{ old('desc') }}" placeholder="Propositions, lieu...">
            @if ($errors->has('desc'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('desc') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="imgUpload">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" name="image" value="{{ old('image') }}" aria-describedby="imgUpload" accept="image/jpeg, image/png, image/bmp, image/gif, image/svg">
                <label class="custom-file-label" for="image">Choisir image</label>

                @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-success text-white"  >Submit</button>
    </form>

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



    <div class="row justify-content-center">
        <div class="col-9" style="margin: 30px 0px; background-color: #1b4b72; color: white; font-weight: bold; padding:4px">
            <p>Activités proposées</p>
        </div>
    </div>


    @foreach($ideas as $idea)
        <br>
        <div class="row">
            <div class="col-1 bg-warning border border-secondary">
                <span>Idée numéro {{$idea['id']}} :</span>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="border" style="height:50px; width: 350px;">
                <span style="font-weight: bold;"><u> {{$idea['title']}}</u></span>
                <p>{{$idea['description']}}</p>
            </div>

            @if($idea['like'])
                <span><button class="btn btn-primary"> <i class="fas fa-thumbs-up"></i></button> </span>
                <span style="padding: 10px;">{{$idea['votes_number']}}</span>
                <button class="btn btn-outline-danger" disabled> <i class="fas fa-thumbs-down"></i></button>
                <span style="padding: 10px;">{{$idea['unvotes_number']}}</span>
            @elseif ($idea['like']== false && $idea['dislike'] ==false)
                <form method="POST" action="{{ route('likeAdd', '') }}\{{$idea['id']}}" enctype="multipart/form-data">
                    @csrf
                    <span><button class="btn btn-outline-primary"> <i class="fas fa-thumbs-up"></i></button> </span>
                    <span style="padding: 10px;">{{$idea['votes_number']}}</span>
                </form>
                <form method="POST" action="{{ route('dislikeAdd', '') }}\{{$idea['id']}}" enctype="multipart/form-data">
                    @csrf
                    <button class="btn btn-outline-danger"> <i class="fas fa-thumbs-down"></i></button>
                    <span style="padding: 10px;">{{$idea['unvotes_number']}}</span>
                </form>


            @elseif($idea['dislike'])
                <span><button class="btn btn-outline-primary" disabled> <i class="fas fa-thumbs-up"></i></button> </span>
                <span style="padding: 10px;">{{$idea['votes_number']}}</span>
                <button class="btn btn-danger"> <i class="fas fa-thumbs-down"></i></button>
                <span style="padding: 10px;">{{$idea['unvotes_number']}}</span>
            @endif


        </div>

        <?php $i=0; ?>
        {{--<p style="font-weight: bold">{{$users[$i]['first_name']}} {{$users[$i]['last_name']}}</p>--}}
        <?php $i++; ?>

        @endforeach

@endsection
