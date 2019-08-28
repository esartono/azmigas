@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <strong> Edit Data Pemasok</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::model($supplier, ['route' => ['suppliers.update', $supplier->id], 'method' => 'put']) !!}
                    @include('supplier._form')
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@endsection
