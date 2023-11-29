<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Priv;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
       
        if(session('log')) {
 return redirect()->route('dashboard'); 
 
        }
        return view('index');
       
    }
    public function login(Request $request)
{
    $username = $request->username;
    $password = md5($request->password);

    $admin = Admin::where('username', $username)
                  ->where('password', $password)
                  ->first();

    if ($admin) {
        session()->put('log', $admin->pri);
        return redirect()->route('dashboard');
    } else {
        return redirect()->back()->with('error', 'username or password error');
    }
   
}
public function dashboard(){
    
    $orders_count = DB::table('orders')->count();
        $comments_count = DB::table('comment')->count();
        $users_count= DB::table('users')->count();
        $products_count = DB::table('prro')->count();
        $session = session('log');
       
        $admins = Admin::where('pri',  '=',$session)->first();
       
               return view('dashboard', compact('orders_count', 'comments_count', 'users_count', 'products_count','admins'));
      
            
     
}

public function logout()
{
    session()->flush();
    return redirect()->route('index');
}

}
