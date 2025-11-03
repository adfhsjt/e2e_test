<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\DosenPembimbingRekomendasi;
use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Mahasiswa;
use App\Models\MahasiswaPrestasiNote;
use App\Models\MahasiswaRekomendasi;
use App\Models\PengajuanLombaNote;
use App\Models\RekomendasiLomba;
use App\Services\Aras;
use App\Services\Electre;
use App\Services\Entrophy;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\FacadesDB;

class NotifikasiMahasiswa extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Semua Notifikasi',
            'list' => ['Notifikasi']
        ];

        $page = (object)[
            'title' => 'Semua Notifikasi'
        ];

        $activeMenu = '';

        $pesan = $this->getAllNotifikasi();

        return view('mahasiswa.notifikasi.index', compact('breadcrumb', 'page', 'activeMenu', 'pesan'));
    }

    public function show($type, $id)
    {
        $mahasiswaId = auth('mahasiswa')->id();

        if ($type === 'rekomendasi') {
            $mahasiswaRekom = MahasiswaRekomendasi::with('mahasiswa')
                ->where('id', $id)
                ->where('mahasiswa_id', $mahasiswaId)
                ->firstOrFail();

            $rekomendasi = RekomendasiLomba::with('lomba.bidang')
                ->where('id', $mahasiswaRekom->rekomendasi_lomba_id)
                ->firstOrFail();

            $mahasiswa = MahasiswaRekomendasi::with('mahasiswa')
                ->where('rekomendasi_lomba_id', $rekomendasi->id)
                ->get();

            $dosen = DosenPembimbingRekomendasi::with('dosen')
                ->where('rekomendasi_lomba_id', $rekomendasi->id)
                ->get();

            return view('mahasiswa.notifikasi.detail', [
                'breadcrumb' => (object)['title' => 'Detail Notifikasi', 'list' => ['Notifikasi', 'Rekomendasi']],
                'page' => (object)['title' => 'Detail Notifikasi Rekomendasi'],
                'activeMenu' => '',
                'rekomendasi' => $rekomendasi,
                'mahasiswa' => $mahasiswa,
                'dosen' => $dosen,
                'mahasiswaRekom' => $mahasiswaRekom
            ]);
        }

        if ($type === 'verifikasi') {
            $note = DB::table('mahasiswa_prestasi_notes')
                ->join('prestasi_notes', 'mahasiswa_prestasi_notes.prestasi_notes_id', '=', 'prestasi_notes.id')
                ->join('prestasi', 'prestasi_notes.prestasi_id', '=', 'prestasi.id')
                ->where('mahasiswa_prestasi_notes.mahasiswa_id', $mahasiswaId)
                ->where('mahasiswa_prestasi_notes.id', $id)
                ->select(
                    'mahasiswa_prestasi_notes.id',
                    'prestasi.judul',
                    'prestasi.id as prestasi_id',
                    // 'prestasi.deskripsi',
                    'prestasi_notes.status',
                    'prestasi_notes.note',
                    'prestasi_notes.created_at',
                    'mahasiswa_prestasi_notes.is_accepted'
                )
                ->first();


            if (!$note) {
                abort(404, 'Notifikasi verifikasi tidak ditemukan.');
            }

            return view('mahasiswa.notifikasi.detail', [
                'breadcrumb' => (object)['title' => 'Detail Notifikasi', 'list' => ['Notifikasi', 'Verifikasi']],
                'page' => (object)['title' => 'Detail Notifikasi Verifikasi'],
                'activeMenu' => '',
                'note' => $note
            ]);
        }

        if ($type === 'pengajuan_lomba') {
            $note = PengajuanLombaNote::with(['pengajuanLombaMahasiswa.lomba'])
                ->where('id', $id)
                ->whereHas('pengajuanLombaMahasiswa', function ($q) use ($mahasiswaId) {
                    $q->where('mahasiswa_id', $mahasiswaId);
                })
                ->first();

            if (!$note) {
                abort(404, 'Notifikasi pengajuan lomba tidak ditemukan.');
            }

            $lomba = optional(optional($note->pengajuanLombaMahasiswa)->lomba);
            $pengajuan = $note->pengajuanLombaMahasiswa;

            return view('mahasiswa.notifikasi.detail', [
                'breadcrumb' => (object)['title' => 'Detail Notifikasi', 'list' => ['Notifikasi', 'Pengajuan Lomba']],
                'page' => (object)['title' => 'Detail Notifikasi Pengajuan Lomba'],
                'activeMenu' => '',
                'pengajuanLomba' => $note,
                'lomba' => $lomba,
                'pengajuan' => $pengajuan,
            ]);
        }

        abort(404, 'Tipe notifikasi tidak valid.');
    }



    public function getAllNotifikasi()
    {
        $mahasiswaId = auth('mahasiswa')->id();

        // Ambil notifikasi rekomendasi
        $rekomendasi = MahasiswaRekomendasi::with('rekomendasiLomba.lomba.bidang')
            ->where('mahasiswa_id', $mahasiswaId)
            ->get()
            ->map(function ($item) {
                $lomba = optional($item->rekomendasiLomba)->lomba;
                return [
                    'id' => $item->id,
                    'type' => 'rekomendasi',
                    'judul' => $lomba->judul ?? '-',
                    'deskripsi' => 'Rekomendasi lomba: ' . ($lomba->judul ?? '-'),
                    'created_at' => $item->created_at,
                    'is_accepted' => $item->is_accepted,
                ];
            });

        $prestasi = DB::table('mahasiswa_prestasi_notes')
            ->join('prestasi_notes', 'mahasiswa_prestasi_notes.prestasi_notes_id', '=', 'prestasi_notes.id')
            ->join('prestasi', 'prestasi_notes.prestasi_id', '=', 'prestasi.id')
            ->where('mahasiswa_prestasi_notes.mahasiswa_id', $mahasiswaId)
            ->select(
                'mahasiswa_prestasi_notes.id',
                'mahasiswa_prestasi_notes.is_accepted',
                'prestasi.id as prestasi_id',
                'prestasi.judul as judul',
                'prestasi_notes.status',
                'prestasi_notes.note',
                'prestasi_notes.created_at as created_at'
            )
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'type' => 'verifikasi',
                    'judul' => $item->judul,
                    'prestasi_id' => $item->prestasi_id,
                    'status' => $item->status,
                    'deskripsi' => 'Prestasi ' . $item->status . ($item->note ? ': ' . $item->note : ''),
                    'created_at' => $item->created_at,
                    'is_accepted' => $item->is_accepted,
                ];
            });

        $pengajuanLomba = PengajuanLombaNote::with(['pengajuanLombaMahasiswa.lomba'])
            ->whereHas('pengajuanLombaMahasiswa', function ($q) use ($mahasiswaId) {
                $q->where('mahasiswa_id', $mahasiswaId);
            })
            ->get()
            ->map(function ($item) {
                $lomba = optional(optional($item->pengajuanLombaMahasiswa)->lomba);
                $pengajuan = $item->pengajuanLombaMahasiswa;
                return [
                    'id' => $item->id,
                    'type' => 'pengajuan_lomba',
                    'judul' => $lomba->judul ?? '-',
                    'status' => $pengajuan->status,
                    'note' => $pengajuan->note,
                    'deskripsi' => 'Pengajuan lomba: ' . ($lomba->judul ?? '-'),
                    'created_at' => $item->created_at,
                    'is_accepted' => $item->is_accepted,
                ];
            });

        $notifikasi = $rekomendasi->concat($prestasi)->concat($pengajuanLomba)
            ->sortByDesc(function ($item) {
                return strtotime($item['created_at']);
            })
            ->values()
            ->map(function ($item) {
                $item['created_at'] = Carbon::parse($item['created_at'])->diffForHumans();
                return $item;
            });

            // dd($notifikasi);

        // dd($notifikasi);
        return response()->json([
            'success' => true,
            'data' => $notifikasi
        ]);
    }


    public function markAsRead(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');
        $mahasiswaId = auth('mahasiswa')->id();

        if ($type === 'rekomendasi') {
            $notif = MahasiswaRekomendasi::where('id', $id)->where('mahasiswa_id', $mahasiswaId)->first();
            if ($notif && !$notif->is_accepted) {
                $notif->is_accepted = true;
                $notif->save();
            }
        } elseif ($type === 'verifikasi') {
            $notif = MahasiswaPrestasiNote::where('id', $id)->where('mahasiswa_id', $mahasiswaId)->first();
            if ($notif && !$notif->is_accepted) {
                $notif->is_accepted = true;
                $notif->save();
            }
        } elseif ($type === 'pengajuan_lomba') {
            $notif = PengajuanLombaNote::where('id', $id)
                ->whereHas('pengajuanLombaMahasiswa', function ($q) use ($mahasiswaId) {
                    $q->where('mahasiswa_id', $mahasiswaId);
                })
                ->first();
            if ($notif && !$notif->is_accepted) {
                $notif->is_accepted = true;
                $notif->save();
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Tipe notifikasi tidak valid.'], 400);
        }

        if (!$notif) {
            return response()->json(['success' => false, 'message' => 'Notifikasi tidak ditemukan.'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Notifikasi ditandai sebagai dibaca.']);
    }


    public function markAllAsRead()
    {
        $mahasiswaId = auth('mahasiswa')->id();

        $countRekom = MahasiswaRekomendasi::where('mahasiswa_id', $mahasiswaId)
            ->where('is_accepted', false)
            ->update(['is_accepted' => true]);

        $countPrestasi = MahasiswaPrestasiNote::where('mahasiswa_id', $mahasiswaId)
            ->where('is_accepted', false)
            ->update(['is_accepted' => true]);

        $countPengajuan = PengajuanLombaNote::whereHas('pengajuanLombaMahasiswa', function ($q) use ($mahasiswaId) {
            $q->where('mahasiswa_id', $mahasiswaId);
        })
            ->where('is_accepted', false)
            ->update(['is_accepted' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Semua notifikasi ditandai sebagai dibaca.',
            'rekomendasi_updated' => $countRekom,
            'verifikasi_updated' => $countPrestasi,
            'pengajuan_lomba_updated' => $countPengajuan,
        ]);
    }


    public function destroy(Request $request, $type, $id)
    {
        $mahasiswaId = auth('mahasiswa')->id();

        if ($type === 'rekomendasi') {
            $deleted = MahasiswaRekomendasi::where('id', $id)->where('mahasiswa_id', $mahasiswaId)->delete();
        } elseif ($type === 'verifikasi') {
            $deleted = MahasiswaPrestasiNote::where('id', $id)->where('mahasiswa_id', $mahasiswaId)->delete();
        } elseif ($type === 'pengajuan_lomba') {
            $deleted = PengajuanLombaNote::where('id', $id)
                ->whereHas('pengajuanLombaMahasiswa', function ($q) use ($mahasiswaId) {
                    $q->where('mahasiswa_id', $mahasiswaId);
                })
                ->delete();
        } else {
            return response()->json(['success' => false, 'message' => 'Tipe tidak valid.'], 400);
        }

        return response()->json([
            'success' => $deleted > 0,
            'message' => $deleted ? 'Notifikasi berhasil dihapus.' : 'Notifikasi tidak ditemukan.'
        ]);
    }



    public function destroyIsAccpeptedMessege()
    {
        $mahasiswaId = auth('mahasiswa')->id();

        // Hapus rekomendasi yang sudah dibaca
        $delRekom = MahasiswaRekomendasi::where('mahasiswa_id', $mahasiswaId)
            ->where('is_accepted', true)
            ->delete();

        // Hapus verifikasi yang sudah dibaca
        $delPrestasi = MahasiswaPrestasiNote::where('mahasiswa_id', $mahasiswaId)
            ->where('is_accepted', true)
            ->delete();

        // Hapus pengajuan lomba yang sudah dibaca
        $delPengajuan = PengajuanLombaNote::where('is_accepted', true)
            ->whereHas('pengajuanLombaMahasiswa', function ($q) use ($mahasiswaId) {
                $q->where('mahasiswa_id', $mahasiswaId);
            })
            ->delete();

        return response()->json([
            'success' => true,
            'deleted_rekomendasi' => $delRekom,
            'deleted_verifikasi' => $delPrestasi,
            'deleted_pengajuan_lomba' => $delPengajuan,
            'message' => 'Semua notifikasi yang sudah dibaca telah dihapus.'
        ]);
    }
}
