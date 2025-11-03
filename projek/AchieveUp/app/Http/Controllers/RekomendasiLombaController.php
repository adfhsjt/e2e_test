<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\DosenPembimbingRekomendasi;
use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Mahasiswa;
use App\Models\MahasiswaRekomendasi;
use App\Models\RekomendasiLomba;
use App\Services\Aras;
use App\Services\Electre;
use App\Services\Entrophy;
use Illuminate\Support\Carbon;

class RekomendasiLombaController extends Controller
{
    protected $aras, $electre, $entrophy;

    public function __construct(Aras $aras, Electre $electre, Entrophy $entrophy)
    {
        $this->aras = $aras;
        $this->electre = $electre;
        $this->entrophy = $entrophy;
    }

    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Rekomendasi Lomba',
            'list' => ['Rekomendasi', 'Daftar Lomba Aktif']
        ];

        $page = (object)[
            'title' => 'Daftar Lomba Aktif untuk Direkomendasikan'
        ];

        $activeMenu = 'rekomendasi';

        $lombaAktif = Lomba::with('bidang')
            ->where('is_active', true)
            ->get();

        $rankAras = $this->aras->getRanking();
        $rankElectre = $this->electre->getRanking();

        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::where('role', 'dosen_pembimbing')->get();

        return view('admin.rekomendasi.index', compact('breadcrumb', 'page', 'activeMenu', 'lombaAktif', 'rankAras', 'rankElectre', 'mahasiswa', 'dosen'));
    }

    public function create($id)
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Rekomendasi',
            'list' => ['Home', 'Daftar Lomba Aktif', 'Buat Rekomendasi']
        ];

        $page = (object)[
            'title' => 'Tambah Rekomendasi'
        ];

        $activeMenu = 'rekomendasi';

        $lomba = Lomba::with('bidang')->find($id);

        $rankAras = $this->aras->getRanking();
        $rankElectre = $this->electre->getRanking();

        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::where('role', 'dosen pembimbing')->get();

        return view('admin.rekomendasi.create', compact('breadcrumb', 'page', 'activeMenu', 'lomba', 'rankAras', 'rankElectre', 'mahasiswa', 'dosen'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lomba_id' => 'required|exists:lomba,id',
            'mahasiswa_id' => 'required|array|min:1',
            'mahasiswa_id.*' => 'exists:mahasiswa,id',
            'dosen_id' => 'required|array|min:1',
            'dosen_id.*' => 'exists:dosen,id',
        ]);

        $rekomendasi = RekomendasiLomba::create([
            'lomba_id' => $validated['lomba_id']
        ]);

        foreach ($validated['mahasiswa_id'] as $mhs_id) {
            MahasiswaRekomendasi::create([
                'rekomendasi_lomba_id' => $rekomendasi->id,
                'mahasiswa_id' => $mhs_id,
                'note' => 'Anda mendapatkan rekomendasi untuk mengikuti Lomba : ' . $rekomendasi->lomba->judul,
            ]);
        }

        foreach ($validated['dosen_id'] as $dsn_id) {
            DosenPembimbingRekomendasi::create([
                'rekomendasi_lomba_id' => $rekomendasi->id,
                'dosen_id' => $dsn_id,
                'note' => 'Anda mendapatkan rekomendasi untuk menjadi Dosen Pembimbing dalam Lomba ' . $rekomendasi->lomba->judul,
            ]);
        }

        return redirect()->route('admin.rekomendasi.index')->with('success', 'Rekomendasi berhasil disimpan.');
    }

    public function list()
    {
        $breadcrumb = (object)[
            'title' => 'List Rekomendasi',
            'list' => ['Rekomendasi', 'Daftar Lomba Aktif', 'List']
        ];

        $page = (object)[
            'title' => 'List Rekomendasi'
        ];

        $activeMenu = 'rekomendasi';

        return view('admin.rekomendasi.list', compact('breadcrumb', 'page', 'activeMenu'));
    }
    public function getAll()
    {
        $rekomendasi = RekomendasiLomba::with('lomba.bidang')
            ->whereHas('lomba', function ($q) {
                $q->where('is_active', true);
            })
            ->get();

        $data = $rekomendasi->map(function ($item) {
            $lomba = $item->lomba;

            if (!$lomba) {
                return [
                    'id' => $item->id,
                    'judul' => '-',
                    'tempat' => '-',
                    'tanggal_daftar' => '-',
                    'tanggal_daftar_terakhir' => '-',
                    'periode_pendaftaran' => '-',
                    'link' => '-',
                    'tingkat' => '-',
                    'tingkat_warna' => '',
                    'is_individu' => '-',
                    'is_active' => '-',
                    'file_poster' => null,
                    'is_akademik' => '-',
                    'bidang' => [],
                ];
            }

            $warnaTingkat = match ($lomba->tingkat) {
                'internasional' => 'bg-red-100 text-red-800',
                'nasional'      => 'bg-blue-100 text-blue-800',
                'regional'      => 'bg-green-100 text-green-800',
                'provinsi'      => 'bg-yellow-100 text-yellow-800',
                default         => '',
            };

            return [
                'id' => $item->id,
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
                })->values(),
            ];
        });

        return response()->json($data);
    }

    public function show($id)
    {
        $rekomendasi = RekomendasiLomba::with('lomba.bidang')
            ->where('id', $id)
            ->first();

        $mahasiswa = MahasiswaRekomendasi::with('mahasiswa')
            ->where('rekomendasi_lomba_id', $rekomendasi->id)
            ->get();

        $dosen = DosenPembimbingRekomendasi::with('dosen')
            ->where('rekomendasi_lomba_id', $rekomendasi->id)
            ->get();


        $breadcrumb = (object) [
            'title' => 'Detail Rekomendasi',
            'list' => ['Rekomendasi', 'Daftar Lomba Aktif', 'List']
        ];

        $page = (object) [
            'title' => 'Detail data Rekomendasi'
        ];

        $activeMenu = 'rekomendasi';

        return view('admin.rekomendasi.detail', compact(
            'breadcrumb',
            'page',
            'activeMenu',
            'rekomendasi',
            'mahasiswa',
            'dosen'
        ));
    }

    public function destroy($id)
    {
        try {
            $rekomendasi = RekomendasiLomba::findOrFail($id);

            MahasiswaRekomendasi::where('rekomendasi_lomba_id', $rekomendasi->id)->delete();

            DosenPembimbingRekomendasi::where('rekomendasi_lomba_id', $rekomendasi->id)->delete();

            $rekomendasi->delete();

            return response()->json([
                'success' => true,
                'message' => 'Rekomendasi lomba berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus rekomendasi lomba: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showlomba($id)
    {
        $lomba = $this->getLomba($id);
        $breadcrumb = (object) [
            'title' => 'Detail Lomba',
            'list' => ['Home', 'Lomba', 'Detail'],
        ];

        $page = (object) [
            'title' => 'Detail data Lomba',
        ];

        $activeMenu = 'lomba';

        return view('admin.rekomendasi.detaillomba', compact(
            'breadcrumb',
            'page',
            'activeMenu',
            'lomba'
        ));
    }
}
