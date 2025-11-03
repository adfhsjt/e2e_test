@extends('mahasiswa.layouts.app')

@section('title', 'Detail Prestasi')

@section('content')
    <div class="max-w-[1280px] mx-auto my-8 px-4 md:px-8">
        <div class="grid grid-cols-12 gap-6 lg:gap-8">
            <!-- Main Content -->
            <div class="col-span-12 lg:col-span-8">
                <div
                    class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <!-- Header -->
                    <div
                        class="flex flex-col md:flex-row md:justify-between md:items-center border-b border-gray-200 p-6 pb-5">
                        <h1 class="text-2xl font-semibold text-gray-800 mb-2 md:mb-0">Detail Prestasi</h1>
                        <div class="flex items-center">
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-sm font-medium capitalize
                                {{ $prestasi->status === 'disetujui'
                                    ? 'bg-green-100 text-green-800'
                                    : ($prestasi->status === 'pending'
                                        ? 'bg-yellow-100 text-yellow-800'
                                        : ($prestasi->status === 'ditolak'
                                            ? 'bg-red-100 text-red-800'
                                            : 'bg-gray-100 text-gray-800')) }}">

                                @php
                                    $icon = '';
                                    if ($prestasi->status === 'disetujui') {
                                        $icon = 'fas fa-check-circle';
                                    } elseif ($prestasi->status === 'pending') {
                                        $icon = 'fas fa-hourglass-half';
                                    } elseif ($prestasi->status === 'ditolak') {
                                        $icon = 'fas fa-times-circle';
                                    } else {
                                        $icon = 'fas fa-question-circle';
                                    }
                                @endphp

                                <i class="{{ $icon }}"></i>
                                {{ ucfirst($prestasi->status) }}
                            </span>
                        </div>
                    </div>

                    <!-- Achievement Details -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-y-6 gap-x-8">
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Judul</p>
                                <p class="text-gray-900 font-semibold">{{ $prestasi->judul }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Tempat</p>
                                <p class="text-gray-900 font-semibold">{{ $prestasi->tempat }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Tanggal Pengajuan</p>
                                <p class="text-gray-900 font-semibold">{{ $prestasi->tanggal_pengajuan }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Tanggal Mulai</p>
                                <p class="text-gray-900 font-semibold">{{ $prestasi->tanggal_mulai }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Tanggal Selesai</p>
                                <p class="text-gray-900 font-semibold">{{ $prestasi->tanggal_selesai }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Tingkat</p>
                                <p class="text-gray-900 font-semibold capitalize">{{ $prestasi->tingkat }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Juara</p>
                                <p class="text-gray-900 font-semibold">{{ $prestasi->juara }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Jenis Peserta</p>
                                <p class="text-gray-900 font-semibold">
                                    {{ $prestasi->is_individu ? 'Individu' : 'Kelompok' }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Jenis Prestasi</p>
                                <p class="text-gray-900 font-semibold">
                                    {{ $prestasi->is_akademik ? 'Akademik' : 'Non Akademik' }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">URL</p>
                                @if ($prestasi->url)
                                    <a href="{{ $prestasi->url }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-800 font-semibold hover:underline break-all">
                                        {{ $prestasi->url }}
                                    </a>
                                @else
                                    <p class="text-gray-500">-</p>
                                @endif
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Nomor Surat Tugas</p>
                                <p class="text-gray-900 font-semibold">{{ $prestasi->nomor_surat_tugas }}</p>
                            </div>
                        </div>
                    </div>

                    <hr class="border-t border-gray-200">

                    <!-- Achievement Files -->
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            File Berkas
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- File Surat Tugas -->
                            <div
                                class="bg-gray-50 rounded-xl shadow-sm border border-gray-200 transition-all hover:border-primary hover:shadow">
                                <div class="flex items-center justify-between p-4">
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="flex items-center justify-center w-10 h-10 bg-red-50 text-red-600 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M6 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6H6zm7 1.5V9h5.5L13 3.5zM6 4h6v5a1 1 0 0 0 1 1h5v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4zm2 7v6h2v-2h1a2 2 0 0 0 0-4H8zm2 2h1a1 1 0 1 1 0 2h-1v-2z" />
                                            </svg>
                                        </span>
                                        <div>
                                            <span class="text-gray-800 font-medium block">Surat Tugas</span>
                                            <span class="text-xs text-gray-500">Dokumen wajib</span>
                                        </div>
                                    </div>
                                    <a href="{{ asset('storage/' . $prestasi->file_surat_tugas) }}" target="_blank"
                                        class="inline-flex items-center gap-1 text-sm font-medium px-3 py-1.5 rounded-lg border border-primary text-primary hover:bg-primary hover:text-white transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat
                                    </a>
                                </div>
                            </div>

                            <!-- File Sertifikat -->
                            <div
                                class="bg-gray-50 rounded-xl shadow-sm border border-gray-200 transition-all hover:border-primary hover:shadow">
                                <div class="flex items-center justify-between p-4">
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="flex items-center justify-center w-10 h-10 bg-green-50 text-green-600 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M13 3v11l5-2.363L23 14V3h-3v8.649L18 11l-2 .649V3zm11-1v14a1 1 0 0 1-1.406.921L17 14.618l-5.594 2.303A1 1 0 0 1 10 16V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-20 2h3v2H4v14h14v-2h2v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" />
                                            </svg>
                                        </span>
                                        <div>
                                            <span class="text-gray-800 font-medium block">Sertifikat</span>
                                            <span class="text-xs text-gray-500">Bukti prestasi</span>
                                        </div>
                                    </div>
                                    @if ($prestasi->file_sertifikat)
                                        <a href="{{ asset('storage/' . $prestasi->file_sertifikat) }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-sm font-medium px-3 py-1.5 rounded-lg border border-primary text-primary hover:bg-primary hover:text-white transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat
                                        </a>
                                    @else
                                        <span class="text-xs px-3 py-1.5 bg-gray-100 rounded-lg text-gray-500">Tidak ada
                                            file</span>
                                    @endif
                                </div>
                            </div>

                            <!-- File Poster -->
                            <div
                                class="bg-gray-50 rounded-xl shadow-sm border border-gray-200 transition-all hover:border-primary hover:shadow">
                                <div class="flex items-center justify-between p-4">
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="flex items-center justify-center w-10 h-10 bg-blue-50 text-blue-600 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M5 2h14a1 1 0 0 1 1 1v19.143a.5.5 0 0 1-.766.424L12 18.03l-7.234 4.536A.5.5 0 0 1 4 22.143V3a1 1 0 0 1 1-1zm13 2H6v15.432l6-3.761 6 3.761V4z" />
                                            </svg>
                                        </span>
                                        <div>
                                            <span class="text-gray-800 font-medium block">Poster</span>
                                            <span class="text-xs text-gray-500">Informasi kegiatan</span>
                                        </div>
                                    </div>
                                    @if ($prestasi->file_poster)
                                        <a href="{{ asset('storage/' . $prestasi->file_poster) }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-sm font-medium px-3 py-1.5 rounded-lg border border-primary text-primary hover:bg-primary hover:text-white transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat
                                        </a>
                                    @else
                                        <span class="text-xs px-3 py-1.5 bg-gray-100 rounded-lg text-gray-500">Tidak ada
                                            file</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Foto Kegiatan -->
                            <div
                                class="bg-gray-50 rounded-xl shadow-sm border border-gray-200 transition-all hover:border-primary hover:shadow">
                                <div class="flex items-center justify-between p-4">
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="flex items-center justify-center w-10 h-10 bg-purple-50 text-purple-600 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M20 13c-2.67 0-8 1.33-8 4v3h16v-3c0-2.67-5.33-4-8-4m0-9a4 4 0 0 0-4 4 4 4 0 0 0 4 4 4 4 0 0 0 4-4 4 4 0 0 0-4-4M4 13c-.67 0-1.33.1-2 .29v3.24l2 1.53v-4.81c-1.56.47-3.07 1.21-3.5 2.75-.41 1.43.32 2.87 2.18 4.04l.91.65c.55-.61 1.27-1.18 2.3-1.63.25-.11.52-.21.81-.29-.37-.65-.69-1.42-.69-2.27 0-1.85 1.39-3.31 3.34-3.77-.03-.24-.05-.47-.05-.73 0-.7.16-1.36.46-1.95-.3-.07-.62-.11-.96-.11-2.33 0-7 1.17-7 3.5v3.5h3v-3.17z" />
                                            </svg>
                                        </span>
                                        <div>
                                            <span class="text-gray-800 font-medium block">Foto Kegiatan</span>
                                            <span class="text-xs text-gray-500">Dokumentasi</span>
                                        </div>
                                    </div>
                                    @if ($prestasi->foto_kegiatan)
                                        <a href="{{ asset('storage/' . $prestasi->foto_kegiatan) }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-sm font-medium px-3 py-1.5 rounded-lg border border-primary text-primary hover:bg-primary hover:text-white transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat
                                        </a>
                                    @else
                                        <span class="text-xs px-3 py-1.5 bg-gray-100 rounded-lg text-gray-500">Tidak ada
                                            file</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-span-12 lg:col-span-4 space-y-6">
                <!-- Rejection Notes -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-100">
                        <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            Catatan Penolakan
                        </h4>
                    </div>
                    <div class="p-5">
                        @if ($prestasi->notes->isNotEmpty())
                            <ul class="space-y-4 text-gray-900">
                                @php
                                    $latestNotes = $prestasi->notes->slice(-2);
                                @endphp
                                @foreach ($latestNotes as $note)
                                    <li class="border-b border-gray-100 pb-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <div
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold capitalize
                                                {{ $note->status === 'disetujui'
                                                    ? 'bg-green-100 text-green-800'
                                                    : ($note->status === 'pending'
                                                        ? 'bg-yellow-100 text-yellow-800'
                                                        : ($note->status === 'ditolak'
                                                            ? 'bg-red-100 text-red-800'
                                                            : 'bg-gray-100 text-gray-800')) }}">

                                                @php
                                                    $statusIcon = '';
                                                    if ($note->status === 'disetujui') {
                                                        $statusIcon = 'fas fa-check-circle';
                                                    } elseif ($note->status === 'pending') {
                                                        $statusIcon = 'fas fa-hourglass-half';
                                                    } elseif ($note->status === 'ditolak') {
                                                        $statusIcon = 'fas fa-times-circle';
                                                    } else {
                                                        $statusIcon = 'fas fa-question-circle';
                                                    }
                                                @endphp

                                                <i class="{{ $statusIcon }}"></i>
                                                {{ $note->status }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                {{ \Carbon\Carbon::parse($note->created_at)->format('d M Y, H:i') }}
                                            </div>
                                        </div>
                                        <div class="text-gray-700 mb-2 text-sm">{{ $note->note }}</div>
                                        <div class="flex items-center text-xs text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Dosen: {{ $note->dosen->nama ?? 'N/A' }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            @if (count($prestasi->notes) > 2)
                                <div class="mt-4 text-center">
                                    <button onclick="document.getElementById('all-notes').classList.toggle('hidden')"
                                        class="inline-flex items-center gap-1 text-sm text-primary hover:text-primary-dark focus:outline-none transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                        {{ count($prestasi->notes) - 2 }} catatan lainnya
                                    </button>
                                </div>
                                <ul id="all-notes"
                                    class="hidden space-y-4 mt-3 text-gray-900 border-t border-gray-100 pt-4">
                                    @foreach ($prestasi->notes as $note)
                                        <li class="border-b border-gray-100 pb-4">
                                            <div class="flex justify-between items-start mb-2">
                                                <div
                                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold capitalize
                                                    {{ $note->status === 'disetujui'
                                                        ? 'bg-green-100 text-green-800'
                                                        : ($note->status === 'pending'
                                                            ? 'bg-yellow-100 text-yellow-800'
                                                            : ($note->status === 'ditolak'
                                                                ? 'bg-red-100 text-red-800'
                                                                : 'bg-gray-100 text-gray-800')) }}">

                                                    @php
                                                        $statusIcon = '';
                                                        if ($note->status === 'disetujui') {
                                                            $statusIcon = 'fas fa-check-circle';
                                                        } elseif ($note->status === 'pending') {
                                                            $statusIcon = 'fas fa-hourglass-half';
                                                        } elseif ($note->status === 'ditolak') {
                                                            $statusIcon = 'fas fa-times-circle';
                                                        } else {
                                                            $statusIcon = 'fas fa-question-circle';
                                                        }
                                                    @endphp

                                                    <i class="{{ $statusIcon }}"></i>
                                                    {{ $note->status }}
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($note->created_at)->format('d M Y, H:i') }}
                                                </div>
                                            </div>
                                            <div class="text-gray-700 mb-2 text-sm">{{ $note->note }}</div>
                                            <div class="flex items-center text-xs text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                Dosen: {{ $note->dosen->nama ?? 'N/A' }}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @else
                            <div class="flex flex-col items-center justify-center py-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-gray-500 text-sm">Tidak ada catatan penolakan.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Supervisors -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-100">
                        <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Dosen Pembimbing
                        </h4>
                    </div>
                    <div class="p-5">
                        @if ($prestasi->dosens->isNotEmpty())
                            <ul class="divide-y divide-gray-100">
                                @foreach ($prestasi->dosens as $dosen)
                                    <li
                                        class="flex items-center gap-3 py-3 {{ $loop->first ? 'pt-0' : '' }} {{ $loop->last ? 'pb-0' : '' }}">
                                        <div class="flex-shrink-0">
                                            @if ($dosen->foto)
                                                <img src="{{ asset($dosen->foto) }}" alt="Foto {{ $dosen->nama }}"
                                                    class="w-12 h-12 rounded-full object-cover border border-gray-200">
                                            @else
                                                <div
                                                    class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $dosen->nama }}
                                            </p>
                                            <p class="text-xs text-gray-500 truncate">NIDN: {{ $dosen->nidn }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="flex flex-col items-center justify-center py-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <p class="text-gray-500 text-sm">Tidak ada dosen pembimbing terlibat.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Students -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-100">
                        <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Mahasiswa Terlibat
                        </h4>
                    </div>
                    <div class="p-5">
                        @if ($prestasi->mahasiswas->isNotEmpty())
                            <ul class="divide-y divide-gray-100">
                                @foreach ($prestasi->mahasiswas as $mhs)
                                    <li
                                        class="flex items-center gap-3 py-3 {{ $loop->first ? 'pt-0' : '' }} {{ $loop->last ? 'pb-0' : '' }}">
                                        <div class="flex-shrink-0">
                                            @if ($mhs->foto)
                                                <img src="{{ asset($mhs->foto) }}" alt="Foto {{ $mhs->nama }}"
                                                    class="w-12 h-12 rounded-full object-cover border border-gray-200">
                                            @else
                                                <div
                                                    class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $mhs->nama }}
                                            </p>
                                            <p class="text-xs text-gray-500 truncate">NIM: {{ $mhs->nim }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="flex flex-col items-center justify-center py-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <p class="text-gray-500 text-sm">Tidak ada mahasiswa terlibat.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
