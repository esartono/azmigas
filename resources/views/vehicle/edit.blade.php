@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <strong> Edit Data Kendaraan</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::model($vehicle, ['route' => ['vehicles.update', $vehicle->id], 'method' => 'put']) !!}
                    @include('vehicle._form')
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@endsection
