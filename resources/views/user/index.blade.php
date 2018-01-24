@extends('layout.main')
@section('title','favourites')
@section('content')


    <div class="col-md-offset-2 col-md-8">
        @include('partials.errors')

        <table class="table col-md-12">
            <h3 class="text-success">{{$userName}}'s Profile:</h3><br>
            <tr>
                <th class="col-md-3">ID</th>
                <th class="col-md-3">
                    Item Name
                </th>
                <th class="col-md-2">Added at</th>
                <th class=" col-md-1">Image</th>
                <th class="col-md-1 col-md-offset-3">Action</th>
            </tr>

            @foreach($favDishes as $dish)
                <tr class="panel panel-default">
                    <td>{{$dish->uniqueUrl}}</td>
                    <td>
                        <a href="/recipe/{{$dish->uniqueUrl}}">
                            {{$dish->recipeLabel}}
                        </a>
                    </td>
                    <td>{{$dish->created_at}}</td>

                    <td>
                        <img src="{{$dish->imageUrl}}" alt="image"/>
                    </td>

                    <td><a href="/delete/{{$dish->id}}"><i class="fa fa-trash col-md-offset-3" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
    <div class="clearfix"></div>

@endsection
