<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;

class DashboardMahasiswa extends Controller
{
    public function index()
    {
        $mahasiswaId = auth()->guard('mahasiswa')->id();

        if (!$mahasiswaId) {
            return redirect()->route('mahasiswa.login');
        }

        $prestasiTerakhir = Prestasi::whereHas('mahasiswas', function ($query) use ($mahasiswaId) {
            $query->where('mahasiswa_id', $mahasiswaId);
        })
            ->with(['dosens'])
            ->orderBy('tanggal_pengajuan', 'desc')
            ->take(5)
            ->get();

        $totalPrestasiDiajukan = Prestasi::whereHas('mahasiswas', function ($query) use ($mahasiswaId) {
            $query->where('mahasiswa_id', $mahasiswaId);
        })
            ->count();

        $totalPrestasiDisetujui = Prestasi::whereHas('mahasiswas', function ($query) use ($mahasiswaId) {
            $query->where('mahasiswa_id', $mahasiswaId);
        })
            ->where('status', 'disetujui')
            ->count();

        $totalPrestasiDitolak = Prestasi::whereHas('mahasiswas', function ($query) use ($mahasiswaId) {
            $query->where('mahasiswa_id', $mahasiswaId);
        })
            ->where('status', 'ditolak')
            ->count();

        $mahasiswa = auth()->guard('mahasiswa')->user();

        $breadcrumb = (object) [
            'title' => 'Dashboard Mahasiswa',
            'list' => ['Home', 'Dashboard'],
        ];

        $page = (object) [
            'title' => 'Selamat Datang di Dashboard',
        ];

        $activeMenu = 'dashboard';

        return view('mahasiswa.dashboard.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'prestasiTerakhir' => $prestasiTerakhir,
            'totalPrestasiDiajukan' => $totalPrestasiDiajukan,
            'totalPrestasiDisetujui' => $totalPrestasiDisetujui,
            'totalPrestasiDitolak' => $totalPrestasiDitolak,
            'mahasiswa' => $mahasiswa,
        ]);
    }
}
