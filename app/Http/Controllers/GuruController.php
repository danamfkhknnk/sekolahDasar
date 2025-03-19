<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index(){

        $gurus = guru::simplePaginate(5);

        return view('Admin.Guru.Guru', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nuptk' => 'required|unique:gurus,nuptk|numeric',
            'jk' => 'required|in:laki-laki,perempuan',
            'mapel' => 'required|string|max:255',
            'tempatlahir' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'alamat' => 'required|string',
            'fotoguru' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);
        $data = $request->only('nama_lengkap', 'nuptk', 'jk', 'mapel', 'tempatlahir', 'tanggallahir', 'alamat');

        if ($request->hasFile('fotoguru')) {
            $file = $request->file('fotoguru');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('foto', $fileName, 'public');
            $data['fotoguru'] = $fileName;
        }
        Guru::create($data);

        Session::flash('message', 'Berhasil menambah data guru');

        return redirect()->route('guru');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nuptk' => 'required|numeric',
            'jk' => 'required|in:laki-laki,perempuan',
            'mapel' => 'required|string|max:255',
            'tempatlahir' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'alamat' => 'required|string',
            'fotoguru' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        $guru = guru::findOrFail($id);
        $data = $request->only('nama_lengkap', 'nuptk', 'jk', 'mapel', 'tempatlahir', 'tanggallahir', 'alamat');

        if ($request->hasFile('fotoguru')) {
            if ($guru->fotoguru) {
                Storage::disk('public')->delete('foto/' . $guru->fotoguru);
            }
            $file = $request->file('fotoguru');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('foto', $fileName, 'public');
            $data['fotoguru'] = $fileName;
        }
        $guru->update($data);

        Session::flash('message', 'Berhasil memperbarui data guru');

        return redirect()->route('guru');
    }

    public function delete ($id){
        $guru = guru::findOrFail($id);

        $guru->delete();
        Session::flash('message', 'Berhasil Menghapus Data Guru');
        return redirect()->route('guru');
    }
}