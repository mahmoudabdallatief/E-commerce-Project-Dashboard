<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Priv;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = session('log');
        $admins = Admin::with(['priv'])->where('pri', '<>', 1)
        ->where('pri', '<>', $session)
        ->orderBy('id', 'asc')
        ->get();
        $privs = Priv::where('id_priv', '>=', $session)->where('id_priv' ,'<>' , 1)
        ->get();
        return view('admins', compact('admins','privs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $session = session('log');
        $admins = Admin::with(['priv'])->findOrFail($id);
        $privs = Priv::where('id_priv', '>=', $session)->where('id_priv' ,'<>' , 1)
        ->get();
        return view('editadmin',['admins' => $admins,'privs' => $privs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'pri' => 'required',
        ]);

        $pri = $request->input('pri');

        DB::table('admin')->where('id', $id)->update([
            'pri' => $pri,
        
        ]);

        return redirect('admins')->with('success-edit', 'admin edited successfully');
        if ($validator->fails()) {
            return redirect('editadmin')->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return redirect('admins')->with('success-delete', 'admin successfully deleted.');
    }
    public function addnewadmin(Request $request)
    {
        $username = strip_tags($request->input('admin'));
        $password = strip_tags($request->input("password"));
        $md5 = md5($password);
        $priv = $request->input('priv');
    
        $validate = Validator::make($request->all(), [
            'admin' => 'required',
            'password' => 'required',
            'priv' => 'required',
        ]);
    
        if ($validate->fails()) {
            return response()->json(2);
        } else {
            Admin::insert([
                'username' => $username,
                'password' => $md5,
                'pri' => $priv,
            ]);
        }
    }
}
