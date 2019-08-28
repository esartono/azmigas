@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card card-primary">
            <div class="card-header">
                <strong> Data Tipe Pembelian / Penjualan</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'type_product_transactions.store'], ['class' => 'form-horizontal']) !!}
                    @include('type_product_transaction._form')
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@endsection