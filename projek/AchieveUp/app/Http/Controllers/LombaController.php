<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Lomba;
use App\Models\PengajuanLombaMahasiswa;
use App\Models\PengajuanLombaNote;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LombaController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Manajemen Lomba',
            'list' => ['Home', 'Manajemen Lomba'],
        ];

        $page = (object) [
            'title' => 'Daftar lomba yang terdaftar dalam sistem',
        ];

        $activeMenu = 'lomba';

        return view('admin.lomba.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function getLomba($id)
    {
        $lomba = Lomba::with('bidang')->findOrFail($id);

        $warnaTingkat = match ($lomba->tingkat) {
            'internasional' => 'bg-red-100 text-red-800',
            'nasional' => 'bg-blue-100 text-blue-800',
            'regional' => 'bg-green-100 text-green-800',
            'provinsi' => 'bg-yellow-100 text-yellow-800',
            default => 'bg-gray-100 text-gray-800',
        };

        $data = [
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
                    'nama' => $b->nama,
                ];
            }),
        ];

        return $data;
    }

    public function getAll()
    {
        $lombas = Lomba::with('bidang')->get();

        $data = Lomba::orderBy('id')->get();

        $data = Lomba::orderBy('id', 'asc')->get();

        $data = $lombas->map(function ($lomba) {
            $warnaTingkat = match ($lomba->tingkat) {
                'internasional' => 'bg-red-100 text-red-800',
                'nasional' => 'bg-blue-100 text-blue-800',
                'regional' => 'bg-green-100 text-green-800',
                'provinsi' => 'bg-yellow-100 text-yellow-800',
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
                        'nama' => $b->nama,
                    ];
                }),
            ];
        });

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Lomba',
            'list' => ['Home', 'Lomba', 'Tambah Lomba'],
        ];

        $page = (object) [
            'title' => 'Tambah lomba baru',
        ];

        $bidangs = Bidang::all();

        $activeMenu = 'lomba';

        return view('admin.lomba.create', compact('breadcrumb', 'page', 'activeMenu', 'bidangs'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'is_individu' => $request->has('is_individu'),
            'is_akademik' => $request->has('is_akademik'),
        ]);

        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'tempat' => 'required|string|max:255',
                'tanggal_daftar' => 'required|date',
                'tanggal_daftar_terakhir' => 'required|date|after_or_equal:tanggal_daftar',
                'url' => 'nullable|url',
                'tingkat' => 'required|string|in:internasional,nasional,regional,provinsi',
                'is_individu' => 'required|boolean',
                'is_akademik' => 'required|boolean',
                'file_poster' => 'nullable|image|max:2048',
                'bidang' => 'required|array|min:1',
                'bidang.*' => 'exists:bidang,id',
            ], [
                'judul.required' => 'Judul lomba wajib diisi.',
                'tempat.required' => 'Tempat lomba wajib diisi.',
                'tanggal_daftar.required' => 'Tanggal daftar wajib diisi.',
                'tanggal_daftar_terakhir.required' => 'Tanggal daftar terakhir wajib diisi.',
                'tingkat.required' => 'Tingkat lomba wajib dipilih.',
                'is_individu.required' => 'Tipe lomba (individu/kelompok) wajib dipilih.',
                'is_akademik.required' => 'Jenis lomba (akademik/non-akademik) wajib dipilih.',
                'bidang.required' => 'Minimal satu bidang lomba harus dipilih.',
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
                'is_active' => 1,
                'is_akademik' => $validated['is_akademik'],
                'file_poster' => $posterPath,
            ]);

            $lomba->bidang()->sync($validated['bidang']);

            return redirect()->route('admin.lomba.index')->with('success', 'Data lomba berhasil disimpan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data lomba.')->withInput();
        }
    }

    public function edit($id)
    {
        $lomba = Lomba::with('bidang')->findOrFail($id);
        $bidangs = Bidang::all();

        $breadcrumb = (object) [
            'title' => 'Edit Lomba',
            'list' => ['Home', 'Lomba', 'Edit Lomba'],
        ];

        $page = (object) [
            'title' => 'Edit lomba',
        ];

        $activeMenu = 'lomba';

        return view('admin.lomba.edit', compact('breadcrumb', 'page', 'activeMenu', 'lomba', 'bidangs'));
    }

    public function update(Request $request, $id)
    {
        $lomba = Lomba::findOrFail($id);

        $request->merge([
            'is_individu' => $request->has('is_individu'),
            'is_akademik' => $request->has('is_akademik'),
            'is_active' => $request->has('is_active'),
        ]);

        try {
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
            ], [
                'judul.required' => 'Judul lomba wajib diisi.',
                'tempat.required' => 'Tempat lomba wajib diisi.',
                'tanggal_daftar.required' => 'Tanggal daftar wajib diisi.',
                'tanggal_daftar_terakhir.required' => 'Tanggal daftar terakhir wajib diisi.',
                'tingkat.required' => 'Tingkat lomba wajib dipilih.',
                'is_individu.required' => 'Tipe lomba (individu/kelompok) wajib dipilih.',
                'is_active.required' => 'Status lomba wajib dipilih.',
                'is_akademik.required' => 'Jenis lomba (akademik/non-akademik) wajib dipilih.',
                'bidang.required' => 'Minimal satu bidang lomba harus dipilih.',
            ]);

            if ($request->hasFile('file_poster')) {
                if ($lomba->file_poster) {
                    Storage::disk('public')->delete($lomba->file_poster);
                }
                $posterPath = $request->file('file_poster')->store('posters', 'public');
            } else {
                $posterPath = $lomba->file_poster;
            }

            $lomba->update([
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

            return redirect()->route('admin.lomba.index')->with('success', 'Data lomba berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data lomba.')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $lomba = Lomba::findOrFail($id);
            $lomba->delete();

            return response()->json([
                'message' => 'Data lomba berhasil dihapus.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus data.',
            ], 500);
        }
    }

    public function show($id)
    {
        $lomba = Lomba::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Detail Lomba',
            'list' => ['Home', 'Lomba', 'Detail'],
        ];

        $page = (object) [
            'title' => 'Detail data Lomba',
        ];

        $activeMenu = 'lomba';

        return view('admin.lomba.detail', compact(
            'breadcrumb',
            'page',
            'activeMenu',
            'lomba'
        ));
    }

    public function getPengajuan()
    {
        $pengajuans = PengajuanLombaMahasiswa::with(['lomba.bidang', 'admin', 'mahasiswa'])
            ->get();

        $data = $pengajuans->map(function ($pengajuan) {
            $lomba = $pengajuan->lomba;

            $warnaTingkat = match ($lomba->tingkat) {
                'internasional' => 'bg-red-100 text-red-800',
                'nasional' => 'bg-blue-100 text-blue-800',
                'regional' => 'bg-green-100 text-green-800',
                'provinsi' => 'bg-yellow-100 text-yellow-800',
                default => '',
            };

            $warnaStatus = match ($pengajuan->status) {
                'pending' => 'bg-yellow-100 text-yellow-800',
                'approved' => 'bg-green-100 text-green-800',
                'rejected' => 'bg-red-100 text-red-800',
                default => '',
            };

            return [
                'id' => $pengajuan->id,
                'mahasiswa' => [
                    'id' => $pengajuan->mahasiswa->id,
                    'nama' => $pengajuan->mahasiswa->nama, // Asumsi ada kolom nama di tabel mahasiswa
                    'nim' => $pengajuan->mahasiswa->nim ?? null,
                ],
                'lomba_id' => $lomba->id,
                'judul' => $lomba->judul,
                'tempat' => $lomba->tempat,
                'tanggal_daftar' => $lomba->tanggal_daftar,
                'tanggal_daftar_terakhir' => $lomba->tanggal_daftar_terakhir,
                'periode_pendaftaran' => Carbon::parse($lomba->tanggal_daftar)->format('d M Y') . ' s.d. ' .
                Carbon::parse($lomba->tanggal_daftar_terakhir)->format('d M Y'),
                'link' => $lomba->url,
                'tingkat' => $lomba->tingkat,
                'tingkat_warna' => $warnaTingkat,
                'is_individu' => $lomba->is_individu ? 'Ya' : 'Tidak',
                'is_active' => $lomba->is_active ? 'Ya' : 'Tidak',
                'file_poster' => $lomba->file_poster,
                'is_akademik' => $lomba->is_akademik ? 'Ya' : 'Tidak',
                'status' => $pengajuan->status,
                'status_warna' => $warnaStatus,
                'notes' => $pengajuan->notes,
                'admin' => $pengajuan->admin ? [
                    'id' => $pengajuan->admin->id,
                    'nama' => $pengajuan->admin->nama,
                ] : null,
                'bidang' => $lomba->bidang->map(function ($b) {
                    return [
                        'id' => $b->id,
                        'kode' => $b->kode,
                        'nama' => $b->nama,
                    ];
                }),
            ];
        });

        return response()->json([
            'data' => $data,
        ]);
    }

    public function approvePengajuan($id, Request $request)
    {
        Log::info('=== APPROVE METHOD CALLED ===', [
            'method' => __METHOD__,
            'id' => $id,
            'request_data' => $request->all(),
            'url' => $request->url(),
            'route_name' => $request->route()->getName(),
        ]);

        // Cek autentikasi dan peran
        if (!Auth::guard('dosen')->check() || Auth::guard('dosen')->user()->role !== 'admin') {
            Log::warning('Unauthorized access attempt to approvePengajuan', [
                'user_id' => Auth::guard('dosen')->check() ? Auth::guard('dosen')->id() : null,
                'role' => Auth::guard('dosen')->check() ? Auth::guard('dosen')->user()->role : 'not authenticated',
                'pengajuan_id' => $id,
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Tidak diizinkan menyetujui pengajuan.',
            ], 403);
        }

        $pengajuan = PengajuanLombaMahasiswa::findOrFail($id);
        Log::info('Pengajuan before update', [
            'id' => $pengajuan->id,
            'current_status' => $pengajuan->status,
        ]);

        if ($pengajuan->status !== 'pending') {
            return response()->json(['error' => 'Pengajuan sudah diproses.'], 400);
        }

        $lomba = $pengajuan->lomba;
        $lomba->update(['is_active' => true]);

        $pengajuan->update([
            'status' => 'approved',
            'admin_id' => Auth::guard('dosen')->id(),
            'notes' => $request->input('notes'),
        ]);

        Log::info('Pengajuan after update', [
            'id' => $pengajuan->id,
            'new_status' => $pengajuan->fresh()->status, // Fresh data dari database
        ]);

        PengajuanLombaNote::create([
            'pengajuan_lomba_mahasiswa_id' => $pengajuan->id,
        ]);

        Log::info('Pengajuan disetujui', [
            'pengajuan_id' => $id,
            'admin_id' => Auth::guard('dosen')->id(),
        ]);

        return response()->json(['message' => 'Pengajuan berhasil disetujui.']);
    }

    public function rejectPengajuan($id, Request $request)
    {
        Log::info('=== REJECT METHOD CALLED ===', [
            'method' => __METHOD__,
            'id' => $id,
            'request_data' => $request->all(),
            'url' => $request->url(),
            'route_name' => $request->route()->getName(),
        ]);

        // Cek autentikasi dan peran
        if (!Auth::guard('dosen')->check() || Auth::guard('dosen')->user()->role !== 'admin') {
            Log::warning('Unauthorized access attempt to rejectPengajuan', [
                'user_id' => Auth::guard('dosen')->check() ? Auth::guard('dosen')->id() : null,
                'role' => Auth::guard('dosen')->check() ? Auth::guard('dosen')->user()->role : 'not authenticated',
                'pengajuan_id' => $id,
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Tidak diizinkan menolak pengajuan.',
            ], 403);
        }

        $pengajuan = PengajuanLombaMahasiswa::findOrFail($id);
        if ($pengajuan->status !== 'pending') {
            return response()->json(['error' => 'Pengajuan sudah diproses.'], 400);
        }

        $pengajuan->update([
            'status' => 'rejected',
            'admin_id' => Auth::guard('dosen')->id(),
            'notes' => $request->input('notes'),
        ]);

        PengajuanLombaNote::create([
            'pengajuan_lomba_mahasiswa_id' => $pengajuan->id,
        ]);

        Log::info('Pengajuan ditolak', [
            'pengajuan_id' => $id,
            'admin_id' => Auth::guard('dosen')->id(),
        ]);

        return response()->json(['message' => 'Pengajuan berhasil ditolak.']);
    }

    public function showPengajuan($id)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();

        $pengajuan = PengajuanLombaMahasiswa::with(['lomba.bidang', 'admin'])
            ->where('id', $id)
            ->first();

        if (!$pengajuan) {
            abort(404, 'Pengajuan lomba tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Detail Pengajuan Lomba',
            'list' => ['Home', 'Lomba', 'Pengajuan', 'Detail'],
        ];

        $page = (object) [
            'title' => 'Detail Pengajuan Lomba Anda',
        ];

        $activeMenu = 'lomba';

        return view('admin.lomba.detailpengajuan', compact(
            'breadcrumb',
            'page',
            'activeMenu',
            'pengajuan',
            'mahasiswa'
        ));
    }
}
