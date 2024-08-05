<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;


use App\Models\Material;
use App\Models\Rubber;


use App\Models\Mdrs;
use App\Models\Hardnesses;
use App\Models\Tensiles;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
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

        $customers = DB::connection('sqlsrv')
        ->table('customers') // Assuming 'rubbers' is the table name
        ->whereNotNull('name')
        ->orderBy('id', 'asc')
        ->paginate(15);


        // dd($customers);


        return view('admin.customers.index', compact('materials', 'customers', 'rubbers','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = new Customers();

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->orderBy('record_id','asc')
        ->get();

        return view('admin.customers.create', compact('customers','materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers = new Customers();
        $customers->code = $request->code;
        $customers->name = $request->name;
        $customers->created_by = Auth::user()->name;
        $customers->save();

        return redirect('admin/customers')->with('status', "Added Complete");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customers::find($id);

        $rubbers = DB::connection('sqlsrv')
        ->table('rubbers') // Assuming 'rubbers' is the table name
        ->whereNotNull('name_formula')
        ->where('status', 'Enabled')
        ->where('inspection', 'Approve')
        ->orderBy('id', 'asc')
        ->first();

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->orderBy('record_id','asc')
        ->get();



        return view('admin.customers.edit', compact('customers', 'materials','rubbers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $customers = Customers::find($id);

        if (!$customers) {
            return redirect()->route('admin/customers')->with('error', 'Customer not found');
        }

        $this->validate($request, [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        $customers->code = $request->input('code');
        $customers->name = $request->input('name');

        $customers->save();

        return redirect('admin/customers')->with('status', "Added Complete");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Find the record by ID
        $customers = Customers::find($id);
        // dd($customers);
        if (!$customers) {
            return redirect()->route('admin.customers.index')->with('error', 'Customer not found');
        }
        $customers->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully');
    }
}
