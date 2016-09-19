<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="{{ url('/') }}" class="brand-logo">
            {{ config('app.name', 'Laravel') }}
        </a>

        <ul class="right hide-on-med-and-down">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Sign In</a></li>
                <li><a href="{{ url('/register') }}">Create Account</a></li>
            @else
                <li>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        Sign Out
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>

</nav>
