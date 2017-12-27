


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
                <a href="/userprofile">
                    <strong>Favourites</strong>
                    <i class="fa fa-rss fa-lg" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <strong>Hot</strong>

                    <i class="fa fa-cutlery fa-lg" aria-hidden="true"></i>

                </a>
            </li>
            <li>
                <a href="/userprofile">
                    <i class="fa fa-user-circle fa-2x" aria-hidden="true">
                    </i>
                    @if(Auth::user())
                        <strong>{{Auth::user()->name}}</strong>
                        <span class="caret"></span>
                    @endif
                </a>


            </li>

            @if(!Auth::user())
                <li>
                    <a href="/login"><strong>Login</strong></a>
                </li>
            @endif

            @if(Auth::user())
                <li>
                    <a href="/logout"><strong>Log out</strong></a>
                </li>
            @endif
        </ol>
    </div>
</div>
<br><br>
