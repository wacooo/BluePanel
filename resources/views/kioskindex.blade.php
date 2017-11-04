@extends('layouts.app')
@section('content-header')


    <h1>
        Kiosk Index

    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kiosk Index</li>
    </ol>

@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Launch Kiosk</h3>
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
                        <th>Launch</th>
                        <th style="width:10%;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach (App\Kiosk::all() as $kiosk)
                        <tr>
                            <td></td>
                            <td>{{$kiosk->id}}</td>
                            <td>{{$kiosk->name}}</td>
                            <td>{{$kiosk->room}}</td>
                            <td>{{$kiosk->created_at}}</td>
                            <td><a href="#"><button class="btn btn-primary">Launch</button></a></td>
                            <td></td>


                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection