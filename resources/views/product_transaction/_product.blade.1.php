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
        {!! Form::number('price', null, ['class' => 'form-control', 'min' => 0, 'step' => 500, 'onKeyup' => 'calculateTotal()']) !!}
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