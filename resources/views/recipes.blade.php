@extends('layout.main')
@section('title','recipes')
@section('content')

    <div class="container-fluid" id="homePage">
        <div class="row text-center">

            <div class="well well-lg" id="btnTitle" style="background: #0c4d78">
                <h3 style="color: whitesmoke">Trendz goin on worldwide</h3>
            </div>

        </div>
        <br>
        <div class="row" id="rowToChange">

            @foreach($recipes as $dish)

                <a href="/recipe/{{$dish->uniqueUrl}}">

                    <div class="image-block col-sm-4"
                         style="background: url({{$dish->imageUrl}})no-repeat center top;background-size:cover;">

                        <p href="/recipe/{{$dish->uniqueUrl}}" style="background-size: cover">
                            {{$dish->recipeLabel}}
                        </p>
                    </div>

                </a>
            @endforeach


        </div>

    </div>

    <style>
        .headermessage {
            margin: 19px;
            color: black;
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            font-weight: bold;
        }
        .image-block {
            border: 3px solid white ;
            background-color: black;
            padding: 0px;
            margin: 0px;
            height:200px;
            text-align: center;
            vertical-align: bottom;
        }
        .image-block > p {
            width: 100%;
            height: 100%;
            font-weight: normal;
            font-size: 19px;
            padding-top: 150px;
            background-color: rgba(3,3,3,0.0);
            color: rgba(6,6,6,0.0);
        }
        .image-block:hover > p {
            background-color: rgba(3,3,3,0.5);
            color: white;
        }
    </style>
    <br>






@endsection