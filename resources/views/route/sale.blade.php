@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <strong> Form Penjualan Produk</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'product_transactions.store'], ['class' => 'form-horizontal']) !!}
                    {!! Form::hidden('is_sale', true) !!}
                    @include('product_transaction._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
    @include('product_transaction._modal')
@endsection