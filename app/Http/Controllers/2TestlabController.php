<?php

namespace App\Http\Controllers;

use App\Models\Mdrs;
use App\Models\Material;
use App\Models\Rubber;
use App\Models\Customer;
use App\Models\Hardnesses;
use App\Models\Tensiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestlabController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->orderBy('record_id','asc')
        ->select(['record_id','other_id','name','detail'])
        ->get();

        $customers = DB::connection('sqlsrv3')->table('datamaster_code')
        ->where('isDelete',0)
        ->orderBy('code_id','asc')
        ->get();

        $products = DB::connection('sqlsrv4')->table('layer3_data')
        ->where('isDelete',0)
        ->orderBy('name','asc')
        ->get();


        $rubbers = DB::connection('sqlsrv')
        ->table('rubbers') // Assuming 'rubbers' is the table name
        ->whereNotNull('name_formula')
        ->orderBy('id', 'asc')
        ->paginate(100);


        $mdrs = new Mdrs();
        $request->validate([

        ]);
        if($request->hasFile("filemdr")){
            $file=$request->file("filemdr");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("assets/uploads/mdrs/file/"),$imageName);

            $mdrs  = Mdrs::create([
                "ml" =>$request->ml,
                "mh" =>$request->mh,
                "ts1" =>$request->ts1,
                "ts2" =>$request->ts2,
                "tc50" =>$request->tc50,
                "tc90" =>$request->tc90,
                "description" =>$request->description,
                "filemdr" => $imageName,
                "rubber_id" =>$request->id,
            ]);
        }

        $tensiles = new Tensiles();
        $request->validate([

        ]);
        if($request->hasFile("filetensile")){
            $file=$request->file("filetensile");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("assets/uploads/filetensiles/file/"),$imageName);

            $tensiles  = Tensiles::create([
                "ts1" =>$request->ts1,
                "ts2" =>$request->ts2,
                "ts3" =>$request->ts3,
                "type" =>$request->type,
                "description" =>$request->description,
                "filetensile" => $imageName,
                "rubber_id" =>$request->id,
            ]);
        }

        $tensiles = new Hardnesses();
        $request->validate([

        ]);

        $hardnesses  = Hardnesses::create([
            "ts1" =>$request->ts1,
            "ts2" =>$request->ts2,
            "ts3" =>$request->ts3,
            "type" =>$request->type,
            "description" =>$request->description,
            "rubber_id" =>$request->id,
        ]);


         return redirect('admin/rubbers')->with('status', "Category Added Complete");

    }
}
