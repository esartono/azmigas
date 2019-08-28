@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card card-primary">
            <div class="card-header">
                <strong> Edit Tipe Penjualan / Pembelian</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::model($typeProductTransaction, ['route' => ['type_product_transactions.update', $typeProductTransaction->id], 'method' => 'put']) !!}
                    @include('type_product_transaction._form')
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@endsection
