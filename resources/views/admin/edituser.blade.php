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
        <form action="/users/{{$user->id}}" method="post">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Identity</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <div>
                                <input type="email" name="email" value="{{$user->email}}"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registered" class="control-label">Client First Name</label>
                            <div>
                                <input type="text" name="name_first" value="{{$user->name_first}}"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registered" class="control-label">Client Last Name</label>
                            <div>
                                <input type="text" name="name_last" value="{{$user->name_last}}"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put" />
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
                                <input type="password" id="password" name="password"
                                       class="form-control form-autocomplete-stop">
                            </div>
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
                                <select name="isadmin" class="form-control">
                                    <option value="0">No</option>
                                    @if($user->isAdministrator())
                                        <option value="1" selected="">Yes</option>

                                    @else
                                        <option value="1">Yes</option>
                                    @endif
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
                    <form action="/users/{{$user->id}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <input id="delete" type="submit" class="btn btn-sm btn-danger pull-right"
                               value="Delete User">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection