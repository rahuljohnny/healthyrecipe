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

    <div class="top-bar-right col-sm-12">
        <ol class="menu col-sm-12">
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
                    <i class="fa fa-rss fa-lg" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <strong>Hot</strong>
                    <i class="fa fa-cutlery fa-lg col-md-2" aria-hidden="true"></i>

                </a>
            </li>

            @if(Auth::user())

            <li class="dropdown">
                <a href="/userprofile" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-user-circle fa-lg" aria-hidden="true">
                    </i>
                    <strong>{{Auth::user()->name}}</strong>
                    <span class="caret">
                    </span>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="1"><strong>Action</strong></a></li>
                    <li><a href="2"><strong>Another action</strong></a></li>
                    <li><a href="3"><strong>Something else here</strong></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="4"><strong>Separated link</strong></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/logout"><strong>Log Out</strong></a></li>
                </ul>
            </li>

            @endif


            <li>
                @if(!Auth::user())
                    <a href="/login"><strong>Login</strong></a>
                @endif
            </li>


        </ol>
    </div>
</div>

<br><br>

@include('search.searchresultstore')



<script>
    var token = '{{Session::token()}}';
</script>


