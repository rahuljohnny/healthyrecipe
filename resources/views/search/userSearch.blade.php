<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Users</title>
</head>

<body>

<form class="navbar-form navbar-left" id="searchForm" action="/form">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" class="form-control" placeholder="search" id="searchBar">
    </div>
    <button id="searchButton" type="submit" class="btn btn-primary" onclick="searchValue()">Search</button>
</form>

@foreach($userName as $user)
    {{$user->id}}<br>
    {{$user->email}}<br>
    {{$user->name}}<br>
    <hr>
@endforeach





</body>
</html>