<section class="sidebar">
    <!-- Sidebar user panel -->
  <div class="user-panel">
    <!--    <div class="pull-left info">
            @guest
                <p>Guest</p>
            @endguest
            @auth
                <p>{{ucfirst(Auth::user()->name_first) . " " . ucfirst(Auth::user()->name_last)}}</p>
            @endauth

        </div>
-->
    </div>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header bg-blue">LOGS</li>

        <li class="{{ Request::is('/home') ? 'active' : '' }}">

            <a href="/home" title="Students currently logged in">
                <i class="fa fa-user-secret"></i> <span>Students logged in</span>
                <span class="pull-right-container">
                        </span>
            </a>
        </li>

        <li class="treeview">
            <a href="">
                <i class="fa fa-clock-o"></i> <span>Kiosk Logs</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                @foreach(\App\Kiosk::all() as $kiosk)
                    <li>
			<hr>
                        <a href="/kiosks/{{$kiosk->id}}/todaylogs"><i class="fa fa-circle-o"></i>{{$kiosk->name}} - today</a>
                        <a href="/kiosks/{{$kiosk->id}}/logs"><i class="fa fa-circle"></i>{{$kiosk->name}} - yesterday</a>
                        <a href="/kiosks/{{$kiosk->id}}/logs"><i class="fa fa-list"></i>{{$kiosk->name}} - all</a>
                    </li>
                @endforeach

            </ul>
        </li>
        @auth
            <li class="header bg-blue">USER TASKS</li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-desktop"></i> <span>Start Kiosk</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach(Auth::user()->kiosks as $kiosk)
                        <li>
                            <a href="#"
                               onclick="swal({
                                       title: 'Are you sure?',
                                       text: 'Once a kiosk is loaded your account will be logged out and a kiosk session will start.',
                                       icon: 'warning',
                                       buttons: true,
                                       dangerMode: true,
                                       }).then((willRedirect) => {
                                         if (willRedirect) {
                                           window.location = '/kiosks/{{$kiosk->id}}';
                                         }
                                       });
                                       ">
                                <i class="fa fa-circle-o"></i>
                                {{$kiosk->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </li>

            @if ( Auth::user()->isAdministrator())

                <li class="header bg-green">ADMINISTRATIVE TASKS</li>


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
