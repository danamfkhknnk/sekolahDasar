<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    public function index(){

        $kelases = kelas::simplePaginate(10);
        return view('Admin.Kelas.Kelas', compact('kelases'));
    }

    public function tambahKelas(Request $request){
        $request->validate([
            'nama'=>'required',
        ]);

        kelas::create($request->all());

        Session::flash('message','Berhasil Tambah Kelas');

        return redirect()->route('kelas');
    }
}