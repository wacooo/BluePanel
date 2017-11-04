@extends('layouts.app')
@section('content-header')


    <h1>
        {{$user->username}}
        <small>Edit user profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User</li>
    </ol>

@endsection

@section('content')

    <div class="row">
        <form action="" method="post">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Identity</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <div>
                                <input readonly="" type="email" name="email" value="{{$user->email}}"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registered" class="control-label">Username</label>
                            <div>
                                <input readonly="" type="text" name="username" value="{{$user->username}}"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registered" class="control-label">Client First Name</label>
                            <div>
                                <input readonly="" type="text" name="name_first" value="{{$user->name_first}}"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registered" class="control-label">Client Last Name</label>
                            <div>
                                <input readonly="" type="text" name="name_last" value="{{$user->name_last}}"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {{ csrf_field() }}
                        <input type="submit" value="Update User" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Password</h3>
                    </div>
                    <div class="box-body">
                        <div class="alert alert-success" style="display:none;margin-bottom:10px;" id="gen_pass"></div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <div>
                                <input readonly="" type="password" id="password" name="password"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Assign Kiosk</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-control">
                                    {{--Get the kiosks that the user doesnt currently have--}}
                                    @foreach(App\Kiosk::all()->diff($user->kiosks)->all() as $kiosk)
                                        @if(!in_array($kiosk, $user->kiosks->toArray()))
                                            <option>{{$kiosk->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">

                            <input type="submit" value="Update" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Permissions</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="root_admin" class="control-label">Administrator</label>
                            <div>
                                <select name="root_admin" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1" selected="&quot;selected&quot;">Yes</option>
                                </select>
                                <p class="text-muted">
                                    <small>Setting this to 'Yes' gives a user full administrative access.</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Kiosks</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width:2%;"></th>
                            <th>ID</th>
                            <th>Kiosk Name</th>
                            <th>Room</th>
                            <th>Created at</th>
                            <th style="width:10%;"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($user->kiosks as $kiosk)
                            <tr>
                                <td></td>
                                <td>{{$kiosk->id}}</td>
                                <td>{{$kiosk->name}}</td>
                                <td>{{$kiosk->room}}</td>
                                <td>{{$kiosk->created_at}}</td>
                                <td></td>


                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Delete User</h3>
                </div>
                <div class="box-body">
                    <p class="no-margin">There must be no servers associated with this account in order for it to be
                        deleted.</p>
                </div>
                <div class="box-footer">
                    <form action="https://panel.dragonsdoom.net/admin/users/view/2" method="POST">
                        <input type="hidden" name="_token" value="u46gaPkpNplpeMD2LaIQxSCJ2foqxGABKgt4k7Qg">
                        <input type="hidden" name="_method" value="DELETE">
                        <input id="delete" type="submit" class="btn btn-sm btn-danger pull-right" disabled=""
                               value="Delete User">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection