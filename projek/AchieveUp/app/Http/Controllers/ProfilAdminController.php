<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Dosen;

class ProfilAdminController extends Controller
{
    public function index(){
        $breadcrumb = (object)
        [
            'title' => 'Profil Admin',
            'list' => ['Profil']
        ];
        

        $page = (object)
        [
            'title' => 'Halaman Profil Admin'
        ];

        $activeMenu = '';

        return view('admin.profil.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'admin' => $this->getDataAdmin(),
        ]);
    }

    public function getDataAdmin()
    {
        $admin = Auth::guard('dosen')->user();
        $data = [
            'id' => $admin->id,
            'nama' => $admin->nama,
            'username' => $admin->username,
            'nidn' => $admin->nidn,
            'email' => $admin->email,
            'role' => $admin->role,
            'foto' => $admin->foto ? asset('storage/' . $admin->foto) : asset('img/default-avatar.png'),
        ];

        return $data;
    }

    public function edit(){
        $breadcrumb = (object)
        [
            'title' => 'Edit Profil Admin',
            'list' => ['Profil', 'Edit']
        ];

        $page = (object)
        [
            'title' => 'Halaman Edit Profil Admin'
        ];

        $activeMenu = 'dashboard';

        return view('admin.profil.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'admin' => $this->getDataAdmin(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $admin = Dosen::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:dosen,username,' . $admin->id,
            'email' => 'required|email|max:255|unique:dosen,email,' . $admin->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $admin->nama = $validated['nama'];
        $admin->username = $validated['username'];
        $admin->email = $validated['email'];

        if ($request->hasFile('foto')) {
            if ($admin->foto) {
                Storage::disk('public')->delete($admin->foto);
            }
            $admin->foto = $request->file('foto')->store('foto_admin', 'public');
        }

        $admin->save();

        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

    
        
}
