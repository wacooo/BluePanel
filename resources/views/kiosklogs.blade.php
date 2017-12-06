@extends('layouts.app')

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#kiosktable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
		"order": [[ 1, 'asc' ], [ 2, 'asc' ]],

                "autoWidth": true,
                ajax: '/kiosks/{{$kiosk->id}}/logs',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'last', name: 'last'},
                    {data: 'first', name: 'first'},
                    {data: 'gender', name: 'gender'},
                    {data: 'pivot.type', name:'pivot.type'},
                    {data: 'pivot.created_at', name: 'pivot.created_at'},
                //    {data: 'pivot.updated_at', name: 'pivot.updated_at'}
                ]
            });
        });
    </script>
@endpush


@section('content-header')
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$kiosk->name}} Logs</h3>
            <h4>Room {{$kiosk->room}}</h4>
        </div>
        <!-- /.box-header -->
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" id="kiosktable">
                    <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Last</th>
                        <th>First</th>
                        <th>Gender</th>
                        <th>Type</th>
                        <th>Sign In/Out time</th>
                  <!--      <th>Updated At</th>		-->
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
