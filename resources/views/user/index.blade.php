@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-body">
                <h2 class="title-1 m-b-25">Data User</h2>
                <div class="table-responsive m-b-40">
                    {!! $html->table(['class'=>'table table-borderless table-data4']) !!}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
    {!! $html->scripts() !!}
@endsection