@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        {!! Form::open(['route' => 'product_transactions.store'], ['class' => 'form-horizontal']) !!}
            {!! Form::hidden('is_sale', true) !!}
                <div class="card card-primary">
                        <div class="card-header">
                            <strong> Form Penjualan Produk</strong>
                        </div>
                        <div class="card-body card-block">
                            @include('product_transaction._form')
                            <hr>
                            @include('product_transaction._product')
                        </div>
                <div class="card-footer">
                    {!! Form::submit('Cetak', ['class' => 'btn btn-rounded btn-primary']) !!}
                    <a href="{{ route('home') }}" class='btn btn-rounded btn-warning'> Batal </a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('modal')
    @include('product_transaction._modal')
@endsection