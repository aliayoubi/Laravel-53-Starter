<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><i class="fa fa-code"></i> {{config('app.name')}}</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{active(['/', 'home'])}}"><a href="/"><i class="glyphicon glyphicon-home"></i> Home</a></li>

                @if (Auth::check())
                    <li class="{{active(['dashboard'])}}"><a href="{{route('dashboard')}}"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
                @endif

                @if(Auth::check() && Auth::user()->isAdmin())
                    <li><a target="_blank" href="{{route('admin_panel')}}"><i class="glyphicon glyphicon-cog"></i> Admin Panel</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li class="{{active('login')}}"><a href="{{ url('/login') }}"><i class="glyphicon glyphicon-log-in"></i> Sign In</a></li>
                    <li class="{{active('register')}}"><a href="{{ url('/register') }}"><i class="glyphicon glyphicon-user"></i> Create Account</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="glyphicon glyphicon-log-out"></i> Sign Out
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>