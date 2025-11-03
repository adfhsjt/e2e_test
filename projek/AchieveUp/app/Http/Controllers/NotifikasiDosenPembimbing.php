<?php

namespace App\Http\Controllers;

use App\Models\DosenPembimbingRekomendasi;
use App\Models\MahasiswaRekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Dosen;
use App\Models\Lomba;
use App\Models\Mahasiswa;

use App\Models\RekomendasiLomba;

class NotifikasiDosenPembimbing extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Semua Notifikasi Dosen',
            'list' => ['Notifikasi']
        ];

        $page = (object)[
            'title' => 'Semua Notifikasi Dosen'
        ];

        $activeMenu = '';

        $pesan = $this->getAllRekomendasi();

        return view('dosen.notifikasi.index', compact('breadcrumb', 'page', 'activeMenu', 'pesan'));
    }

    public function show($id)
    {
        // Ambil data dosen pembimbing rekomendasi berdasarkan ID
        $dosenRekom = DosenPembimbingRekomendasi::with('dosen')->findOrFail($id);

        // Ambil data rekomendasi lomba beserta lomba dan bidangnya
        $rekomendasi = RekomendasiLomba::with('lomba.bidang')
            ->where('id', $dosenRekom->rekomendasi_lomba_id)
            ->first();

        if (!$rekomendasi) {
            abort(404, 'Rekomendasi lomba tidak ditemukan atau lomba tidak aktif.');
        }

        // Ambil semua mahasiswa yang ikut pada rekomendasi lomba ini
        $mahasiswa = MahasiswaRekomendasi::with('mahasiswa')
            ->where('rekomendasi_lomba_id', $rekomendasi->id)
            ->get();

        // Ambil semua dosen pembimbing yang terkait
        $dosen = DosenPembimbingRekomendasi::with('dosen')
            ->where('rekomendasi_lomba_id', $rekomendasi->id)
            ->get();

        $breadcrumb = (object)[
            'title' => 'Detail Notifikasi',
            'list' => ['Notifikasi', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Notifikasi'
        ];

        $activeMenu = '';

        return view('dosen.notifikasi.detail', compact(
            'breadcrumb',
            'page',
            'activeMenu',
            'rekomendasi',
            'mahasiswa',
            'dosen',
            'dosenRekom'
        ));
    }


    public function getAllRekomendasi()
    {
        $dosenId = auth('dosen')->id();

        // Ambil semua rekomendasi untuk dosen
        $rekomendasi = DosenPembimbingRekomendasi::with(['rekomendasiLomba.lomba.bidang'])
            ->where('dosen_id', $dosenId)
            ->latest()
            ->get()
            ->map(function ($item) {
                $rekom = $item->rekomendasiLomba;
                $lomba = $rekom ? $rekom->lomba : null;

                $isAccepted = $item->is_accepted;
                $pesan = $isAccepted == 0 ? 'Rekomendasi Lomba Terbaru' : 'Rekomendasi Lomba';

                return [
                    'id' => $item->id,
                    'rekomendasi_id' => $rekom->id ?? null,
                    'lomba_id' => $lomba->id ?? null,
                    'judul' => $lomba->judul ?? '-',
                    'tempat' => $lomba->tempat ?? '-',
                    'periode_pendaftaran' => $lomba
                        ? (Carbon::parse($lomba->tanggal_daftar)->format('d M Y') . ' s.d. ' . Carbon::parse($lomba->tanggal_daftar_terakhir)->format('d M Y'))
                        : '-',
                    'tingkat' => $lomba->tingkat ?? '-',
                    'bidang' => $lomba && $lomba->bidang
                        ? $lomba->bidang->map(function ($b) {
                            return [
                                'id' => $b->id,
                                'kode' => $b->kode,
                                'nama' => $b->nama
                            ];
                        })->values()
                        : [],
                    'pesan' => $pesan,
                    'note' => $item->note,
                    'is_accepted' => $isAccepted,
                    'created_at' => $item->created_at ? $item->created_at->format('d-m-Y H:i') : null,
                    'status' => $lomba && $lomba->is_active ? 'Aktif' : 'Tidak Aktif',
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $rekomendasi
        ]);
    }

    public function markAsRead(Request $request)
    {
        $id = $request->input('id');
        $dosenId = auth('dosen')->id();

        $notif = DosenPembimbingRekomendasi::where('id', $id)
            ->where('dosen_id', $dosenId)
            ->first();

        if (!$notif) {
            return response()->json([
                'success' => false,
                'message' => 'Notifikasi tidak ditemukan.'
            ], 404);
        }

        if (!$notif->is_accepted) {
            $notif->is_accepted = true;
            $notif->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Notifikasi telah ditandai sebagai dibaca.'
        ]);
    }

    public function markAllAsRead()
    {
        $dosenId = auth('dosen')->id();

        $updated = DosenPembimbingRekomendasi::where('dosen_id', $dosenId)
            ->where('is_accepted', false)
            ->update(['is_accepted' => true]);

        return response()->json([
            'success' => true,
            'updated_count' => $updated,
            'message' => 'Semua notifikasi telah ditandai sebagai dibaca.'
        ]);
    }

    public function destroy($id)
    {
        $dosenId = auth('dosen')->id();

        $notif = DosenPembimbingRekomendasi::where('id', $id)
            ->where('dosen_id', $dosenId)
            ->first();

        if (!$notif) {
            return response()->json([
                'success' => false,
                'message' => 'Notifikasi tidak ditemukan.'
            ], 404);
        }

        try {
            $notif->delete();
            return response()->json([
                'success' => true,
                'message' => 'Notifikasi berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus notifikasi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyIsAcceptedMessage()
    {
        $dosenId = auth('dosen')->id();

        $deleted = DosenPembimbingRekomendasi::where('dosen_id', $dosenId)
            ->where('is_accepted', true)
            ->delete();

        return response()->json([
            'success' => true,
            'deleted_count' => $deleted,
            'message' => 'Semua notifikasi yang sudah dibaca berhasil dihapus.'
        ]);
    }
}
