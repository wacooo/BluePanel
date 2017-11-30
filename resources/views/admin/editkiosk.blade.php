@extends('layouts.app')
@section('content-header')


    <h1>

        Edit Kiosk
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Kiosk</li>
    </ol>

@endsection

@push('scripts')
    <script>
        function removeUserFromKiosk(userid) {

            var url = "/kiosks/{{$kiosk->id}}/detach/" + userid;
            $.ajax({
                url: url,
                type: "DELETE",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (result) {
                    location.reload();
                }
            });
        }

        function addUserToKiosk() {
            var userArray = $("#addUserSelector").val();
            var i = 0;
            userArray.forEach(function (val) {
                i++;
                var url = "/kiosks/{{$kiosk->id}}/attach/" + val;
                $.ajax({
                    url: url,
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function () {
                        if (i = userArray.length) {
                            location.reload();
                        }
                    }

                });

            });
        }

        function removeTimeFromKiosk(time) {

            var url = "/kiosks/{{$kiosk->id}}/schedule";
            $.ajax({
                url: url,
                data: {
                    time:time
                },
                type: "DELETE",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (result) {
                    location.reload();
                }
            });
        }

        function addTimeToKiosk() {
            var timesArray = $("#timeSelectBox").val();
            var i = 0;
            timesArray.forEach(function (val) {
                i++;
                var url = "/kiosks/{{$kiosk->id}}/schedule";
                $.ajax({
                    url: url,
                    data:{
                      time: val
                    },
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (resp) {
                        if (i = timesArray.length) {
                            location.reload();
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });

            });
        }


    </script>
    <script>
        var addUserBox = $('.user-add-box').select2();
    </script>

@endpush
@section('content')
    <!-- added by MH to fix adding times (which were invisible). Where else is custom CSS put? -->
    <style>
    li.select2-selection__choice {
       background-color:#3c8dbc !important;
    }
    </style>

    <div class="row">
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Kiosk</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/kiosks/{{$kiosk->id}}" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Room Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Room Name"
                                   value="{{$kiosk->name}}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="room">Room Number</label>
                            <input type="text" class="form-control" name="room" placeholder="Room Number"
                                   value="{{$kiosk->room}}" autocomplete="off">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put"/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Kiosk Users</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        @foreach($kiosk->users as $user)
                            <tr>

                                <td><code>{{$user->id}}</code></td>
                                <td>{{$user->name_first}}</td>
                                <td>{{$user->name_last}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <button onclick="removeUserFromKiosk({{$user->id}})"
                                            class="btn btn-xs btn-danger"><i
                                                class="fa fa-trash-o"></i> Revoke
                                    </button>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>


            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Add User</h3>


                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select a user and click add</label><br>
                                <select class="user-add-box" style="width: 100%;" id="addUserSelector"
                                        multiple="multiple">

                                    @foreach(\App\User::all() as $user)
                                        <option value="{{$user->id}}">{{ucfirst($user->name_first) . " " . ucfirst($user->name_last)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-block btn-success" onClick="addUserToKiosk()">Add User
                                to Kiosk
                            </button>

                            <!-- /.form-group -->

                            <!-- /.form-group -->
                        </div>


                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

            </div>
        </div>


        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Kiosk Sign-Out Times</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Policy ID</th>
                            <th>Scheduled Time</th>
                            <th>Created At</th>
                        </tr>
                        @foreach($kiosk->schedule->sortBy('time') as $schedule)
                            <tr>

                                <td><code>{{$schedule->id}}</code></td>
                                <td>{{$schedule->time}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <button onclick="removeTimeFromKiosk('{{$schedule->time}}')"
                                            class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Remove
                                    </button>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Sign-out Times</h3>


                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Times selected here will be auto-signout times</label><br>
                                <select class="user-add-box" style="width: 100%;" id="timeSelectBox" name="times"
                                        multiple="multiple">
                                    @for($hours=0; $hours<24; $hours++)
                                        @for($mins=0; $mins<60; $mins+=5)
                                            <option value="{{str_pad($hours,2,'0',STR_PAD_LEFT).':' .str_pad($mins,2,'0',STR_PAD_LEFT)}}">
                                                {{str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT)}}
                                            </option>
                                        @endfor
                                    @endfor
                                </select>
                            </div>

                            <button type="button" class="btn btn-block btn-success" onClick="addTimeToKiosk()">
                                Set Times
                            </button>

                            <!-- /.form-group -->

                            <!-- /.form-group -->
                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Delete Kiosk</h3>
                </div>
                <div class="box-body">
                    <p class="no-margin">This action can not be undone. All users will loose access to this kiosk.</p>
                </div>
                <div class="box-footer">
                    <form action="{{'/kiosks/'.$kiosk->id}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <input id="delete" type="submit" class="btn btn-sm btn-danger pull-right" 1=""
                               value="Delete Kiosk">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--
    https://medium.com/@megvis17/film-analysis-of-the-movie-pleasantville-d30701e3d3d9
    -->

@endsection
