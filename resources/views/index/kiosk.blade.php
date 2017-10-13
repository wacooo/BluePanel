@extends('layouts.app')

@section('content')
    @foreach($kiosks as $kiosk)
        <div class="card text-white bg-primary" style="max-width: 20rem;">

            <div class="card-body">
                <h3 class="card-title">{{$kiosk->name}}</h3>
                <p>Created at: {{$kiosk->created_at}}</p>
                <!-- Links -->
                <a href="#" class="card-link">Show Kiosk</a>
                <a href="#" class="card-link">Edit Kiosk</a>
            </div>

        </div>
    @endforeach
    \    <!--/.Card-->
    {{print_r($kiosks)}}

@endsection