<?php

namespace App\Http\Controllers;

use App\TypeProductTransaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;

class TypeProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //dd($type_products = TypeProductTransaction::with('product_add', 'product_minus')->get());
        if ($request->ajax()) {
            $type_products = TypeProductTransaction::with('product_add', 'product_minus')->get();
        
            return Datatables::of($type_products)
                ->addIndexColumn()
                ->addColumn('status', function($type_product){
                    return view('datatable._status', [
                        'status' => $type_product->is_sale,
                        'label' => ['Beli', 'Jual'],
                    ]);
                })
                ->addColumn('action', function($type_product){
                    return view('datatable._action', [
                        'form_url' => ['type_product_transactions.destroy', $type_product->id],
                        'edit_url' => route('type_product_transactions.edit', $type_product->id),
                    ]);   
                })
                ->editColumn('add', function($type_product){
                    return (is_null($type_product->product_add) ? '-' : $type_product->product_add->name );
                })
                ->editColumn('minus', function($type_product){
                    return (is_null($type_product->product_minus) ? '-' : $type_product->product_minus->name );
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
            ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
            ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Jual/Beli'])
            ->addColumn(['data' => 'add', 'name'=>'add', 'title'=>'Tambah'])
            ->addColumn(['data' => 'minus', 'name'=>'minus', 'title'=>'Kurang'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false, 'className'=>'text-center'])
            ;
            
        return view('type_product_transaction.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_product_transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->only('name', 'is_sale', 'add', 'minus');
		$product = TypeProductTransaction::create($product);

		return redirect()->route('type_product_transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeProductTransaction  $typeProductTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(TypeProductTransaction $typeProductTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeProductTransaction  $typeProductTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeProductTransaction $typeProductTransaction)
    {
        return view('type_product_transaction.edit', compact('typeProductTransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeProductTransaction  $typeProductTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeProductTransaction $typeProductTransaction)
    {
        
        $dataProduct = $request->only('name', 'is_sale', 'add', 'minus');
        $typeProductTransaction->update($dataProduct);

        return redirect()->route('type_product_transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeProductTransaction  $typeProductTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeProductTransaction $typeProductTransaction)
    {
        $typeProductTransaction->delete();
		return redirect()->route('type_product_transactions.index');
    }
}
