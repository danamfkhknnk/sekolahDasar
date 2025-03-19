<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\ruangkelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RuangkelasController extends Controller
{
    public function storeguru(Request $request, $id){
        $request->validate([
            'guru_id'=>'required',
        ]);
        $kelas = Kelas::FindOrFail($id);
        ruangkelas::create(['kelas_id' => $kelas->id, 'guru_id' => $request->guru_id]);
        Session::flash('message','Berhasil Tambah Guru');

        return redirect()->route('kelas', $kelas->id);
    }

    public function deleteguru($id){
        $ruangkelas = ruangkelas::FindOrFail($id);
        $kelas = $ruangkelas->kelas_id;
        $ruangkelas->delete();
    
        Session::flash('message','Berhasil Hapus Guru');

        return redirect()->route('kelas', $kelas);
    }
    
    public function deletesiswa($id){
        $ruangkelas = ruangkelas::FindOrFail($id);
        $kelas = $ruangkelas->kelas_id;
        $ruangkelas->delete();
    
        Session::flash('message','Berhasil Hapus Siswa');

        return redirect()->route('kelas', $kelas);
    }

    public function storesiswa(Request $request, $id){
        $request->validate([
            'siswa_id'=>'required',
        ]);

        $kelas = Kelas::FindOrFail($id);

        ruangkelas::create(['kelas_id' => $kelas->id, 'siswa_id' => $request->siswa_id]);
        Session::flash('message','Berhasil Tambah Siswa');

        return redirect()->route('kelas', $kelas->id);
    }
}