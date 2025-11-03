<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;

class PeriodeController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = (object)[
            'title' => 'Manajemen Periode',
            'list' => ['Home', 'Manajemen Periode']
        ];

        $page = (object)[
            'title' => 'Daftar Periode'
        ];

        $activeMenu = 'periode';

        if ($request->ajax()) {
            return view('periode.partial-index', compact('breadcrumb', 'page', 'activeMenu'));
        }

        return view('admin.periode.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function getall()
    {
        $periodes = Periode::all();

        $data = $periodes->map(function ($periode) {
            return [
                'id' => $periode->id,
                'kode' => $periode->kode,
                'nama' => $periode->nama,
                'is_active' => $periode->is_active,
            ];
        });

        return response()->json($data);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Periode',
            'list' => ['Home', 'Periode', 'Tambah Periode']
        ];

        $page = (object)[
            'title' => 'Tambah Periode'
        ];

        $activeMenu = 'periode';

        return view('admin.periode.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => ['required','regex:/^\d{4}\-\d{1}$/', 'max:10'],
            'nama' => ['required', 'regex:/^\d{4}\/\d{4}\s+(ganjil|genap)$/i', 'max:255'],
        ], [
            'nama.regex' => 'Format nama periode harus berupa "YYYY/YYYY ganjil/genap". Contoh: "2023/2024 genap".',
            'kode.regex' => 'Format kode periode harus berupa "YYYY-N". Contoh: "2023-1".'
        ]);

        // Nonaktifkan semua periode yang aktif
        Periode::where('is_active', true)->update(['is_active' => false]);

        // Simpan periode baru dan langsung aktif
        Periode::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'is_active' => true,
        ]);

        return redirect()->route('admin.periode.index')->with('success', 'Periode berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $periode = Periode::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Edit Periode',
            'list' => ['Home', 'Periode', 'Edit Periode']
        ];

        $page = (object)[
            'title' => 'Edit Periode'
        ];

        $activeMenu = 'periode';

        return view('admin.periode.edit', compact('breadcrumb', 'page', 'activeMenu', 'periode'));
    }

    public function show($id)
    {
        $periode = Periode::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Detail Periode',
            'list' => ['Home', 'Periode', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Periode'
        ];

        $activeMenu = 'periode';

        return view('admin.periode.detail', compact('periode', 'breadcrumb', 'page', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $periode = Periode::findOrFail($id);

        $request->validate([
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:255',
        ]);

        $periode->update($request->all());

        return redirect()->route('admin.periode.index')->with('success', 'Periode berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $periode = Periode::findOrFail($id);

            $periode->delete();

            return response()->json([
                'success' => true,
                'message' => 'Periode berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus Periode: ' . $e->getMessage()
            ], 500);
        }
    }


    public function activate($id)
    {
        // Nonaktifkan semua periode
        Periode::query()->update(['is_active' => false]);

        // Aktifkan satu periode
        $periode = Periode::findOrFail($id);
        $periode->is_active = true;
        $periode->save();

        return response()->json([
            'success' => true,
            'message' => 'Periode berhasil diaktifkan.'
        ]);
    }

}
