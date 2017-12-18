@extends('layout.main')

@section('title','shirts')
@section('content')

<div class="col-md-offset-3 col-md-6">
    <h3 class="text-success">{{$userName}}'s Profile:</h3><br>

    @include('partials.errors')


    <table class="table col-md-12">

        <tr>
            <th class="col-md-4 col-md-offset-2">
                Item Name
            </th>

            <th class="col-md-4">Added at</th>
            <th class=" col-md-4">Action</th>
        </tr>

        @foreach($favDishes as $dish)

            <div class="panel panel-default">
                <!-- Default panel contents -->

                <!-- Table -->
                @php
                    $dishDirectory = $dish->recipeLabel;

                    for($i = 0; $i < strlen($dishDirectory); $i++){
                        if($dishDirectory[$i]==' ')
                            $dishDirectory[$i] = '_';
                   }
                @endphp



                    <tr>

                        <td>
                            <a href="/recipe/{{$dishDirectory}}">
                                {{$dish->recipeLabel}}
                            </a>
                        </td>
                        <td>{{$dish->created_at}}</td>
                        <td><a href="/delete/{{$dish->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>

                    </tr>
        </div>
    @endforeach

    </table>


</div>

@endsection