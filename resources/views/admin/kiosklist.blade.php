@extends('layouts.app')
@section('content-header')


    <h1>

        Edit Kiosk
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kiosks</li>
    </ol>

@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Kiosks</h3>
                    <div class="input-group input-group-sm pull-right">

                        <a href="{{route('kiosks.create')}}">
                            <button type="button" class="btn btn-sm btn-primary"
                                    style="border-radius: 0 3px 3px 0;margin-left:-1px;">Create New
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Room</th>
                            <th></th>

                        </tr>
                        @foreach (\App\Kiosk::all() as $kiosk)
                            <tr>
                                <td>{{$kiosk->id}}</td>
                                <td>{{$kiosk->name}}</td>
                                <td>{{$kiosk->room}}</td>
                                <td><a href="{{'kiosks/'.$kiosk->id.'/edit'}}">
                                        <button type="button" style="max-width: 5vw;"
                                                class="btn center-block btn-block btn-info">Edit
                                        </button>
                                    </a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection