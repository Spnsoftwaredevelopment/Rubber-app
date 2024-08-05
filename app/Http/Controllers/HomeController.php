<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->orderBy('record_id','asc')
        ->get();

        $mat =  DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->get();

        $weight = DB::connection('sqlsrv')->table('materials')->get();

        return view('admin.dashboards.index', compact('materials','mat','weight'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
