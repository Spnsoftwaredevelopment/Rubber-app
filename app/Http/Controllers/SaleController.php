<?php


namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Rubber;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {

        $materials = DB::table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->orderBy('record_id','asc')
        ->select(['record_id','other_id','name','detail'])
        ->get();
        return view('admin/sales/index', compact('materials'));
    }

}
