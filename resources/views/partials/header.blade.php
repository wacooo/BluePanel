<!-- Logo -->
<a href="../../index2.html" class="logo">
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('vendor/adminlte/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                    @guest
                        <span class="hidden-xs">Guest</span>
                    @endguest
                    @auth
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    @endauth


                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{asset('vendor/adminlte/img/user2-160x160.jpg')}}" class="img-circle"
                             alt="User Image">
                        @guest
                            <p>Guest</p>
                        @endguest
                        @auth
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        @endauth
                    </li>


                    <li class="user-footer">
                        @guest
                            <div class="row">
                                <div class="col-xs-4 text-center">

                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="{{route('login')}}" class="btn btn-default btn-flat">Login</a>
                                </div>
                                <div class="col-xs-4 text-center">

                                </div>
                            </div>
                        @endguest
                        @auth
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Edit Account</a>
                            </div>

                            <div class="pull-right">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">{{ csrf_field() }}</form>
                                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="btn btn-default btn-flat">Sign out</a>

                            </div>
                        @endauth
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

        </ul>
    </div>
</nav>
