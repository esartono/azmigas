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
            {!! Form::label('Nama Produk', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('name', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Pilih Tipe', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::select('option_id',App\Option::tipeGas(), null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('option_id', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Harga Pokok Produk', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::number('price', null, ['class' => 'form-control', 'min' => 0]) !!}
        <small class="form-text text-muted">{!! $errors->first('price', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="card-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>