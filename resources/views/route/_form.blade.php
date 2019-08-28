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
        {!! Form::label('Konsumen', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-10 col-md-6">
        {!! Form::select('customer_id',App\Customer::konsumen(), null, ['class' => 'form-control', 'id' => 'konsumen']) !!}
    </div>
    <div class="col-2 col-md-2">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addKonsumen">
            <i class="fas fa-plus"></i> 
        </button>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Tanggal Transaksi', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        <small class="form-text text-muted">Format : bulan / tanggal / tahun</small>
        <small class="form-text text-muted">{!! $errors->first('date', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>    
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Pilih Tipe', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::select('product_id',App\TypeProductTransaction::products($is_sale), null, ['class' => 'form-control']) !!}
        <small class="form-text text-muted">{!! $errors->first('product_id', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label($bahasa, null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::number('price', null, ['class' => 'form-control', 'min' => 0, 'onKeyup' => 'calculateTotal()']) !!}
        <small class="form-text text-muted">{!! $errors->first('price', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Jumlah', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::number('value', null, ['class' => 'form-control', 'min' => 0, 'max' => 5, 'onKeyup' => 'calculateTotal()']) !!}
        <small class="form-text text-muted">{!! $errors->first('value', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Catatan', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::textarea('note', null, ['class' => 'form-control', 'rows' => 2]) !!}
        <small class="form-text text-muted">{!! $errors->first('note', '<p class="text-danger">:message</p>') !!}</small>
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-4">
        {!! Form::label('Harga Total', null, ['class' => 'form-control-label']) !!}
    </div>
    <div class="col-12 col-md-8">
        {!! Form::text('total', null, ['class' => 'form-control', 'disabled']) !!}
    </div>
    
</div>

<div class="card-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-rounded btn-primary']) !!}
    <a href="{{ route('home') }}" class='btn btn-rounded btn-warning'> Cancel </a>
</div>

<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#konsumen').select2();
    });

	function calculateTotal() {
		var totalAmt = $("input[name=price]").val();
        var jumlah = $("input[name=value]").val();
		totalR = eval(totalAmt * jumlah);
        $('input[name=total]').val(totalR);
		//document.getElementById('totalR').innerHTML = totalR;
	}
</script>