<!-- Logo -->
<a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>BP</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>BluePanel</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- Notifications: style can be found in dropdown.less -->

            <!-- Tasks: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href=""><!-- this is needed to get the formatting correct even though it's not a link! -->
                    @auth
                        <img src="https://s.gravatar.com/avatar/{{md5( strtolower( trim( Auth::user()->email ) ) )}}?s=100"
                             class="user-image" alt="User Image">
                    @endauth
                    @guest
                        <img src="{{asset('vendor/adminlte/img/user2-160x160.jpg')}}" class="user-image"
                             alt="User Image">
                    @endguest
                    @guest
                        <span class="hidden-xs">Guest</span>
                    @endguest
                    @auth
                        <span class="hidden-xs">{{ucfirst(Auth::user()->name_first) . " " . ucfirst(Auth::user()->name_last)}}</span>
                    @endauth


                </a>
            <li>
                @auth
                <a href="{{route('logout')}}" id="logoutButton" data-toggle="tooltip" data-placement="bottom" title=""
                   data-original-title="Logout"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a></li>
                @endauth
                @guest
		<a href="/login">
			<i class="fa fa-sign-in"></i><!-- this needs to be separated from the left more. Maybe bigger too -->
		</a>
		@endguest

        </ul>

        <!-- Control Sidebar Toggle Button -->


    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
</nav>
