<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            @auth
                <img src="https://s.gravatar.com/avatar/{{md5( strtolower( trim( Auth::user()->email ) ) )}}?s=100"
                     class="img-circle" alt="User Image">
            @endauth
            @guest
                <img src="{{asset('vendor/adminlte/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            @endguest
        </div>
        <div class="pull-left info">
            @guest
                <p>Guest</p>
            @endguest
            @auth
                <p>{{ucfirst(Auth::user()->name_first) . " " . ucfirst(Auth::user()->name_last)}}</p>
            @endauth

        </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ACTIVITIES</li>

        <li class="{{ Request::is('/home') ? 'active' : '' }}">

            <a href="/home">
                <i class="fa fa-user-secret"></i> <span>Present Students</span>
                <span class="pull-right-container">
                        </span>
            </a>
        </li>

        <li class="treeview">
            <a href="">
                <i class="fa fa-clock-o"></i> <span>Recent Students</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                @foreach(\App\Kiosk::all() as $kiosk)
                    <li>
                        <a href="/kiosks/{{$kiosk->id}}/logs"><i class="fa fa-circle-o"></i>{{$kiosk->name}}</a>
                    </li>
                @endforeach

            </ul>
        </li>
        @auth
            <li class="header">User Tasks</li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-desktop"></i> <span>My Kiosks</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach(Auth::user()->kiosks as $kiosk)
                        <li>
                            <a href="{{ url('kiosks', [$kiosk->id]) }}">
                                <i class="fa fa-circle-o"></i>
                                {{$kiosk->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </li>

            @if ( Auth::user()->isAdministrator())


                <li class="header">Administrative Tasks</li>


                <li class="{{ Request::is('kiosks') ? 'active' : '' }}">

                    <a href="/kiosks">
                        <i class="fa fa-database"></i> <span>Manage Kiosks</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                </li>
                <li class="{{ Request::is('users') ? 'active' : '' }}">

                    <a href="/users">
                        <i class="fa fa-users"></i> <span>Manage Users</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                </li>
            @endif
        @endauth

    </ul>
</section>

