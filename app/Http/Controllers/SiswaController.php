<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index(){

        $siswas = Siswa::simplePaginate(5);

        return view('Admin.Siswa.Siswa', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|unique:siswas,nisn|numeric',
            'jk' => 'required|in:laki-laki,perempuan',
            'tempatlahir' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'alamat' => 'required|string',
            'fotosiswa' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);
        $data = $request->only('nama_lengkap', 'nisn', 'jk', 'tempatlahir', 'tanggallahir', 'alamat');

        if ($request->hasFile('fotosiswa')) {
            $file = $request->file('fotosiswa');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('foto', $fileName, 'public');
            $data['fotosiswa'] = $fileName;
        }
        Siswa::create($data);

        Session::flash('message', 'Berhasil Menambah Data Siswa');

        return redirect()->route('siswa');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|numeric',
            'jk' => 'required|in:laki-laki,perempuan',
            'tempatlahir' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'alamat' => 'required|string',
            'fotosiswa' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        $siswa = Siswa::findOrFail($id);
        $data = $request->only('nama_lengkap', 'nisn', 'jk', 'tempatlahir', 'tanggallahir', 'alamat');

        if ($request->hasFile('fotosiswa')) {
            if ($siswa->fotosiswa) {
                Storage::disk('public')->delete('foto/' . $siswa->fotosiswa);
            }
            $file = $request->file('fotosiswa');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('foto', $fileName, 'public');
            $data['fotosiswa'] = $fileName;
        }
        $siswa->update($data);

        Session::flash('message', 'Berhasil memperbarui data siswa');

        return redirect()->route('siswa');
    }

    public function delete ($id){
        $siswa = siswa::findOrFail($id);

        $siswa->delete();
        Session::flash('message', 'Berhasil Menghapus Data siswa');
        return redirect()->route('siswa');
    }
}