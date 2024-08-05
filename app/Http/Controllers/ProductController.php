<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;


use App\Models\Material;
use App\Models\Rubber;


use App\Models\Mdrs;
use App\Models\Hardnesses;
use App\Models\Product;
use App\Models\Tensiles;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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

        // $products = DB::connection('sqlsrv4')->table('layer3_data')
        // ->where('no', 'like', 'G2%')
        // ->orWhere('no', 'like', 'G1%')
        // ->where('isDelete', 0)
        // ->select('id', 'no', 'name')
        // ->get();


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

        $products = DB::connection('sqlsrv')
        ->table('products') // Assuming 'rubbers' is the table name
        ->whereNotNull('name')
        ->orderBy('id', 'asc')
        ->paginate(15);

        return view('admin.products.index', compact('materials', 'customers', 'rubbers','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = new Product();

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->orderBy('record_id','asc')
        ->get();

        return view('admin.products.create', compact('products','materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products->code = $request->code;
        $products->name = $request->name;
        $products->created_by = Auth::user()->name;
        $products->save();

        return redirect('admin/products')->with('status', "Added Complete");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);

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

        return view('admin.products.edit', compact('products', 'materials','rubbers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if (!$products) {
            return redirect()->route('admin/products')->with('error', 'Customer not found');
        }

        $this->validate($request, [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        $products->code = $request->input('code');
        $products->name = $request->input('name');
        $products->updated_by = Auth::user()->name;

        $products->save();

        return redirect('admin/products')->with('status', "Added Complete");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        // dd($customers);
        if (!$products) {
            return redirect()->route('admin.products.index')->with('error', 'Customer not found');
        }
        $products->delete();
        return redirect()->route('admin.products.index')->with('success', 'Customer deleted successfully');
    }
}
