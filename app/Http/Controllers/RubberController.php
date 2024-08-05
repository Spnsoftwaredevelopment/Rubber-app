<?php

namespace App\Http\Controllers;

use App\Models\Hardnesses;
use App\Models\Material;
use App\Models\Mdrs;
use App\Models\Rubber;
use App\Models\Tensiles;
use App\Models\TestLab;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\JsonResult;

class RubberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->orderBy('record_id', 'asc')
            ->get();

        $customers = DB::connection('sqlsrv3')->table('datamaster_code')
            ->where('isDelete', 0)
            ->orderBy('code_id', 'asc')
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
            ->where('isDelete', 0)
            ->orderBy('id', 'asc')
            ->paginate(100);

        $mat = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        if ($request->user()) {
            $request->user()->update(['last_seen_at' => now()]);
        }

        //dd($rubbers);

        return view('admin.rubbers.index', compact('materials', 'customers', 'rubbers', 'products', 'mat'));
    }

    public function testlab(Request $request)
    {
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->orderBy('record_id', 'asc')
            ->get();

        $customers = DB::connection('sqlsrv3')->table('datamaster_code')
            ->where('isDelete', 0)
            ->orderBy('code_id', 'asc')
            ->get();

        $products = DB::connection('sqlsrv4')->table('layer3_data')
            ->where('no', 'like', 'G2%')
            ->orWhere('no', 'like', 'G1%')
            ->where('isDelete', 0)
            ->select('id', 'no', 'name')
            ->get();

        $rubbers = Rubber::whereNotNull('name_formula')
            ->where('status', 'Disabled')
            ->where('isDelete', 0)
            ->orderBy('id', 'asc')
            ->paginate(10);

        $mat = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        //dd($rubbers);

        return view('admin.rubbers.testlabstep', compact('materials', 'customers', 'rubbers', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubbers = new Rubber();

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->orderBy('record_id', 'asc')
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        // $customers = DB::connection('sqlsrv3')->table('datamaster_code')
        // ->where('isDelete',0)
        // ->orderBy('code_id','asc')
        // ->get();

        $customers = DB::connection('sqlsrv')
            ->table('customers') // Assuming 'rubbers' is the table name
            ->whereNotNull('name')
            ->orderBy('id', 'asc')
            ->get();

        $products = DB::connection('sqlsrv4')->table('layer3_data')
            ->where(function ($query) {
                $query->where('no', 'like', 'G2%')
                    ->orWhere('no', 'like', 'G1%');
            })
            ->where('isDelete', 0)
            ->get();

        $productcategoty = DB::connection('sqlsrv')
            ->table('products') // Assuming 'rubbers' is the table name
            ->whereNotNull('name')
            ->orderBy('id', 'asc')
            ->paginate(15);

        $mat = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        $weight = DB::connection('sqlsrv')->table('materials')->get();

        //dd('ok');
        return view('admin.rubbers.create', compact('materials', 'customers', 'products', 'productcategoty', 'rubbers', 'mat', 'weight'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->orderBy('record_id', 'asc')
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        $customers = DB::connection('sqlsrv3')->table('datamaster_code')
            ->where('isDelete', 0)
            ->orderBy('code_id', 'asc')
            ->get();

        $products = DB::connection('sqlsrv4')->table('layer3_data')
            ->where('isDelete', 0)
            ->orderBy('name', 'asc')
            ->get();

        $rubbers = DB::connection('sqlsrv')
            ->table('rubbers') // Assuming 'rubbers' is the table name
            ->whereNotNull('name_formula')
            ->orderBy('id', 'asc')
            ->paginate(100);

        $request->validate([
            'name_formula' => 'required|unique:rubbers',
            // Other validation rules for your other fields
        ]);

        $nameFormula = $request->input('name_formula');

        // Check for duplicates

        $rubber = new Rubber();
        $rubber->name_formula = $nameFormula;
        $rubber->hardness_s = $request->hardness_s;
        $rubber->hardness_e = $request->hardness_e; // Set the 'hardness_e' value explicitly
        $rubber->customer_id = $request->customer_id;
        $rubber->product_id = $request->product_id;
        $rubber->start_date = $request->start_date;
        $rubber->rubber_oldcode = $request->rubber_oldcode;
        $rubber->description = $request->description;
        $rubber->created_by = Auth::user()->name;
        $rubber->save();

        // foreach ($request->moreFields as $value) {
        //     // Check if record_id is 'Select' or weights is null
        //     if ($value['record_id'] == 'Select' || $value['weights'] === null) {
        //         // Skip this iteration
        //         continue;
        //     }

        //     $mockupArr = [
        //         'record_id' => $value['record_id'],
        //         'weights' => $value['weights'],
        //         'other_id' => $value['other_id'],
        //         'rubber_id' => $rubber->id,
        //     ];

        //     $material = new Material();
        //     $material->forceFill($mockupArr);
        //     $material->save();
        // }

        // // Create 'Material' records for each element in the 'moreFields' array
        // foreach ($request->moreFields as $value) {
        //     $mockupArr = [
        //         'record_id' => $value['record_id'],
        //         'weights' => $value['weights'],
        //         'rubber_id' => $rubber->id,
        //     ];
        //     // dd($mockupArr);
        //     Material::create($mockupArr);
        // }
        //  dd($request);

        return redirect('admin/rubbers/testlabstep')->with('status', "Added Complete");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rubber  $rubber
     * @return \Illuminate\Http\Response
     */

    public function beforetest($id)
    {

        $rub = Rubber::find($id);



        $rubbers = DB::connection('sqlsrv')
            ->table('rubbers') // Assuming 'rubbers' is the table name
            ->whereNotNull('name_formula')
            ->orderBy('id', 'asc')
            ->get();

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->orderBy('record_id', 'asc')
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        $mat = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();


        // dd($mat);

        $products = DB::connection('sqlsrv4')->table('layer3_data')
            ->where('id',)
            ->first();

        //dd($products);

        return view('admin.rubbers.beforetest', compact('rubbers', 'rub', 'materials', 'products', 'mat'));
    }


    public function show($id)
    {
        $rub = Rubber::find($id);

        $rubbers = DB::connection('sqlsrv')->table('rubbers')
            ->whereNotNull('name_formula')
            ->first();

        // dd($rubbers);
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->orderBy('record_id', 'asc')
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        $customers = DB::connection('sqlsrv')->table('customers')
            ->whereNotNull('name')
            ->orderBy('id', 'asc')
            ->get();

        //dd($customer);

        $mat = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        //dd($mat);

        $weight = DB::connection('sqlsrv')->table('materials')
            ->where('rubber_id', $id)
            ->get();

        // dd($mat);

        $products = DB::connection('sqlsrv4')->table('layer3_data')
            ->whereNotNull('id')
            ->get();

        // dd($products);

        $mdrs = DB::connection('sqlsrv')->table('mdrs')
            ->where('rubber_id', $id)
            ->first();

        // dd($mdrs);

        $tensiles = DB::connection('sqlsrv')->table('tensiles')
            ->where('rubber_id', $id)
            ->first();

        $hardnesses = DB::connection('sqlsrv')->table('hardnesses')
            ->where('rubber_id', $id)
            ->first();

        return view('admin.rubbers.show', compact('tensiles', 'hardnesses', 'mdrs', 'mat', 'weight', 'materials', 'customers', 'rubbers', 'products', 'rub'));
    }

    public function showtest(Request $request, $id)
    {
        $rub = Rubber::find($id);

        $materials = DB::connection('sqlsrv')->table('materials')
            ->whereNotNull('name_formula')
            ->first();

        $mat = DB::connection('sqlsrv')
            ->table('materials') // Assuming 'rubbers' is the table name
            ->whereNotNull('other_id')
            ->orderBy('id', 'asc')
            ->paginate(100);

        return view('admin.rubbers.rubbershowtest', compact('rub', 'materials', 'mat'));
    }

    public function updateStatusAndInspection(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'status' => 'required|in:Enabled,Disabled',
            'inspection' => 'required|in:Approve,Disapproved',
        ]);

        // Find the rubber item by ID
        $rubber = Rubber::findOrFail($id);

        // Update the status and inspection fields
        $rubber->update([
            'status' => $request->input('status'),
            'inspection' => $request->input('inspection'),
            'approve_by' => Auth::user()->name,
        ]);


        // Redirect back with a success message
        return redirect()->back()->with('success', 'Rubber status and inspection updated successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rubber  $rubber
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rub = Rubber::find($id);

        $rubbers = DB::connection('sqlsrv')->table('rubbers')
            ->where('id', $id)
            ->first();

        // dd($rubbers);
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->orderBy('record_id', 'asc')
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        $customers = DB::connection('sqlsrv')->table('customers')
            ->whereNotNull('name')
            ->orderBy('id', 'asc')
            ->get();

        //dd($customer);

        $mat = DB::connection('sqlsrv2')->table('master_pur_other')
            ->where('system_id', 6)
            ->where('isDelete', 0)
            ->select(['record_id', 'other_id', 'name', 'detail'])
            ->get();

        //dd($mat);

        // $matr = DB::connection('sqlsrv')->table('materials')
        //     ->where('rubber_id', $id)
        //     ->get();
        // dd($matr);

        // $weight = DB::connection('sqlsrv')->table('materials')
        //     ->where('rubber_id', $id)
        //     ->get();

        //   dd($weight);

        $products = DB::connection('sqlsrv4')->table('layer3_data')
            ->whereNotNull('id')
            ->get();

        // dd($products);

        $mdrs = DB::connection('sqlsrv')->table('mdrs')
            ->where('rubber_id', $id)
            ->first();

        // dd($mdrs);

        $tensiles = DB::connection('sqlsrv')->table('tensiles')
            ->where('rubber_id', $id)
            ->first();

        //dd($tensiles);

        $hardnesses = DB::connection('sqlsrv')->table('hardnesses')
            ->where('rubber_id', $id)
            ->first();

        return view('admin.rubbers.edit', compact('tensiles', 'hardnesses', 'mat', 'materials', 'customers', 'rubbers', 'products', 'rub', ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rubber  $rubber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_formula' => 'required|string|max:255',
            'hardness_s' => 'required|numeric',
            'hardness_e' => 'required|numeric',
            'ref' => 'required|string|max:255',
            'description' => 'nullable|string',
            'approve_by' => Auth::user()->name,
        ]);

        $rubbers = Rubber::find($id);
        //dd($rubbers);

        if (!$rubbers) {
            // Handle the case where the record is not found, e.g., redirect or return a response
        }

        $approveBy = $request->inspection === 'Approve' ? Auth::user()->name : null;
        //dd($approveBy);

        $rubbers->update([
            "name_formula" => $request->name_formula,
            "hardness_s" => $request->hardness_s,
            "hardness_e" => $request->hardness_e,
            "ref" => $request->ref,
            "rubber_oldcode" => $request->rubber_oldcode,
            "description" => $request->description,
            "updated_by" => Auth::user()->name,
            "approve_by" => $approveBy,
            "start_date" => now(),
        ]);



        return redirect()->back()->with('success', 'Records updated successfully!');
    }
    public function get_All(Request  $request){
// dd($request->all());
        $body =  $request->only('testCompare');
        
        $chart_arr = [];
              
        foreach ($body['testCompare'] as $key => $value) {
            $result = self::all_tests( $value);
           
                foreach ($result as $key => $mdr) {
                 
              
            $array = [$mdr->ml, $mdr->mh, $mdr->ts1, $mdr->ts2, $mdr->tc50, $mdr->tc90];
            // dd ($array);
            array_push($chart_arr, $array);
        }
        }
        
         return JsonResult::success($chart_arr);

    }
    
    public static function all_tests($id)
    {
        $rub = Rubber::find($id);

        $rubbers = DB::connection('sqlsrv')
        ->table('rubbers')
        ->whereNotNull('name_formula')
        ->orderBy('id', 'asc')
        ->get();

        $testlab = DB::connection('sqlsrv')
        ->table('testlabs')
        ->where('rubber_id', $id)
            ->orderBy('id', 'asc')
            ->get();

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id', 6)
        ->where('isDelete', 0)
        ->orderBy('record_id', 'asc')
        ->select(['record_id', 'other_id', 'name', 'detail'])
        ->get();

        $columns = ['mh', 'ml', 'ts1', 'ts2', 'tc50', 'tc90'];

        $mdrs = DB::connection('sqlsrv')
            ->table('mdrs')
            ->where('rubber_id', $id)
            ->orderBy('id', 'asc')
            ->get();

        

       
         return $mdrs;
        
    }

    public  function all_test($id)
    {
        $rub = Rubber::find($id);

        $rubbers = DB::connection('sqlsrv')
        ->table('rubbers')
        ->whereNotNull('name_formula')
        ->orderBy('id', 'asc')
        ->get();

        $testlab = DB::connection('sqlsrv')
        ->table('testlabs')
        ->where('rubber_id', $id)
            ->orderBy('id', 'asc')
            ->get();

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id', 6)
        ->where('isDelete', 0)
        ->orderBy('record_id', 'asc')
        ->select(['record_id', 'other_id', 'name', 'detail'])
        ->get();

        $columns = ['mh', 'ml', 'ts1', 'ts2', 'tc50', 'tc90'];

        $mdrs = DB::connection('sqlsrv')
            ->table('mdrs')
            ->where('rubber_id', $id)
            ->orderBy('id', 'asc')
            ->get();

        

        $chart_arr = [];
        foreach ($mdrs as $key => $mdr) {
            //dd ($mdr);
            $array = [$mdr->ml, $mdr->mh, $mdr->ts1, $mdr->ts2, $mdr->tc50, $mdr->tc90];
            // dd ($array);
            array_push($chart_arr, $array);
        }
        $data = [
            'rubbers'=>$rubbers, 
            'rub'=>$rub, 
            'materials'=>$materials, 
            'testlab'=>$testlab, 
            'mdrs'=>$mdrs, 
            'columns'=> $columns,
         ];
        //  dd();
 
        return view('admin.rubbers.all_test_rubbers', compact('rubbers', 'rub', 'materials', 'testlab', 'mdrs', 'columns','chart_arr'));
    }


    public function all_test_update(Request $request, $id)
    {
        // Assuming 'rubbers' is the model name
        $rub = Rubber::find($id);



        // Validate the incoming request data
        $validatedData = $request->validate([
            'testlab_id' => 'required|numeric',
            'hardness_s' => 'required|numeric',
            'hardness_e' => 'required|numeric',
            'name_formula' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Use a database transaction for atomic updates
        DB::beginTransaction();

        try {
            // Update the model with the validated data
            $rub->update([
                'testlab_id' => $validatedData['testlab_id'],
                'hardness_s' => $validatedData['hardness_s'],
                'hardness_e' => $validatedData['hardness_e'],
                'name_formula' => $validatedData['name_formula'],
                // Add more fields as needed
            ]);

            // Commit the transaction
            DB::commit();

            // Return the view with the updated data
            return redirect()->back()->with('success', 'Records updated successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();

            // Log the error or handle it as needed
            return redirect()->back()->with('error', 'Failed to update records. Please try again.');
        }
    }

    public function show_test($id)
    {
        $testlab = testlab::find((int)$id);

        $test = Testlab::with('mdrs')
        ->whereNotNull('mdrs_id')
        ->orderBy('id', 'asc')
        ->get();



        $rubbers = DB::connection('sqlsrv')->table('rubbers')
        ->whereNotNull('name_formula')
        ->first();

        // dd($rubbers);
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id', 6)
        ->where('isDelete', 0)
        ->orderBy('record_id', 'asc')
        ->select(['record_id', 'other_id', 'name', 'detail'])
        ->get();

        $customers = DB::connection('sqlsrv')->table('customers')
        ->whereNotNull('name')
            ->orderBy('id', 'asc')
            ->get();

        //dd($customer);

        $mat = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id', 6)
        ->where('isDelete', 0)
        ->select(['record_id', 'other_id', 'name', 'detail'])
        ->get();

        //dd($mat);

        $weight = DB::connection('sqlsrv')->table('materials')
        ->where('testlab_id', $id)
        ->get();

        // dd($mat);

        $products = DB::connection('sqlsrv4')->table('layer3_data')
        ->whereNotNull('id')
            ->get();

        // dd($products);

        $mdrs = DB::connection('sqlsrv')->table('mdrs')
        ->where('id', $id)
        ->orderBy('id', 'asc')
        ->get();

        // dd($mdrs);

        $tensiles = DB::connection('sqlsrv')->table('tensiles')
        ->where('id', $id)
        ->orderBy('id', 'asc')
        ->get();

        $hardnesses = DB::connection('sqlsrv')->table('hardnesses')
        ->where('id', $id)
        ->orderBy('id', 'asc')
        ->get();

        $hard = DB::connection('sqlsrv')->table('hardnesses')
        ->where('id', $id)
        ->first();

        $weight = DB::connection('sqlsrv')->table('materials')
            ->where('testlab_id', $id)
            ->get();

        return view('admin.rubbers.show_test_rubber', compact('rubbers', 'materials', 'mat', 'testlab', 'mdrs', 'tensiles', 'hardnesses', 'test', 'hard', 'weight'));
    }


    public function destroymat(Request $request, $id)
    {
        $matr = Material::find($id);

        if (!$matr) {
            // Handle the case where the material is not found
        }
        $matr->delete();

        return redirect()->back()->with('success', 'Material delete successfully!');
    }

    public function storetest(Request $request)
    {
        // dd($request->all());
         try {

        $testLabData = [
            'mdrs_id' => 0,
            'tensiles_id' => 0,
            'hardness_id' => 0,
            'rubber_id' => $request->input('rubber_id'),
        ];



        $testLab = TestLab::create($testLabData);

        // Retrieve the Rubber record
        $rubber = Rubber::find($request->input('rubber_id'));

        // Retrieve the created TestLab recordto
        $createdTestLab = TestLab::find($testLab->id);

        // Retrieve records from the TestLabs table using SQL Server connection
        $testLabsFromSqlServer = DB::connection('sqlsrv')
        ->table('testlabs')
        ->where('id', $createdTestLab->id)
        ->orderBy('id', 'asc')
        ->first(); // Corrected method name

        //  dd($testLabsFromSqlServer->id);

        // $request->validate([
        //     'ml' => 'required',
        //     'mh' => 'required',
        //     'ts1' => 'required',
        //     'ts2' => 'required',
        //     'tc50' => 'required',
        //     'tc90' => 'required',
        //     'mdrs_description' => 'required',
        //     'thicknees' => 'required',
        //     'width' => 'required',
        //     'length' => 'required',
        //     'max_force' => 'required',
        //     'max_stress' => 'required',
        //     'modules' => 'required',
        //     'break' => 'required',
        //     'tensiles_description' => 'required',
        //     'hts1' => 'required',
        //     'hts2' => 'required',
        //     'hts3' => 'required',
        //     'type' => 'required',
        //     'hardnesses_description' => 'required',
        //     'rubber_id' => 'required',
        //     'filemdr' => 'required|file|size:2048|mimes:jpeg,png,pdf',
        //     'filetensile' => 'required|file|size:2048|mimes:jpeg,png,pdf',
        // ]);
            DB::beginTransaction();

        if ($request->hasFile('filemdr')) {
            $fileMdr = $request->file('filemdr');
            $imageNameMdr = time() . '_' . $fileMdr->getClientOriginalName();
            $destinationPathMdr = public_path('assets/uploads/mdrs/file/');
            $fileMdr->move($destinationPathMdr, $imageNameMdr);

            $Mdrs = Mdrs::create([
                'ml' => $request->input('ml'),
                'mh' => $request->input('mh'),
                'ts1' => $request->input('ts1'),
                'ts2' => $request->input('ts2'),
                'tc50' => $request->input('tc50'),
                'tc90' => $request->input('tc90'),
                'mdrs_description' => $request->input('mdrs_description'),
                'filemdr' => $imageNameMdr,
                'rubber_id' => $request->input('rubber_id'),
            ]);
        }

        if ($request->hasFile('filetensile')) {
            $fileTensile = $request->file('filetensile');
            $imageNameTensile = time() . '_' . $fileTensile->getClientOriginalName();
            $destinationPathTensile = public_path('assets/uploads/filetensiles/file/');
            $fileTensile->move($destinationPathTensile, $imageNameTensile);

            $tensiles = Tensiles::create([
                'thicknees' => $request->input('thicknees'),
                'width' => $request->input('width'),
                'length' => $request->input('length'),
                'max_force' => $request->input('max_force'),
                'max_stress' => $request->input('max_stress'),
                'modules' => $request->input('modules'),
                'break' => $request->input('break'),
                'tensiles_description' => $request->input('tensiles_description'),
                'filetensile' => $imageNameTensile,
                'rubber_id' => $request->input('rubber_id'),
            ]);
        }

        $hardnesses = Hardnesses::create([
            'hts1' => $request->input('hts1'),
            'hts2' => $request->input('hts2'),
            'hts3' => $request->input('hts3'),
            'type' => $request->input('type'),
            'hardnesses_description' => $request->input('hardnesses_description'),
            'rubber_id' => $request->input('rubber_id'),
        ]);

        // $request->moreFields['testlab_id'] = $testLabsFromSqlServer->id;



        foreach ($request->moreFields as $value) {
            $testLabsFromSqlServer->id;
            if ($value['record_id'] == 'Select' || $value['weights'] === null) {
                continue;
            }

            // Create Material records

            $mockupArr = [
                'record_id' => $value['record_id'],
                'weights' => $value['weights'],
                'other_id' => $value['other_id'],
                'testlab_id' => $testLabsFromSqlServer->id, // Note: This may not work as expected
            ];

            // dd($mockupArr);

            $material = Material::create($mockupArr);
        }




        $createdmdrs = Mdrs::find($Mdrs->id);

        // Retrieve records from the TestLabs table using SQL Server connection
        $mdr = DB::connection('sqlsrv')
        ->table('mdrs')
        ->where('id', $createdmdrs->id)
            ->orderBy('id', 'asc')
            ->first(); // Use first() to get a single record

        $createdTensile = Tensiles::find($tensiles->id);

        // Retrieve records from the TestLabs table using SQL Server connection
        $tensile = DB::connection('sqlsrv')
        ->table('tensiles')
        ->where('id', $createdTensile->id)
        ->orderBy('id', 'asc')
        ->first(); // Use first() to get a single record

        $createdHardnesses = Hardnesses::find($hardnesses->id);

        // Retrieve records from the TestLabs table using SQL Server connection
        $hardness = DB::connection('sqlsrv')
        ->table('hardnesses')
        ->where('id', $createdHardnesses->id)
            ->orderBy('id', 'asc')
            ->first(); // Use first() to get a single record

        $testLab->update([
            'mdrs_id' => $mdr->id,
            'tensiles_id' => $tensile->id,
            'hardness_id' => $hardness->id,
            'rubber_id' => $request->input('rubber_id'),
        ]);

        DB::commit();


        return redirect('admin/rubbers')->with('status', 'Added Complete');
             } catch (\Exception $e) {
                DB::rollback();

                //  dd($e);
                return redirect()->back()->with('error', 'Error occurred while saving data');

        }
    }

}
