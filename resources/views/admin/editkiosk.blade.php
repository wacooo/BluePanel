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
@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Kiosk</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" lpformnum="1">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Room Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Room Name"
                                   value="{{$kiosk->name}}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="room">Room Number</label>
                            <input type="text" class="form-control" id="room" placeholder="Room Number"
                                   value="{{$kiosk->room}}" autocomplete="off">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
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
                        <tr>
                            @foreach($kiosk->users as $user)
                                <td><code>{{$user->id}}</code></td>
                                <td>{{$user->name_first}}</td>
                                <td>{{$user->name_last}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <button onclick="removeUserFromKiosk({{$kiosk->id}}, {{$user->id}})" class="btn btn-xs btn-danger"><i
                                                class="fa fa-trash-o"></i> Revoke
                                    </button>
                                </td>
                            @endforeach

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Delete User</h3>
                </div>
                <div class="box-body">
                    <p class="no-margin">There must be no servers associated with this account in order for it to be
                        deleted.</p>
                </div>
                <div class="box-footer">
                    <form action="https://panel.dragonsdoom.net/admin/users/view/1" method="POST">
                        <input type="hidden" name="_token" value="rPxCLNjsnsvq89stFyWc36X2aZbzLS5JFQETxwM9">
                        <input type="hidden" name="_method" value="DELETE">
                        <input id="delete" type="submit" class="btn btn-sm btn-danger pull-right" 1=""
                               value="Delete User">
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('scripts')
    <script>
    function removeUserFromKiosk(kioskid, userid){
        $.ajax({
            url:"/kiosk/" + kioskid + "/detach/" + userid + "/",
            type:"DELETE",
            success: function(result){
                location.reload();
            }
        })

    }
    </script>
@endpush