

<nav class="navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ !Request::segment(1) ? 'active' : null }}">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="{{ Request::segment(1) === 'posts' && Request::segment(2) === 'create' ? 'active' : null }}">
                    <a href="{{ url('posts/create') }}">Submit</a>
                </li>
                <li class="{{ Request::segment(1) === 'posts' && !Request::segment(2) === 'create' ? 'active' : null }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student Work <b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        <li><a href="{{ url('posts') }}">All</a></li>
                        <li><a href="#">Poetry</a></li>
                        <li><a href="#">Art</a></li>

                        <li><a href="#">Short Fiction</a></li>

                        <li><a href="#">Essays</a></li>
                        <li><a href="#">Other</a></li>

                    </ul>

                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li>
                        <a href="{{url('login')}}">Login</a>
                    </li>

                @endguest
                @auth
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>
                        <ul class="dropdown-menu multi-level" >

                            <li>
                                <a href="{{url('account')}}">Account</a>

                            </li>
                            @if (Auth::user()->isAdministrator() )
                                <li>
                                    <a href="{{url('adminlte')}}">Dashboard</a>

                                </li>
                            @endif
                            <li class="divider"></li>
                            <li>
                                <a href="{{url('logout')}}">Logout</a>

                            </li>

                        </ul>
                    </li>


                @endauth
            </ul>


        </div>
    </div>
</nav>
            </ul>
        </div>
    </div>
</nav>