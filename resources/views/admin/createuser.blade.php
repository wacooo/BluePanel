@extends('layouts.app')
@section('content-header')


    <h1>
        <small>Create User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create User</li>
    </ol>

@endsection

@section('content')
    <div class="row">
        <form action="/users" method="post">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Identity</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="registered" class="control-label">Email</label>
                            <div>
                                <input type="email" name="email" placeholder="galletha250@gotvsdb.ca"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registered" class="control-label">First Name</label>
                            <div>
                                <input type="text" name="name_first" placeholder="Ethan"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registered" class="control-label">Last Name</label>
                            <div>
                                <input type="text" name="name_last" placeholder="Gallant"
                                       class="form-control form-autocomplete-stop">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {{ csrf_field() }}
                        <input type="submit" value="Create User" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Password</h3>
                    </div>
                    <div class="box-body">
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
                                    <option value="0" selected="">No</option>
                                    <option value="1">Yes</option>
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
    </div>
@endsection