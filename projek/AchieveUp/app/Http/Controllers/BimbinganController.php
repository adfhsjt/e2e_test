<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    public function index() {
        $user = Auth::guard('dosen')->user();
        $dosenId = $user->id;

        $mahasiswaBimbingan = DB::table('pembimbing_prestasi')
            ->join('prestasi', 'pembimbing_prestasi.prestasi_id', '=', 'prestasi.id')
            ->join('prestasi_mahasiswa', 'prestasi.id', '=', 'prestasi_mahasiswa.prestasi_id')
            ->join('mahasiswa', 'prestasi_mahasiswa.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('program_studi', 'mahasiswa.program_studi_id', '=', 'program_studi.id')
            ->where('pembimbing_prestasi.dosen_id', $dosenId)
            ->select(
                'mahasiswa.id',
                'mahasiswa.nim',
                'mahasiswa.nama',
                'mahasiswa.username',
                'mahasiswa.email',
                'program_studi.nama as program_studi'
            )
            ->distinct()
            ->get();

        $breadcrumb = (object)[
            'title' => 'Daftar Bimbingan',
            'list' => ['Home', 'Bimbingan']
        ];

        $page = (object)[
            'title' => 'Daftar Mahasiswa Bimbingan'
        ];

        $activeMenu = 'bimbingan';

        return view('dosen.bimbingan.index', compact('mahasiswaBimbingan', 'breadcrumb', 'page', 'activeMenu'));
    }
    public function detail($id)
    {
        $mahasiswa = DB::table('mahasiswa')
            ->join('program_studi', 'mahasiswa.program_studi_id', '=', 'program_studi.id')
            ->where('mahasiswa.id', $id)
            ->select(
                'mahasiswa.*',
                'program_studi.nama as program_studi'
            )
            ->first();

        $prestasi = DB::table('prestasi_mahasiswa')
            ->join('prestasi', 'prestasi_mahasiswa.prestasi_id', '=', 'prestasi.id')
            ->where('prestasi_mahasiswa.mahasiswa_id', $id)
            ->select(
                'prestasi.judul',
                'prestasi.tempat',
                'prestasi.tanggal_mulai',
                'prestasi.tingkat',
                'prestasi.juara'
            )
            ->get();

        $breadcrumb = (object)[
            'title' => 'Detail Mahasiswa',
            'list' => ['Home', 'Bimbingan', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Mahasiswa'
        ];

        $activeMenu = 'bimbingan';

        return view('dosen.bimbingan.detail', compact('mahasiswa', 'prestasi', 'breadcrumb', 'page', 'activeMenu'));
    }
}
