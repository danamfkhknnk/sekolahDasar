<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\kelas;
use App\Models\ruangkelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    public function index($id){

        $guru = Guru::all();
        $kelas = kelas::findOrFail($id);
        $kelas->with('siswa','guru');
        $siswa = Siswa::all();
        
        $tabelguru = ruangkelas::whereNotNull('guru_id')->with('guru')->get();
        $tabelsiswa = ruangkelas::whereNotNull('siswa_id')->with('siswa')->get();
        return view('Admin.Kelas.Kelas', compact('kelas','guru','siswa','tabelguru','tabelsiswa'));
    }

    public function store(Request $request){
        $request->validate([
            'nama'=>'required|unique:kelas,nama',
        ]);

        $kelas = kelas::create($request->all());
        RuangKelas::create(['kelas_id' => $kelas->id]);
        Session::flash('message','Berhasil Tambah Kelas');

        return redirect()->route('kelas', $kelas->id);
    }

    public function delete($id){
        $kelas = kelas::findOrFail($id);
        $kelas->delete();
        Session::flash('message','Berhasil Hapus Kelas');
        return redirect()->route('dashboard');
    }

    public function updatewali(Request $request,$id){
        $kelas = kelas::findOrFail($id);
        $kelas->guru_id = $request->guru_id;
        $kelas->save();
        Session::flash('message','Berhasil Update Wali Kelas');
        return redirect()->route('kelas', $kelas->id);
    }
    public function updateketua(Request $request,$id){
        $kelas = kelas::findOrFail($id);
        $kelas->siswa_id = $request->siswa_id;
        $kelas->save();
        Session::flash('message','Berhasil Update Ketua Kelas');
        return redirect()->route('kelas', $kelas->id);
    }
}