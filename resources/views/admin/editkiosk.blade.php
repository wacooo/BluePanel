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
        function removeUserFromKiosk(kioskid, userid){
            var url = "/kiosks/" + kioskid + "/detach/" + userid;
            $.ajax({
                url:url,
                type:"DELETE",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(result){
                    location.reload();
                }
            });
            console.log(url);


        }



    </script>
    <script>
        $('.js-example-basic-multiple').select2();
    </script>
@endpush
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




<div class="col-md-6">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Add User</h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Minimal</label><br>
                        <select class="js-example-basic-multiple" name="states[]" style="width: 100%;" multiple="multiple">
                            @foreach(\App\User::all() as $user)
                                <option>{{ucfirst($user->name_first) . " " . ucfirst($user->name_last)}}</option>
                                @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-block btn-success">Add User to Kiosk</button>

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

@endsection