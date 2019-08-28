<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Driver;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {

        if ($request->ajax()) {
            //$employees = Employee::get();
            $employees = Employee::with('drivers')->get();
        
            return Datatables::of($employees)
                ->addIndexColumn()
                ->addColumn('driver', function($employee){
                    $driver = false;
                    if ($employee->drivers){
                        $driver = true;
                        $id = $employee->drivers->id;
                    }
                    return view('datatable._driver', [
                        'driver' => $driver,
                        'id' => $employee->id
                    ]);
                })
                ->addColumn('action', function($employee){
                    return view('datatable._action', [
                        'form_url' => ['employees.destroy', $employee->id],
                        'edit_url' => route('employees.edit', $employee->id),
                        'show_url' => route('employees.show', $employee->id),
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->parameters([
                'info' => false,
                'lengthChange' => false,
                'dom' => '<"top"f>rt<"bottom"p><"clear">'
            ])
			->addColumn(['data' => 'DT_Row_Index', 'name'=>'DT_Row_Index', 'title'=>'No.', 'orderable'=>false, 'searchable'=>false, 'className'=>'text-center'])
            ->addColumn(['data' => 'nik', 'name'=>'nik', 'title'=>'NIK'])
            ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
            ->addColumn(['data' => 'jk', 'name'=>'jk', 'title'=>'JK'])
            ->addColumn(['data' => 'phone1', 'name'=>'phone1', 'title'=>'Telp.'])
            ->addColumn(['data' => 'driver', 'name'=>'driver', 'title'=>'Supir'])
            ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Status'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false, 'className'=>'text-center'])
            ;
            
        return view('employee.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = $request->only('nik', 'name', 'jk', 'birth_place', 'birth_date', 'address', 'phone1', 'phone2');
		$employee = Employee::create($employee);

		return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $dataEmployee = $request->only('nik', 'name', 'jk', 'birth_place', 'birth_date', 'address', 'phone1', 'phone2');
        $employee->update($dataEmployee);

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
		return redirect()->route('employees.index');
    }
}
