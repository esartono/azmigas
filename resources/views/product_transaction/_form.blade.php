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
    <div class="col-md-2">
        {!! Form::label('Konsumen', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::select('customer_id',App\Customer::konsumen(), null, ['class' => 'form-control', 'id' => 'konsumen']) !!}
    </div>
    <div class="col-md-1">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addKonsumen">
            <i class="fas fa-plus"></i> 
        </button>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-2">
        {!! Form::label('Tanggal Transaksi', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        <small class="form-text text-muted">Format : bulan / tanggal / tahun</small>
        <small class="form-text text-muted">{!! $errors->first('date', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>