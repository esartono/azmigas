{!! Form::open(['route' => $form_url, 'method' => 'delete', 'class' => 'form-inline'] ) !!}
@if(isset($edit_url))
    <a href="{{ $edit_url }}" class='btn btn-sm btn-rounded btn-warning'> EDIT </a> &nbsp;
@endif
@if(isset($show_url))
    <a href="{{ $show_url }}" class='btn btn-sm btn-rounded btn-info'> DETAIL </a> &nbsp;
@endif
{!! Form::submit('DELETE', ['class'=>'btn btn-sm btn-rounded btn-danger']) !!}
{!! Form::close()!!}