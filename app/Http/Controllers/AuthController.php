<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// auth
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function auth(){
        if(session('gotodashboardkops')){
            return redirect('/kops/dashboard');
        }elseif (session('gotodashboardstaffops')) {
            return redirect('/staffops/dashboard');
        }elseif (session('gotodashboardadmin')) {
            return redirect('/admin/dashboard');
        }
        return view('login');
    }

    public function login(Request $request){
        
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        //Login Manual Guarded
        // $credentials = $request->only('username','password');
        // $credentials=['USERNAME'=>$request->username,'PASSWORD'=>$request->password];

        // if (Auth::guard('login')->attempt(['USERNAME'=>$request->username, 'PASSWORD'=>$request->password])){
        //     return redirect('/kops/dashboard');
        // }else{
        //     return back()->with('status','Login Gagal');
        // }

        //login manual DB
        $user=DB::table('akun')
                ->where('USERNAME',$request->username)
                ->where('PASSWORD',$request->password)
                ->first();
        if($user){
            if ($user->HAK_AKSES=="Kepala Operasi") {
                Auth::guard('login')->loginUsingId($user->ID);
                session(['gotodashboardkops'=>true,'name'=>$user->USERNAME]);
                return redirect('/kops/dashboard');
            }
            if ($user->HAK_AKSES=="Staff Operasi") {
                Auth::guard('login')->loginUsingId($user->ID);
                session(['gotodashboardstaffops'=>true,'name'=>$user->USERNAME]);
                return redirect('/staffops/dashboard');
            }
            if ($user->HAK_AKSES=="Administrasi") {
                Auth::guard('login')->loginUsingId($user->ID);
                session(['gotodashboardadmin'=>true,'name'=>$user->USERNAME]);
                return redirect('/admin/dashboard');
            }            
        }else{
            return back()->with('status','Login Gagal');
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/auth');
    }
}
