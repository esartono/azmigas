<table class="table">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 1; $i < 6; $i++)
            <tr>
                <td width="35%">{!! Form::select('product_id['.$i.']',App\TypeProductTransaction::products($is_sale), null, ['class' => 'form-control']) !!}</td>
                <td width="25%">{!! Form::number('price['.$i.']', null, ['class' => 'form-control', 'min' => 0, 'step' => 500, 'onChange' => "calculateTotal(".$i.")"]) !!}</td>
                <td width="15%">{!! Form::number('value['.$i.']', null, ['class' => 'form-control', 'min' => 0, 'onChange' => "calculateTotal(".$i.")"]) !!}</td>
                <td width="25%">{!! Form::text('total['.$i.']', null, ['class' => 'form-control', 'readonly']) !!}</td>
            </tr>
        @endfor
    </tbody>
    <tfoot>
        <thead>
            <tr>
                <th colspan="3"> TOTAL HARGA </th>
                <th> {!! Form::text('totalALL', null, ['class' => 'form-control', 'readonly']) !!} </th>
            </tr>
        </thead>
    </tfoot>
</table>

<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#konsumen').select2();
    });

	function calculateTotal(no) {
        switch(no) {
            case 1:
                var totalAmt = $("input[name='price[1]']").val();
                var jumlah = $("input[name='value[1]']").val();
                totalR = eval(totalAmt * jumlah);
                $("input[name='total[1]']").val(totalR);
                break;

            case 2:
                var totalAmt = $("input[name='price[2]']").val();
                var jumlah = $("input[name='value[2]']").val();
                totalR = eval(totalAmt * jumlah);
                $("input[name='total[2]']").val(totalR);
                break;

            case 3:
                var totalAmt = $("input[name='price[3]']").val();
                var jumlah = $("input[name='value[3]']").val();
                totalR = eval(totalAmt * jumlah);
                $("input[name='total[3]']").val(totalR);
                break;

            case 4:
                var totalAmt = $("input[name='price[4]']").val();
                var jumlah = $("input[name='value[4]']").val();
                totalR = eval(totalAmt * jumlah);
                $("input[name='total[4]']").val(totalR);
                break;

            case 5:
                var totalAmt = $("input[name='price[5]']").val();
                var jumlah = $("input[name='value[5]']").val();
                totalR = eval(totalAmt * jumlah);
                $("input[name='total[5]']").val(totalR);
                break;
        }

        var total1 = $("input[name='total[1]']").val();
        var total2 = $("input[name='total[2]']").val();
        var total3 = $("input[name='total[3]']").val();
        var total4 = $("input[name='total[4]']").val();
        var total5 = $("input[name='total[5]']").val();

        totalALL = Number(total1) + Number(total2) + Number(total3) + Number(total4) + Number(total5);
        $("input[name='totalALL']").val(totalALL);
	}
</script>