<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('vendor/adminlte/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            @guest
                <p>Guest</p>
            @endguest
            @auth
                <p>{{ Auth::user()->name }}</p>
            @endauth

        </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        s

        <li class="treeview">
            <a href="#">
                <i class="fa fa-user-secret"></i> <span>Present Students</span>
                <span class="pull-right-container">
            </span>
            </a>
            <ul class="treeview-menu">

            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-clock-o"></i> <span>Recent Students</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                @foreach(\App\Kiosk::all() as $kiosk)
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i>{{$kiosk->name}}</a></li>
                @endforeach
            </ul>
        </li>
        @auth
            <li class="header">User Tasks</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-desktop"></i> <span>My Kiosks</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach(Auth::user()->kiosks as $kiosk)
                        <li><a href="../../index.html"><i class="fa fa-circle-o"></i>{{$kiosk->name}}</a></li>
                    @endforeach
                </ul>

            </li>

            @if ( Auth::user()->isAdministrator())


                <li class="header">Administrative Tasks</li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i> <span>Kiosk Management</span>
                        <span class="pull-right-container">

            </span>
                    </a>

                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>User Management</span>
                        <span class="pull-right-container">
            </span>
                    </a>


                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-desktop"></i> <span>Kiosks</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../index.html"><i class="fa fa-circle-o"></i>{{$kiosk->name}}</a></li>
                    </ul>
                </li>
            @endif
        @endauth

    </ul>
</section>

