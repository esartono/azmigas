@if ( $driver == false )
    {!! Form::open(['route' => 'drivers.store'], ['class' => 'form-horizontal']) !!}
    {!! Form::hidden('employee_id', $id) !!}
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i>
        </button>
    {!! Form::close() !!}
@else    
        <button class="btn btn-success btn-sm">
            <i class='fa fa-check'></i>
        </button>
@endif