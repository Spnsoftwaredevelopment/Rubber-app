<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Department;
use Illuminate\Http\Request;


use App\Models\Material;
use App\Models\Rubber;


use App\Models\Mdrs;
use App\Models\Hardnesses;
use App\Models\Tensiles;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->orderBy('record_id','asc')
        ->get();

        $products = DB::connection('sqlsrv4')->table('layer3_data')
        ->where('no', 'like', 'G2%')
        ->orWhere('no', 'like', 'G1%')
        ->where('isDelete', 0)
        ->select('id', 'no', 'name')
        ->get();


        $rubbers = DB::connection('sqlsrv')
        ->table('rubbers') // Assuming 'rubbers' is the table name
        ->whereNotNull('name_formula')
        ->where('status', 'Enabled')
        ->where('inspection', 'Approve')
        ->orderBy('id', 'asc')
        ->paginate(15);

        $departments = DB::connection('sqlsrv')
        ->table('departments') // Assuming 'rubbers' is the table name
        ->whereNotNull('name')
        ->orderBy('id', 'asc')
        ->paginate(15);

        return view('admin.departments.index', compact('materials', 'departments', 'rubbers','products'));
    }

    public function menudepart()
{

    $departments = DB::connection('sqlsrv')
    ->table('departments') // Assuming 'rubbers' is the table name
    ->whereNotNull('name')
    ->get();//... // Get your department data here

    return view('admin.layouts.menu', compact('departments'));

}

    public function headerdepart()
    {
        $depart = DB::connection('sqlsrv')
            ->table('departments')
            ->whereNotNull('name')
            ->get();
        return view('admin.layouts.header', compact('depart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = new Department();

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->orderBy('record_id','asc')
        ->get();

        return view('admin.departments.create', compact('departments','materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departments = new Department();
        $departments->name = $request->name;
        $departments->created_by = Auth::user()->name;
        $departments->save();

        return redirect('admin/departments')->with('status', "Added Complete");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::find($id);

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->orderBy('record_id','asc')
        ->get();



        return view('admin.departments.edit', compact('departments', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $departments = Department::find($id);

        if (!$departments) {
            return redirect()->route('admin/departments')->with('error', 'Customer not found');
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);
        $departments->name = $request->input('name');

        $departments->save();

        return redirect('admin/departments')->with('status', "Added Complete");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Find the record by ID
        $departments = Department::find($id);
        // dd($customers);
        if (!$departments) {
            return redirect()->route('admin.departments.index')->with('error', 'Customer not found');
        }
        $departments->delete();
        return redirect()->route('admin.departments.index')->with('success', 'Customer deleted successfully');
    }
}
