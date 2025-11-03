<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\PrestasiNote;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VerifikasiPrestasiController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Verifikasi Prestasi',
            'list' => ['Home', 'Verifikasi Prestasi'],
        ];

        $page = (object) [
            'title' => 'Daftar prestasi yang diajukan',
        ];

        $activeMenu = 'prestasi';

        if ($request->ajax()) {
            return view('prestasi.partial-index', compact('breadcrumb', 'page', 'activeMenu'));
        }

        return view('admin.prestasi.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function getData()
    {
        $prestasis = Prestasi::with(['dosens', 'mahasiswas'])
            ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'data' => $prestasis,
        ]);
    }

    public function approve(Request $request, $id)
    {
        if (!Auth::guard('dosen')->check() || Auth::guard('dosen')->user()->role !== 'admin') {
            Log::warning('Unauthorized access attempt', [
                'user_id' => Auth::guard('dosen')->check() ? Auth::guard('dosen')->id() : null,
                'role' => Auth::guard('dosen')->check() ? Auth::guard('dosen')->user()->role : 'not authenticated',
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Tidak diizinkan menyetujui prestasi.',
            ], 403);
        }

        try {
            $prestasi = Prestasi::findOrFail($id);
            $prestasi->update(['status' => 'disetujui']);

            // Default catatan jika tidak ada dari frontend
            $defaultNote = 'Selamat! Data prestasi Anda telah terverifikasi dan disetujui. Terus tingkatkan prestasi dan raih pencapaian yang lebih gemilang! 🎉';
            $approvalNote = $request->input('note', $defaultNote);

            $note = PrestasiNote::create([
                'prestasi_id' => $prestasi->id,
                'dosen_id' => Auth::guard('dosen')->id(),
                'status' => 'disetujui',
                'note' => $approvalNote, // Simpan catatan dari frontend
            ]);

            $mahasiswaList = DB::table('prestasi_mahasiswa')->where('prestasi_id', $prestasi->id)->get();

            foreach ($mahasiswaList as $mhs) {
                DB::table('mahasiswa_prestasi_notes')->insert([
                    'mahasiswa_id' => $mhs->mahasiswa_id,
                    'prestasi_notes_id' => $note->id,
                    'is_accepted' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            Log::info('Prestasi approved', [
                'prestasi_id' => $prestasi->id,
                'note' => $approvalNote,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Prestasi berhasil disetujui.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error approving prestasi', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyetujui prestasi.',
            ], 500);
        }
    }

    public function reject(Request $request, $id)
    {
        if (!Auth::guard('dosen')->check() || Auth::guard('dosen')->user()->role !== 'admin') {
            return response()->json([
                'success' => false,
                'message' => 'Tidak diizinkan menolak prestasi.',
            ], 403);
        }

        $request->validate([
            'note' => 'required|string|max:1000',
        ]);

        try {
            $prestasi = Prestasi::findOrFail($id);
            $prestasi->update(['status' => 'ditolak']);

            $note = PrestasiNote::create([
                'prestasi_id' => $prestasi->id,
                'dosen_id' => Auth::guard('dosen')->id(),
                'status' => 'ditolak',
                'note' => $request->input('note'),
            ]);

            $mahasiswaList = DB::table('prestasi_mahasiswa')->where('prestasi_id', $prestasi->id)->get();

            foreach ($mahasiswaList as $mhs) {
                DB::table('mahasiswa_prestasi_notes')->insert([
                    'mahasiswa_id' => $mhs->mahasiswa_id,
                    'prestasi_notes_id' => $note->id,
                    'is_accepted' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            Log::info('Prestasi rejected', [
                'prestasi_id' => $prestasi->id,
                'note' => $request->input('note'),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Prestasi berhasil ditolak.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error rejecting prestasi', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menolak prestasi.',
            ], 500);
        }
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Prestasi',
            'list' => ['Home', 'Prestasi', 'Detail'],
        ];

        $page = (object) [
            'title' => 'Detail Prestasi',
        ];

        $activeMenu = 'prestasi';

        $prestasi = Prestasi::with(['dosens', 'mahasiswas', 'notes'])->findOrFail($id);

        if (!auth()->guard('dosen')->check()) {
            abort(403, 'Tidak diizinkan mengakses data ini.');
        }

        return view('admin.prestasi.detail', compact('breadcrumb', 'page', 'activeMenu', 'prestasi'));
    }

    public function export()
    {
        $prestasis = Prestasi::with(['dosens', 'mahasiswas.programStudi', 'bidangs.lomba'])
            ->where('status', 'disetujui')
            ->get();
        $pdf = Pdf::loadView('admin.prestasi.export', compact('prestasis'))->setPaper('a4', 'landscape');
        return $pdf->download('daftar-prestasi-disetujui.pdf');
    }
}
