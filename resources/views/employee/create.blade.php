@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <strong> Data Karyawan</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'employees.store'], ['class' => 'form-horizontal']) !!}
                    @include('employee._form')
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@endsection