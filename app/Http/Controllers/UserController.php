<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Department;
use App\Models\Material;
use App\Models\Rubber;



use App\Models\Mdrs;
use App\Models\Hardnesses;
use App\Models\Tensiles;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;


class UserController extends Controller
{
    public function index()
    {
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->orderBy('record_id','asc')
        ->get();

        $departments = DB::connection('sqlsrv')
        ->table('departments') // Assuming 'rubbers' is the table name
        ->whereNotNull('name')
        ->orderBy('id', 'asc')
        ->get();

        $users = AuthUser::paginate(10);





        return view('admin.usermanagement.index', compact('users', 'materials', 'departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id',6)
        ->where('isDelete',0)
        ->select(['record_id','other_id','name','detail'])
        ->orderBy('record_id','asc')
        ->get();

        $departments = DB::connection('sqlsrv')
        ->table('departments') // Assuming 'rubbers' is the table name
        ->whereNotNull('name')
        ->orderBy('id', 'asc')
        ->get();



        $users = new AuthUser();

        return view('admin.usermanagement.create', compact('users', 'materials', 'departments'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'department_id' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'department_id' => $data['department_id'],
            'password' => Hash::make($data['password']),
            'created_by' => Auth::user()->name,
        ]);

        // dd($data);

        return redirect('admin/usermanagement')->with('status', 'User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $materials = DB::connection('sqlsrv2')->table('master_pur_other')
        ->where('system_id', 6)
        ->where('isDelete', 0)
        ->select(['record_id', 'other_id', 'name', 'detail'])
        ->orderBy('record_id', 'asc')
        ->get();

        $departments = DB::connection('sqlsrv')
        ->table('departments') // Assuming 'rubbers' is the table name
        ->whereNotNull('name')
        ->orderBy('id', 'asc')
        ->get();

        $depart = DB::connection('sqlsrv')
        ->table('departments') // Assuming 'rubbers' is the table name
        ->whereNotNull('name')
        ->get();

        //  dd($depart);

        $users = AuthUser::find($id);

        // dd($users);



        return view('admin.usermanagement.edit', compact('users', 'materials', 'departments', 'depart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $user = User::find($id);

    //     if ($user) {
    //         $data = $request->all(); // Get all form data from the request

    //         // Check if the password field is present in the request and not empty
    //         if (!empty($data['password'])) {
    //             $data['password'] = Hash::make($data['password']);
    //         } else {
    //             // If password is not provided, remove it from the update array
    //             unset($data['password']);
    //         }
    //         $user->update([
    //             'name' => $data['name'],
    //             'email' => $data['email'],
    //             'department_id' => $data['department_id'],
    //             'password' => $data['password'], // This is hashed in case it's present in the request
    //         ]);


    //     }

    //     // dd($data);
    //     return redirect('admin/usermanagement')->with('status', 'User added successfully');
    //     }
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'department_id' => 'required|integer',
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            if (!empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }

            // Check if the user is authenticated before setting 'updated_by'
            if (Auth::check()) {
                $data['updated_by'] = Auth::user()->name;
            }

            $user->update($data);

            return redirect('admin/usermanagement')->with('status', 'User updated successfully');
        }

        abort(404, 'User not found');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if ($user) {
            // Delete the user
            $user->delete();

            return redirect('admin/usermanagement')->with('status', 'User deleted successfully');
        }

        // If the user does not exist, redirect back with an error message
        return redirect('admin/usermanagement')->with('error', 'User not found');
    }
}
