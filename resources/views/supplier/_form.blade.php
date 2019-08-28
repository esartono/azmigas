@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row form-group">
    <div class="col col-md-4">
            {!! Form::label('Nama Pemasok', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('name', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
            {!! Form::label('No. Telepon/HP', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('phone', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Alamat', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::text('address', null, ['class' => 'form-control', 'min' => 0]) !!}
        <small class="form-text text-muted">{!! $errors->first('address', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="card-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>