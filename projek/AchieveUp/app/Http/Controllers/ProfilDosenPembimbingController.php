<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Dosen;

class ProfilDosenPembimbingController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Profil Dosen Pembimbing',
            'list' => ['Profil']
        ];

        $page = (object)[
            'title' => 'Halaman Profil Dosen Pembimbing'
        ];

        $activeMenu = '';

        return view('dosen.profil.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dosen' => $this->getDataDosen(),
        ]);
    }

    public function getDataDosen()
    {
        $dosen = Auth::guard('dosen')->user();
        $data = [
            'id' => $dosen->id,
            'nama' => $dosen->nama,
            'username' => $dosen->username,
            'nidn' => $dosen->nidn,
            'email' => $dosen->email,
            'role' => $dosen->role,
            'foto' => $dosen->foto ? asset('storage/' . $dosen->foto) : asset('img/default-avatar.png'),
        ];

        return $data;
    }

    public function edit()
    {
        $breadcrumb = (object)[
            'title' => 'Edit Profil Dosen Pembimbing',
            'list' => ['Profil', 'Edit']
        ];

        $page = (object)[
            'title' => 'Halaman Edit Profil Dosen Pembimbing'
        ];
        $activeMenu = '';
        return view('dosen.profil.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dosen' => $this->getDataDosen(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:dosen,username,' . $dosen->id,
            'email' => 'required|email|max:255|unique:dosen,email,' . $dosen->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dosen->nama = $request->input('nama');
        $dosen->username = $request->input('username');
        $dosen->email = $request->input('email');

        if ($request->hasFile('foto')) {
            if ($dosen->foto) {
                Storage::delete($dosen->foto);
            }
            $path = $request->file('foto')->store('foto_dosen_pembimbing', 'public');
            $dosen->foto = $path;
        }

        $dosen->save();

        return redirect()->route('dosen.profil.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }
    
}
