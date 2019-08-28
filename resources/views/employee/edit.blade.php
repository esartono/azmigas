@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <strong> Edit Data Karyawan</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'put']) !!}
                    @include('employee._form')
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@endsection
