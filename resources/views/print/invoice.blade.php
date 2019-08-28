<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Azmi Gas</title>
    
    <style>
    a.button {
        -webkit-appearance: button;
        -moz-appearance: button;
        appearance: button;

        text-decoration: none;
        color: initial;
    }
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 5px;
        font-size: 14px;

        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 10px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 35px;
        line-height: 35px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.heading td {
        border-bottom: 1px solid;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td{
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    .kepada {
        width: 100%;
        padding: 5px;
        border: 1px solid black;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    @media print {
        body * {
            visibility: hidden;
        }
        .invoice-box, .invoice-box * {
            visibility: visible;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td><h1>Surat Jalan</h1></td>
                            <td>
                                Jakarta, {{ $request->date }}<br>
                                <div class="kepada">Kepada : {{ App\Customer::namaKonsumen($request->customer_id) }} </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Produk
                </td>
                
                <td>
                    Harga
                </td>

                <td>
                    Jumlah
                </td>

                <td>
                    Total
                </td>
            </tr>
            @for ($i = 1; $i < 6; $i++)
            <tr class="item" >
                <td>
                    {{ App\TypeProductTransaction::produknya($request->product_id[$i]) }}
                </td>
                
                <td>
                    {{ number_format($request->price[$i]) }}
                </td>

                <td>
                    {{ $request->value[$i] }}
                </td>
                <td>
                    {{ number_format($request->total[$i]) }}
                </td>                
            </tr>            
            @endfor
            <tr class="total">
                <td colspan="3">TOTAL :</td>
                
                <td>
                   {{ number_format($request->totalALL) }}
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>Penerima/Pembeli</td>
                <td>Bagian Pengiriman</td>
                <td>Petugas Gudang</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>________________</td>
                <td>________________</td>
                <td>________________</td>
            </tr>
        </table>
    </div>
    <button onclick="print_donk()"> Cetak Surat Jalan </button>
    <a class="button" href="{{ route('jualbeli') }}"> Kembali </a>
</body>
<script>
    function print_donk() {
        window.print();
        //return false; // why false?
    };
</script>
</html>
