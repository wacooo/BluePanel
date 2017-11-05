@extends('layouts.app')
@section('content-header')


    <h1>
        Profile

    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Account</li>
    </ol>

@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Password</h3>
                        </div>
                        <form action="#" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="current_password" class="control-label">Current Password</label>
                                    <div>
                                        <input type="password" class="form-control" name="current_password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password" class="control-label">New Password</label>
                                    <div>
                                        <input type="password" class="form-control" name="new_password">
                                        <p class="text-muted small no-margin">Passwords must contain at least one
                                            uppercase, lowecase, and numeric character and must be at least 8 characters
                                            in length.</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password_again" class="control-label">Repeat New Password</label>
                                    <div>
                                        <input type="password" class="form-control" name="new_password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="_token" value="Change Password Token">
                                <input type="hidden" name="do_action" value="password">
                                <input type="submit" class="btn btn-primary btn-sm" value="Update Password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <form action="#" method="POST">
                            <div class="box-header with-border">
                                <h3 class="box-title">Info</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="first_name" class="control-label">First Name</label>
                                        <div>
                                            <input type="text" class="form-control" name="name_first" value="YOUR MOM">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="last_name" class="control-label">Last Name</label>
                                        <div>
                                            <input type="text" class="form-control" name="name_last" value="IS FAT">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer with-border">
                                <input type="hidden" name="_token" value="u46gaPkpNplpeMD2LaIQxSCJ2foqxGABKgt4k7Qg">
                                <input type="hidden" name="do_action" value="identity">
                                <button type="submit" class="btn btn-sm btn-primary">Update Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Email Address</h3>
                        </div>
                        <form action="#" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="new_email" class="control-label">New Email Address</label>
                                    <div>
                                        <input type="email" class="form-control" name="new_email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Current Password</label>
                                    <div>
                                        <input type="password" class="form-control" name="current_password">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                {!! csrf_field() !!}
                                {!! method_field('PATCH') !!}
                                <input type="submit" class="btn btn-primary btn-sm" value="Update Email Address">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection