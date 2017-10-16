@extends('layouts.app')
@push('styles')
    <style>
        .ds-btn li{ list-style:none; float:left; padding:10px; }
        .ds-btn li a span{padding-left:15px;padding-right:5px;width:100%;display:inline-block; text-align:left;}
        .ds-btn li a span small{width:100%; display:inline-block; text-align:left;}
        .btn-xl {
            padding: 20px 20px;
            font-size: 20px;
            border-radius: 10px;
        }
    </style>
    @endpush
@section('content')
    <div class="container padding">
        <div class="row">
            <h2 class="text-center">Your Kiosks</h2>
            <ul class="ds-btn">
                <li>
                    <a class="btn btn-r1 btn-xl hvr-bob " href="#">
                        <i class="glyphicon glyphicon-barcode pull-left"></i><span>Kiosk 1<br><small>Lorem ipsum dolor</small></span></a>

                </li>
                <li>
                    <a class="btn btn-o1 btn-xl btn-primary hvr-bob" href="#">
                        <i class="glyphicon glyphicon-barcode pull-left"></i><span>Kiosk 2<br><small>Lorem ipsum dolor</small></span></a>

                </li>
                <li>
                    <a class="btn btn-y1 btn-xl btn-success hvr-bob" href="#">
                        <i class="glyphicon glyphicon-barcode pull-left"></i><span>Dashboard<br><small>Lorem ipsum dolor</small></span></a>

                </li>
                <li>
                    <a class="btn btn-g1 btn-xl btn-danger hvr-bob" href="#">
                        <i class="glyphicon glyphicon-barcode pull-left"></i><span>Daily Tasks<br><small>Lorem ipsum dolor</small></span></a>

                </li>
                <li>
                    <a class="btn btn-b1 btn-xl btn-warning hvr-bob" href="#">
                        <i class="glyphicon glyphicon-barcode pull-left"></i><span>Search<br><small>Lorem ipsum dolor</small></span></a>
                </li>
                <li>
                    <a class="btn btn-p1 btn-xl btn-info hvr-bob" href="#">
                        <i class="glyphicon glyphicon-barcode pull-left"></i><span>List Group<br><small>Lorem ipsum dolor</small></span></a>
                </li>
                <li>
                    <a class="btn btn-v1 btn-xl btn-info hvr-bob" href="#">
                        <i class="glyphicon glyphicon-barcode pull-left"></i><span>List Group<br><small>Lorem ipsum dolor</small></span></a>
                </li>
            </ul>

        </div>
    </div>



@endsection