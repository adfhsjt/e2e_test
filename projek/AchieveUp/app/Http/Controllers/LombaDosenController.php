<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;


class LombaDosenController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Lomba',
            'list' => ['Home', 'Lomba']
        ];

        $page = (object)[
            'title' => 'Daftar lomba yang terdaftar dalam sistem'
        ];

        $activeMenu = 'lomba';

        
        return view('dosen.lomba.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function getAll()
    {
        $lombas = Lomba::with('bidang')->get();


        $data = $lombas->map(function ($lomba) {
            $warnaTingkat = match ($lomba->tingkat) {
                'internasional' => 'bg-red-100 text-red-800',
                'nasional'      => 'bg-blue-100 text-blue-800',
                'regional'      => 'bg-green-100 text-green-800',
                'provinsi'      => 'bg-yellow-100 text-yellow-800',
            };

            return [
                'id' => $lomba->id,
                'judul' => $lomba->judul,
                'tempat' => $lomba->tempat,
                'tanggal_daftar' => $lomba->tanggal_daftar,
                'tanggal_daftar_terakhir' => $lomba->tanggal_daftar_terakhir,
                'periode_pendaftaran' => Carbon::parse($lomba->tanggal_daftar)->format('d M Y') .
                    ' s.d. ' .
                    Carbon::parse($lomba->tanggal_daftar_terakhir)->format('d M Y'),
                'link' => $lomba->url,
                'tingkat' => $lomba->tingkat,
                'tingkat_warna' => $warnaTingkat,
                'is_individu' => $lomba->is_individu ? 'Ya' : 'Tidak',
                'is_active' => $lomba->is_active ? 'Ya' : 'Tidak',
                'file_poster' => $lomba->file_poster,
                'is_akademik' => $lomba->is_akademik ? 'Ya' : 'Tidak',
                'bidang' => $lomba->bidang->map(function ($b) {
                    return [
                        'id' => $b->id,
                        'kode' => $b->kode,
                        'nama' => $b->nama
                    ];
                }),
            ];
        });

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Lomba',
            'list' => ['Home', 'Lomba', 'Tambah Lomba']
        ];

        $page = (object)[
            'title' => 'Tambah lomba baru'
        ];

        $bidangs = Bidang::all();

        $activeMenu = 'lomba';

        return view('dosen.lomba.create', compact('breadcrumb', 'page', 'activeMenu', 'bidangs'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'is_individu' => $request->has('is_individu'),
            'is_akademik' => $request->has('is_akademik'),
            'is_active' => $request->has('is_active'),
        ]);
        
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
            'tanggal_daftar_terakhir' => 'required|date|after_or_equal:tanggal_daftar',
            'url' => 'nullable|url',
            'tingkat' => 'required|string|in:internasional,nasional,regional,provinsi',
            'is_individu' => 'required|boolean',
            'is_active' => 'required|boolean',
            'is_akademik' => 'required|boolean',
            'file_poster' => 'nullable|image|max:2048',  
            'bidang' => 'required|array|min:1',
            'bidang.*' => 'exists:bidang,id',
        ]);

        $posterPath = null;
        if ($request->hasFile('file_poster')) {
            $posterPath = $request->file('file_poster')->store('posters', 'public');
        }

        $lomba = Lomba::create([
            'judul' => $validated['judul'],
            'tempat' => $validated['tempat'],
            'tanggal_daftar' => $validated['tanggal_daftar'],
            'tanggal_daftar_terakhir' => $validated['tanggal_daftar_terakhir'],
            'url' => $validated['url'] ?? null,
            'tingkat' => $validated['tingkat'],
            'is_individu' => $validated['is_individu'],
            'is_active' => $validated['is_active'],
            'is_akademik' => $validated['is_akademik'],
            'file_poster' => $posterPath,
        ]);

        $lomba->bidang()->sync($validated['bidang']);

        return redirect()->route('dosen.lomba.index')->with('success', 'Data lomba berhasil disimpan.');
    }

    public function show($id)
    {
        $lomba = Lomba::with('bidang')->find($id);

        if (!$lomba) {
            abort(404, 'Lomba tidak ditemukan');
        }

        $breadcrumb = (object)[
            'title' => 'Detail Lomba',
            'list' => ['Home', 'Lomba', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail lomba: ' . $lomba->judul
        ];

        $activeMenu = 'lomba';

        return view('dosen.lomba.detail', compact('breadcrumb', 'page', 'activeMenu', 'lomba'));
    }

}
