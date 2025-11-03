<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Mahasiswa;

class ProfilMahasiswaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Profil Mahasiswa',
            'list' => ['Profil']
        ];

        $page = (object)[
            'title' => 'Halaman Profil Mahasiswa'
        ];

        $activeMenu = '';

        return view('mahasiswa.profil.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'mahasiswa' => $this->getDataMahasiswa(),
        ]);
    }

    public function getDataMahasiswa()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $data = [
            'id' => $mahasiswa->id,
            'nama' => $mahasiswa->nama,
            'username' => $mahasiswa->username,
            'nim' => $mahasiswa->nim,
            'email' => $mahasiswa->email,
            'prodi_id' => $mahasiswa->prodi_id,
            'role' => 'mahasiswa',
            'foto' => $mahasiswa->foto ? asset('storage/' . $mahasiswa->foto) : asset('img/default-avatar.png'),
        ];

        return $data;
    }
    public function edit()
    {
        $breadcrumb = (object)[
            'title' => 'Edit Profil Mahasiswa',
            'list' => ['Profil', 'Edit']
        ];

        $page = (object)[
            'title' => 'Halaman Edit Profil Mahasiswa'
        ];
        $activeMenu = '';
        return view('mahasiswa.profil.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'mahasiswa' => $this->getDataMahasiswa(),
        ]);
    }

    public function update(Request $request, $id)
    {
        
        $mahasiswa = Mahasiswa::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:mahasiswas,username,' . $mahasiswa->id,
            'email' => 'required|email|max:255|unique:mahasiswas,email,' . $mahasiswa->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->username = $request->input('username');
        $mahasiswa->email = $request->input('email');

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto) {
                Storage::delete($mahasiswa->foto);
            }
            $mahasiswa->foto = $request->file('foto')->store('foto_mahasiswa', 'public');
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.profil.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
