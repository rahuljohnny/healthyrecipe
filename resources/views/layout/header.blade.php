<div  class="top-bar">
    <div style="color:whitesmoke" class="top-bar-left">
        <h4 class="brand-title">
            <a href="/"> <!-- /home it was -->
                <i class="fa fa-home fa-lg" aria-hidden="true">
                </i>
                Kekapu's Kitchen(KK)
            </a>
        </h4>
    </div>

    <div class="top-bar-right">
        <ol class="menu">

            <li>

                <form class="navbar-form navbar-left" id="searchForm" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="search" id="searchBar">
                    </div>
                    <button id="searchButton" type="submit" class="btn btn-primary" onclick="searchValue()">Search</button>
                </form>

                {{--curl "https://api.edamam.com/search?q=chicken&app_id=${YOUR_APP_ID}&app_key=${YOUR_APP_KEY}&from=0&to=3&calories=gte%20591,%20lte%20722&health=alcohol-free"--}}
            </li>


            <li>
                <a href="/userprofile">
                    <strong>Favourites</strong>
                    <i class="fa fa-rss fa-lg col-md-2" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <strong>Hot</strong>
                    <i class="fa fa-cutlery fa-lg col-md-2" aria-hidden="true"></i>

                </a>
            </li>
            <li>
                <a href="/userprofile">
                    <i class="fa fa-user-circle fa-lg" aria-hidden="true">
                    </i>

                    @if(Auth::user())
                    <strong>{{Auth::user()->name}}</strong>
                    <span class="caret"></span>
                    @endif


                </a>


            </li>
            <li>
                @if(!Auth::user())
                    <a href="/login"><strong>Login</strong></a>
                @endif
            </li>

            @if(Auth::user())
                <li>
                    <a href="/logout"><strong>Log out</strong></a>
                </li>
            @endif

        </ol>
    </div>
</div>

<br><br>

@if('resultContainer')
    @include('search.searchresultstore')
@endif

<script>
    var token = '{{Session::token()}}';
    //var urlNew = '{{route('storeValue')}}';
</script>

