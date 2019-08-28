@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="title-1 m-b-25">Data Tipe Penjualan / Pembelian</h2>
        <div class="add-button">
            <a href="{{ route('type_product_transactions.create') }}" class="btn btn-primary"><i class="zmdi zmdi-collection-plus zmdi-hc-lg"></i> Tambah Tipe</a>
        </div>

        <div class="table-responsive m-b-40">
            {!! $html->table(['class'=>'table table-borderless table-data4']) !!}
        </div>
    </div>
</div>

@endsection

@section('script')
    {!! $html->scripts() !!}
@endsection