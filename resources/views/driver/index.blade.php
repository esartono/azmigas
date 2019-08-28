@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h2 class="title-1 m-b-25">Data Supir</h2>
        <div class="add-button">
            <a href="{{ route('drivers.create') }}" class="btn btn-primary"><i class="zmdi zmdi-collection-plus zmdi-hc-lg"></i> Tambah Supir</a>
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