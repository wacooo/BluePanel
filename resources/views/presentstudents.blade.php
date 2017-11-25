@extends('layouts.app')


@section('content-header')
@endsection
@section('content')
<!-- I don't think that any of this stuff is needed. The bootstrap col-lg-6 works fine as does AdminLTE box.  MH.
    <style>
        .col-lg-6 {
            float:none;
            display:inline-block;
            vertical-align:middle;
            margin-right:-4px;
        }

    </style>
-->
        @foreach(App\Kiosk::all() as $kiosk)
            <div class="col-lg-6">

                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$kiosk->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Student Number</th>
                                <th>Student First</th>
                                <th>Student Last</th>
                                <th>TimeStamp</th>
                            </tr>
                            @foreach($kiosk->students as $student)
                                <tr>
                                    <td><code>{{$student->id}}</code></td>
                                    <td>{{$student->first}}</td>
                                    <td>{{$student->last}}</td>
                                    <td>{{$student->pivot->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
@endsection
