<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrangTuaController extends Controller
{
    public function index (){
        $orangtuas = OrangTua::all();
        return view ('Admin.Orang_Tua.Orangtua', compact('orangtuas'));
    }

    public function store(Request $request){
        $request->validate([
            'nama'=>'required',
        ]);

        OrangTua::create($request->all());

        Session::flash('message','Data Berhasil Ditambah');

        return redirect()->route('orangtua');

    }
}