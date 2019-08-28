<?php

namespace App\Http\Controllers;

use App\Product;
use App\TypeProductTransaction;
use App\ProductTransaction;
use App\CustomerTransaction;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {

        if ($request->ajax()) {
            $product_transactions = ProductTransaction::with('produks', 'konsumen')->orderBy('date', 'desc')->get();
        
            return Datatables::of($product_transactions)
                ->addIndexColumn()
                ->addColumn('status', function($product_transaction){
                    return view('datatable._status', [
                        'status' => $product_transaction->is_sale,
                        'label' => ['Beli', 'Jual'],
                    ]);
                })
                ->addColumn('action', function($product_transaction){
                    return view('datatable._action', [
                        'form_url' => ['product_transactions.destroy', $product_transaction->id],
                        'edit_url' => route('product_transactions.edit', $product_transaction->id),
                    ]);
                })
                ->editColumn('product_id', function($product_transaction){
                    return $product_transaction->produks->name;
                })
                ->editColumn('price', function($product_transaction){
                    return number_format($product_transaction->price);
                })
                ->editColumn('total', function($product_transaction){
                    return number_format($product_transaction->total);
                })
                ->editColumn('date', function($product_transaction){
                    return \Carbon\Carbon::parse($product_transaction->date)->format('d-m-Y');
                })
                ->editColumn('customer_id', function($product_transaction){
                    return $product_transaction->konsumen->name;
                })
                ->make(true);
        }
        $html = $htmlBuilder
            ->parameters([
                'info' => false,
                'lengthChange' => false,
                'dom' => '<"top"f>rt<"bottom"p><"clear">'
            ])
			->addColumn(['data' => 'DT_Row_Index', 'name'=>'DT_Row_Index', 'title'=>'No.', 'orderable'=>false, 'searchable'=>false, 'className'=>'text-center'])
            ->addColumn(['data' => 'date', 'name'=>'date', 'title'=>'Tanggal'])
            ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Jual/Beli'])
            ->addColumn(['data' => 'product_id', 'name'=>'product_id', 'title'=>'Produk'])
            ->addColumn(['data' => 'price', 'name'=>'price', 'title'=>'Harga'])
            ->addColumn(['data' => 'value', 'name'=>'value', 'title'=>'Jumlah'])
            ->addColumn(['data' => 'total', 'name'=>'total', 'title'=>'Total'])
            ->addColumn(['data' => 'customer_id', 'name'=>'customer_id', 'title'=>'Keterangan'])
            ;
            
        return view('product_transaction.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        switch ($request->stat) {
            case 'sale':
                $is_sale = true;
                $transaction = 'sale';
                $bahasa = 'Harga Jual';
                break;
                
            case 'buy':
                $is_sale = false;
                $transaction = 'buy';
                $bahasa = 'Harga Pembelian';
                break;
        }
        return view('product_transaction.'.$transaction, compact('bahasa', 'is_sale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $customer_transaction = $request->only('customer_id', 'date', 'is_sale', 'note')+['total'=>$request->totalALL, 'user_id'=>auth()->user()->id];
        $transaksi = CustomerTransaction::create($customer_transaction);
        
        $is_sale = $request->is_sale;

        for ($x = 1; $x < 6; $x++) {
            
            if ($request->product_id[$x] <> 0) {

                $type_id = TypeProductTransaction::findOrFail($request->product_id[$x]);
    
                $value = $request->value[$x];
                $price = $request->price[$x];
                $total = $price * $value;
    
                $product_transaction = $request->only('customer_id', 'date', 'is_sale', 'note')+['product_id'=>$request->product_id[$x], 'price'=>$price, 'value'=>$value, 'total'=>$total, 'customer_transaction_id'=>$transaksi->id, 'user_id'=>auth()->user()->id];
                ProductTransaction::create($product_transaction);
                
                //Tambah Stock
                if ($type_id->add !== NULL) {
                    $product = Product::where('id', $type_id->add)->first();
                    $old_stock = $product->stock;
                    $new_stock = $old_stock + $value;
                    $product->stock = $new_stock;
                    $product->save();
                }
    
                //Kurang Stock
                if ($type_id->minus !== NULL) {
                    $product = Product::where('id', $type_id->minus)->first();
                    $old_stock = $product->stock;
                    $new_stock = $old_stock - $value;
                    $product->stock = $new_stock;
                    $product->price = $price;
                    $product->save();
                }
            }
        }      

        return view('print.invoice', compact('request'));
		//return redirect()->route('product_transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTransaction $productTransaction)
    {
        //
    }

    public function choose()
    {
        return view('product_transaction.choose');
    }

    public function filter()
    {
        dd('EKO');
    }
}
