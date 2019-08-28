@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <strong> Edit Data Produk</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}
                    @include('product._form')
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@endsection
