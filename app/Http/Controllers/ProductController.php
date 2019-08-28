<?php

namespace App\Http\Controllers;

use App\Product;
use App\TypeProductTransaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $products = Product::with('options')->orderBy('name')->get();
        
            return Datatables::of($products)
                ->addIndexColumn()
                ->addColumn('kategori', function($product){
                    return $product->options->option;
                })
                ->addColumn('action', function($product){
                    return view('datatable._action', [
                        'form_url' => ['products.destroy', $product->id],
                        'edit_url' => route('products.edit', $product->id),
                    ]);
                })
                ->editColumn('price', function($product){
                    return number_format($product->price);
                })->make(true);
        }
        $html = $htmlBuilder
            ->parameters([
                'info' => false,
                'lengthChange' => false,
                'dom' => '<"top"f>rt<"bottom"p><"clear">'
            ])
			->addColumn(['data' => 'DT_Row_Index', 'name'=>'DT_Row_Index', 'title'=>'No.', 'orderable'=>false, 'searchable'=>false, 'className'=>'text-center'])
            ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
            ->addColumn(['data' => 'kategori', 'name'=>'kategori', 'title'=>'Kategori'])
            ->addColumn(['data' => 'price', 'name'=>'price', 'title'=>'Harga'])
            ->addColumn(['data' => 'stock', 'name'=>'stock', 'title'=>'Stok'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false, 'className'=>'text-center'])
            ;
            
        return view('product.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->only('name', 'option_id', 'stock', 'price');
        $product = Product::create($product);
        
        //dd($product->id);
        //Beli
        $type_product = $request->only('name')+['is_sale'=>false, 'add'=>$product->id, 'minus'=>null];
        $type_product = TypeProductTransaction::create($type_product);
        
        //Jual
        $type_product = $request->only('name')+['is_sale'=>true, 'minus'=>$product->id, 'add'=>null];
        $type_product = TypeProductTransaction::create($type_product);

		return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $dataProduct = $request->only('name', 'option_id', 'stock', 'price');
        $product->update($dataProduct);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
		return redirect()->route('products.index');
    }
}
