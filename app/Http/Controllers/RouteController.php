<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;

use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $routes = Route::with('vehicles', 'drivers')->get();
        
            return Datatables::of($routes)
                ->addIndexColumn()
                ->addColumn('status', function($routes){
                    return view('datatable._status', [
                        'status' => $routes->is_sale,
                        'label' => ['Beli', 'Jual'],
                    ]);
                })
                ->addColumn('action', function($routes){
                    return view('datatable._action', [
                        'form_url' => ['product_transactions.destroy', $product_transaction->id],
                        'edit_url' => route('product_transactions.edit', $product_transaction->id),
                    ]);
                })
                ->editColumn('produk_id', function($product_transaction){
                    return $product_transaction->products->name;
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
            ->addColumn(['data' => 'produk_id', 'name'=>'produk_id', 'title'=>'Produk'])
            ->addColumn(['data' => 'price', 'name'=>'price', 'title'=>'Harga'])
            ->addColumn(['data' => 'value', 'name'=>'value', 'title'=>'Jumlah'])
            ->addColumn(['data' => 'total', 'name'=>'total', 'title'=>'Total'])
            ->addColumn(['data' => 'customer_id', 'name'=>'customer_id', 'title'=>'Keterangan'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false, 'className'=>'text-center'])
            ;
            
        return view('route.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        //
    }
}
