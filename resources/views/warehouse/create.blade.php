@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <strong> Data Gudang</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'warehouses.store'], ['class' => 'form-horizontal']) !!}
                    @include('warehouse._form')
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@endsection