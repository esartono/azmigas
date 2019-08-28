@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('home.stock')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Grafik Penjualan</h3>
                    <br>
                    <div style="height: 85%">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
{!! $chart->script() !!}
@endsection
