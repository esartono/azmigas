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
    <div class="col col-md-3">
            {!! Form::label('NIK (no. KTP)', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-4">
        {!! Form::text('nik', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('nik', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
            {!! Form::label('Nama Karyawan', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-4">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('name', '<p class="text-danger">:message</p>') !!}</small>
    </div>

    <div class="col col-md-1">
        {!! Form::label('Kelamin', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-3">
        {!! Form::select('jk',['L'=>'Laki-laki', 'P'=>'Perempuan',], null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('jk', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
            {!! Form::label('Tempat Lahir', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-4">
        {!! Form::text('birth_place', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('birth_place', '<p class="text-danger">:message</p>') !!}</small>
    </div>
    <div class="col col-md-1">
        {!! Form::label('Tanggal', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-4">
        {!! Form::date('birth_date', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">Format : bulan / tanggal / tahun</small>
        <small class="form-text text-muted">{!! $errors->first('birth_date', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
            {!! Form::label('Alamat', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-9">
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('address', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
            {!! Form::label('No. Hp', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-4">
        {!! Form::text('phone1', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('phone1', '<p class="text-danger">:message</p>') !!}</small>
    </div>
    <div class="col col-md-1">
            {!! Form::label('No. Hp', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-4">
        {!! Form::text('phone2', null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('phone2', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="card-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>