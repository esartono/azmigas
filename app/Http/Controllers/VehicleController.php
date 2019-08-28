<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $vehicles = Vehicle::get();
        
            return Datatables::of($vehicles)
                ->addIndexColumn()
                //->addColumn('kategori', function($product){
                    //return $product->options->option;
                //})
                ->addColumn('action', function($vehicle){
                    return view('datatable._action', [
                        'form_url' => ['vehicles.destroy', $vehicle->id],
                        'edit_url' => route('vehicles.edit', $vehicle->id),
                        'show_url' => route('vehicles.show', $vehicle->id),
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->parameters([
                'info' => false,
                'lengthChange' => false,
                'dom' => '<"top"f>rt<"bottom"p><"clear">',
            ])
			->addColumn(['data' => 'DT_Row_Index', 'name'=>'DT_Row_Index', 'title'=>'No.', 'orderable'=>false, 'searchable'=>false, 'className'=>'text-center'])
            ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Kendaraan'])
            ->addColumn(['data' => 'plate', 'name'=>'plate', 'title'=>'No. Polisi'])
            ->addColumn(['data' => 'tax', 'name'=>'tax', 'title'=>'Tanggal Pajak'])
            ->addColumn(['data' => 'kir', 'name'=>'kir', 'title'=>'Tanggal KIR'])
            ->addColumn(['data' => 'stnk_expired', 'name'=>'stnk_expired', 'title'=>'Berlaku STNK'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false, 'className'=>'text-center'])
            ;
            
        return view('vehicle.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $vehicle = $request->only('name', 'vehicle_type_id', 'plate', 'tax', 'kir', 'stnk_expired');
		$vehicle = Vehicle::create($vehicle);

		return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $dataVehicle = $request->only('name', 'vehicle_id', 'plate', 'tax', 'kir', 'stnk_expired');
        $vehicle->update($dataVehicle);

        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
		return redirect()->route('vehicles.index');
    }
}
