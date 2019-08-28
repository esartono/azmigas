@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <center><h1>Pilih Transaksi</h1></center>
            </div>
            <div class="card-body">
                <h1>
                    <center>
                        <a class="btn btn-primary pilih" href="{{url('/product_transactions/create?stat=sale')}}">
                            <h2>
                                <i class="fas fa-tags"></i> Penjualan
                            </h2>
                        </a>
                        &nbsp; | &nbsp;
                        <a class="btn btn-warning pilih" href="{{url('/product_transactions/create?stat=buy')}}">
                            <h2>
                                <i class="fas fa-shopping-cart"></i> Pembelian
                            </h2>
                        </a>
                    </center>
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection