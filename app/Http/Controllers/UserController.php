<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(){
        return view('Component.login');
    }
    public function regis(){
        return view('Component.Register');
    }

    public function aksiregis(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email',
            'name' => 'required|unique:users,name',
            'password' =>' required',
        ]);

        User::create($request->all());

        Session::flash('message','Berasil Register, Silahkan Login');
        return redirect()->route('login');
    }

    public function aksilogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' =>' required',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password

        ];

        if(Auth::attempt($infologin)){
            return redirect('/admin');
        }else{
            return redirect()->route('login')->withErrors('Email dan password yang dimasukkan salah')->withInput();
        }
    }

    public function logout(){
        Auth::logout();

        Session::flash('message',('Berhasil Keluar'));
        return redirect()->route('login');
    }

    public function dashboard(){

        $user = Auth::user();

        return view ('Admin.Dashboard',compact('user'));
    }
    
}