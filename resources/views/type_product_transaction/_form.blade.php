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
            {!! Form::label('Nama', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('name', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
            {!! Form::label('Jual/Beli', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::select('is_sale', [1=>'Jual', 0=>'Beli'], null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('sale', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Stok Bertambah', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::select('add', App\Product::tipeProduk(), null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('add', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Stok Berkurang', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::select('minus',App\Product::tipeProduk(), null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('minus', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="card-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>