<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use DateTime;
use DatePeriod;
use DateInterval;
use DB;

use App\Product;
use App\ProductTransaction;
use App\TypeProductTransaction;
use App\Charts\SampleChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('id', 'name', 'stock')->get();

        $jml_product = $products->count();
        $bagian = ceil($jml_product/3);

        $products_f = Product::select('id', 'name', 'stock')->limit($bagian)->get();
        $products_m = Product::select('id', 'name', 'stock')->offset($bagian)->limit($bagian)->get();
        $products_e = Product::select('id', 'name', 'stock')->offset(2*$bagian)->limit($bagian)->get();
        
        $sekarang = new DateTime(date("Y-m-d h:i:s"));
        $mundur = new DateTime(date("Y-m-d", strtotime("-1 week")));
        
        $chart = new SampleChart;
        $chart_datas = $products->toArray();

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($mundur, $interval, $sekarang);
       
        $tglnya = array();
        $values = array();
        $no = 0;
        foreach($daterange as $date){
            $tgl_indo = $date->format("d-m");
            $tgl = $date->format("Y-m-d");
            $tglnya[] = $tgl_indo;
            $beli = DB::table('product_transactions')
                        ->select(DB::raw('SUM(value) as total'))
                        ->where('is_sale', 0)
                        ->where('date', $tgl)
                        ->first();
            $values_beli[] = $beli->total;

            $jual = DB::table('product_transactions')
                        ->select(DB::raw('SUM(value) as total'))
                        ->where('is_sale', 1)
                        ->where('date', $tgl)
                        ->first();
            $values_jual[] = $jual->total;
        }

        $chart->labels($tglnya);
        $chart->dataset('Total Penjualan', 'bar', $values_beli)->backgroundColor('#FFCE00');
        $chart->dataset('Total Pembelian', 'bar', $values_jual)->backgroundColor('#0375B4');
        return view('home', compact('products_f', 'products_m', 'products_e', 'chart'));
    }
}
