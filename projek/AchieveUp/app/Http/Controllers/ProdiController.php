<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Program Studi',
            'list' => ['Home', 'Manajemen Program Studi'],
        ];

        $page = (object) [
            'title' => 'Daftar Program Studi',
        ];

        $activeMenu = 'prodi';

        return view('admin.prodi.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function getProdi($id)
    {
        $prodi = ProgramStudi::find($id);
        return $prodi;
    }

    public function getall(Request $request)
    {
        $prodis = ProgramStudi::all();

        $data = $prodis->map(function ($prodi) {
            return [
                'id' => $prodi->id,
                'kode' => $prodi->kode,
                'nama' => $prodi->nama,
            ];
        });

        return response()->json($data);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Prodi',
            'list' => ['Home', 'Prodi', 'Tambah Prodi'],
        ];

        $page = (object) [
            'title' => 'Tambah Program Studi',
        ];

        $activeMenu = 'prodi';

        return view('admin.prodi.create', compact('breadcrumb', 'page', 'activeMenu'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10|unique:program_studi,kode',
            'nama' => 'required|string|max:255|unique:program_studi,nama',
        ], [
            'kode.unique' => 'Kode sudah digunakan.',
            'nama.unique' => 'Nama sudah digunakan.',
        ]);

        try {
            ProgramStudi::create($request->all());
            return redirect()->route('admin.prodi.index')->with('success', 'Program Studi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Program Studi: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $prodi = ProgramStudi::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Edit Prodi',
            'list' => ['Home', 'Prodi', 'Edit Prodi'],
        ];

        $page = (object) [
            'title' => 'Edit Program Studi',
        ];

        $activeMenu = 'prodi';

        return view('admin.prodi.edit', compact('breadcrumb', 'page', 'activeMenu', 'prodi'));
    }
    public function update(Request $request, $id)
    {
        $prodi = ProgramStudi::findOrFail($id);

        $request->validate([
            'kode' => 'required|string|max:10|unique:program_studi,kode,' . $prodi->id,
            'nama' => 'required|string|max:255|unique:program_studi,nama,' . $prodi->id,
        ], [
            'kode.unique' => 'Kode sudah digunakan.',
            'nama.unique' => 'Nama sudah digunakan.',
        ]);

        try {
            $prodi->update($request->all());
            return redirect()->route('admin.prodi.index')->with('success', 'Program Studi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui Program Studi: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $prodi = ProgramStudi::findOrFail($id);

            if ($prodi->mahasiswa()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Program Studi tidak dapat dihapus karena memiliki data mahasiswa.',
                ], 400);
            }

            $prodi->delete();

            return response()->json([
                'success' => true,
                'message' => 'Program Studi berhasil dihapus.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus Program Studi: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $prodi = ProgramStudi::with('mahasiswa')->findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Detail Program Studi',
            'list' => ['Home', 'Program Studi', 'Detail'],
        ];

        $page = (object) [
            'title' => 'Detail data Program Stdi',
        ];

        $activeMenu = 'prodi';

        return view('admin.prodi.detail', compact(
            'breadcrumb',
            'page',
            'activeMenu',
            'prodi'
        ));
    }
}
