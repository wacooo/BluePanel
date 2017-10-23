@extends('layouts.app')
@section('content-header')


    <h1>
        {{$user->name}}
        <small>Edit user profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User</li>
    </ol>

@endsection

@section('content')

    <div class="row">
        <form action="https://panel.dragonsdoom.net/admin/users/view/2" method="post">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Identity</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <div>
                                <input readonly="" type="email" name="email" value="test"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="registered" class="control-label">First Name</label>
                            <div>
                                <input readonly="" type="text" name="name_first" value="test"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registered" class="control-label">Last Name</label>
                            <div>
                                <input readonly="" type="text" name="name_last" value="test"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="_token" value="u46gaPkpNplpeMD2LaIQxSCJ2foqxGABKgt4k7Qg">
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
                                <option>Kiosk 1</option>
                                <option>Kiosk 2</option>
                                <option>Kiosk 3</option>
                                <option>Kiosk 4</option>
                                <option>Kiosk 5</option>
                                <option>Kiosk 6</option>

                            </select>
                        </div>
                    </div>
                    <div class="box-footer">

                        <input type="submit" value="Update" class="btn btn-primary btn-sm">
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
                            <th>Remove from kiosk</th>
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
                                <td><input type="submit" value="Remove" class="btn btn-danger btn-sm"></td>
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