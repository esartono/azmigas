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
            {!! Form::label('Nama Kendaraan', null, ['class' => 'form-control-label']) !!}
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
        {!! Form::select('vehicle_type_id',App\VehicleType::tipe(), null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('vehicle_type_id', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
            {!! Form::label('No. Polisi', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::text('plate', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('plate', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Tanggal STNK', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::date('stnk_expired', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">Format : bulan / tanggal / tahun</small>
        <small class="form-text text-muted">{!! $errors->first('stnk_expired', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Tanggal Pajak', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::date('tax', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">Format : bulan / tanggal / tahun</small>
        <small class="form-text text-muted">{!! $errors->first('tax', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Uji Kendaraan', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::date('kir', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">Format : bulan / tanggal / tahun</small>
        <small class="form-text text-muted">{!! $errors->first('kir', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="card-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>