@extends('admin.layouts.app')

@section('title', 'Detail Prestasi')

@section('content')
    <div class="max-w-[1280px] mx-auto my-8 px-4 md:px-8">
        <div class="grid grid-cols-12 gap-6 lg:gap-8">
            <!-- Main Content -->
            <div class="col-span-12 lg:col-span-8">
                <!-- Header Card -->
                <div class="rounded-lg shadow-lg overflow-hidden mb-6"
                    style="background: linear-gradient(91deg, #6041CE -0.69%, #513C99 100%);">
                    <div class="p-6 text-white">
                        <div class="flex items-center gap-3 mb-4">
                            <a href="{{ route('admin.prestasi.index') }}"
                                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/20 hover:bg-white/30 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </a>
                            <div>
                                <h1 class="text-2xl font-bold">{{ $prestasi->judul }}</h1>
                                <p class="text-purple-100 text-sm">Review dan kelola prestasi mahasiswa</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-3 h-3 rounded-full 
                                    {{ $prestasi->status == 'disetujui'
                                        ? 'bg-green-400'
                                        : ($prestasi->status == 'ditolak'
                                            ? 'bg-red-400'
                                            : 'bg-yellow-400') }}">
                                </div>
                                <span class="text-sm font-medium">{{ ucfirst($prestasi->status) }}</span>
                            </div>
                            <div class="text-sm opacity-75">
                                ID: #{{ $prestasi->id }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons Card -->
                @if ($prestasi->status === 'pending')
                    <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden mb-6">
                        <div class="border-b border-gray-100 p-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    Approval
                                </h2>

                                <div class="flex gap-3">
                                    <button type="button" id="approve-btn"
                                        class="flex items-center gap-2 px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700 transition-colors font-medium text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Setujui
                                    </button>

                                    <button type="button" id="reject-btn"
                                        class="flex items-center gap-2 px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition-colors font-medium text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Tolak
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Achievement Details Card -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden mb-6">
                    <div class="border-b border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Informasi Prestasi
                        </h2>
                    </div>

                    <div class="p-6">
                        <!-- Hero Section with Title -->
                        <div class="mb-8">
                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 border border-blue-100">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-16 h-16 rounded-xl bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $prestasi->judul }}</h3>
                                        <div class="flex flex-wrap gap-3">
                                            <!-- Achievement Rank Badge -->
                                            <span
                                                class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-yellow-400 to-yellow-500 text-yellow-900 shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                                </svg>
                                                {{ $prestasi->juara }}
                                            </span>

                                            <!-- Level Badge -->
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium capitalize
                                {{ $prestasi->tingkat == 'internasional'
                                    ? 'bg-red-100 text-red-800 border border-red-200'
                                    : ($prestasi->tingkat == 'nasional'
                                        ? 'bg-orange-100 text-orange-800 border border-orange-200'
                                        : 'bg-blue-100 text-blue-800 border border-blue-200') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                                </svg>
                                                {{ ucfirst($prestasi->tingkat) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main Information Cards -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                            <!-- Location & Date Card -->
                            <div
                                class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border border-green-100">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 rounded-lg bg-green-500 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-green-800">Lokasi & Waktu</h4>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm text-green-600 font-medium">Tempat Pelaksanaan</p>
                                        <p class="text-green-900 font-semibold">{{ $prestasi->tempat }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-green-600 font-medium">Periode Kegiatan</p>
                                        <p class="text-green-900 text-sm">
                                            {{ \Carbon\Carbon::parse($prestasi->tanggal_mulai)->format('d M Y') }} -
                                            {{ \Carbon\Carbon::parse($prestasi->tanggal_selesai)->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Category & Type Card -->
                            <div
                                class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-5 border border-purple-100">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 rounded-lg bg-purple-500 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-purple-800">Kategori</h4>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm text-purple-600 font-medium">Jenis Prestasi</p>
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            {{ $prestasi->is_akademik ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800' }}">
                                            {{ $prestasi->is_akademik ? 'Akademik' : 'Non Akademik' }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="text-sm text-purple-600 font-medium">Jenis Peserta</p>
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            {{ $prestasi->is_individu ? 'bg-indigo-100 text-indigo-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $prestasi->is_individu ? 'Individu' : 'Kelompok' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        @if ($prestasi->url || $prestasi->nomor_surat_tugas)
                            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Informasi Tambahan
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @if ($prestasi->url)
                                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                                            <div class="flex items-start gap-3">
                                                <div
                                                    class="w-8 h-8 rounded-lg bg-cyan-100 flex items-center justify-center flex-shrink-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-600"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-800 mb-1">URL Referensi</h4>
                                                    <a href="{{ $prestasi->url }}" target="_blank"
                                                        class="text-blue-600 hover:text-blue-800 text-sm break-all underline">
                                                        {{ $prestasi->url }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($prestasi->nomor_surat_tugas)
                                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                                            <div class="flex items-start gap-3">
                                                <div
                                                    class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 text-emerald-600" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-800 mb-1">Surat Tugas</h4>
                                                    <p class="text-gray-700 font-medium">
                                                        {{ $prestasi->nomor_surat_tugas }}</p>
                                                    <p class="text-sm text-gray-500">
                                                        {{ \Carbon\Carbon::parse($prestasi->tanggal_surat_tugas)->format('d F Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Files Card -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden mb-6">
                    <div class="border-b border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Berkas Pendukung
                        </h2>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">File Surat Tugas</h4>
                                    @if ($prestasi->file_surat_tugas)
                                        <a href="{{ asset('storage/' . $prestasi->file_surat_tugas) }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat File
                                        </a>
                                    @else
                                        <p class="text-gray-500 text-sm">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">File Sertifikat</h4>
                                    @if ($prestasi->file_sertifikat)
                                        <a href="{{ asset('storage/' . $prestasi->file_sertifikat) }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat File
                                        </a>
                                    @else
                                        <p class="text-gray-500 text-sm">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">File Poster</h4>
                                    @if ($prestasi->file_poster)
                                        <a href="{{ asset('storage/' . $prestasi->file_poster) }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat File
                                        </a>
                                    @else
                                        <p class="text-gray-500 text-sm">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Foto Kegiatan</h4>
                                    @if ($prestasi->foto_kegiatan)
                                        <a href="{{ asset('storage/' . $prestasi->foto_kegiatan) }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat File
                                        </a>
                                    @else
                                        <p class="text-gray-500 text-sm">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-span-12 lg:col-span-4">
                <!-- Rejection Notes Card -->
                @if ($prestasi->status === 'ditolak')
                    <div
                        class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg mb-6">
                        <div class="p-5" style="background: linear-gradient(91deg, #dc2626 -0.69%, #b91c1c 100%);">
                            <h4 class="text-lg font-bold text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                Catatan Penolakan
                            </h4>
                        </div>
                        <div class="p-6">
                            @if ($prestasi->notes->isNotEmpty())
                                <div class="space-y-4">
                                    @foreach ($prestasi->notes as $note)
                                        <div class="p-4 bg-red-50 border-l-4 border-red-400 rounded-r-lg">
                                            <div class="flex items-center gap-2 mb-2">
                                                <div
                                                    class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-600"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </div>
                                                <p class="text-sm font-medium text-red-800">
                                                    {{ $note->dosen->nama ?? 'Admin' }}</p>
                                            </div>
                                            <p class="text-sm text-red-700">{{ $note->note }}</p>
                                            <p class="text-xs text-red-600 mt-1">Status: {{ ucfirst($note->status) }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mx-auto mb-3"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-gray-500 text-sm">Tidak ada catatan penolakan</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Status Timeline Card -->
                <div
                    class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg mb-6">
                    <div class="p-5" style="background: linear-gradient(91deg, #6041CE -0.69%, #513C99 100%);">
                        <h4 class="text-lg font-bold text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Riwayat Pengajuan
                        </h4>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <!-- Step 1: Submitted -->
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <div class="w-0.5 h-8 bg-green-300 mt-2"></div>
                                </div>
                                <div class="flex-1 pb-6">
                                    <div class="flex items-center gap-2 mb-1">
                                        <h5 class="font-semibold text-gray-800">Prestasi Diajukan</h5>
                                        <span
                                            class="px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                                    </div>
                                    <p class="text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($prestasi->tanggal_pengajuan)->format('d F Y, H:i') }}</p>
                                    <p class="text-xs text-gray-500 mt-1">Prestasi berhasil diajukan untuk verifikasi</p>
                                </div>
                            </div>

                            <!-- Step 2: Under Review -->
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div
                                        class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-lg
                        {{ $prestasi->status != 'pending' ? 'bg-green-500' : 'bg-blue-500' }}">
                                        @if ($prestasi->status != 'pending')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        @else
                                            <div class="w-3 h-3 bg-white rounded-full animate-pulse"></div>
                                        @endif
                                    </div>
                                    @if ($prestasi->status != 'pending')
                                        <div class="w-0.5 h-8 bg-green-300 mt-2"></div>
                                    @endif
                                </div>
                                <div class="flex-1 pb-6">
                                    <div class="flex items-center gap-2 mb-1">
                                        <h5 class="font-semibold text-gray-800">Review Admin</h5>
                                        <span
                                            class="px-2 py-0.5 rounded text-xs font-medium
                            {{ $prestasi->status != 'pending' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $prestasi->status == 'pending' ? 'Sedang Berjalan' : 'Selesai' }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-600">
                                        {{ $prestasi->status == 'pending' ? 'Sedang dalam proses review...' : $prestasi->updated_at->format('d F Y, H:i') }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $prestasi->status == 'pending' ? 'Admin sedang memverifikasi prestasi' : 'Admin telah menyelesaikan review' }}
                                    </p>

                                    <!-- Admin Response in Timeline -->
                                    @if ($prestasi->status != 'pending' && $prestasi->notes->isNotEmpty())
                                        <div class="mt-3 p-3 rounded-lg bg-gray-50 border">
                                            @foreach ($prestasi->notes as $note)
                                                @if ($note->dosen)
                                                    <div class="flex items-center gap-2 mb-2">
                                                        <div
                                                            class="w-6 h-6 rounded-full bg-purple-100 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-3 w-3 text-purple-600" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <p class="text-xs font-medium text-gray-800">
                                                                {{ $note->dosen->nama }}</p>
                                                            <p class="text-xs text-gray-500">Admin</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="mt-2">
                                                    <p class="text-xs font-medium text-gray-700 mb-1">
                                                        @if ($prestasi->status == 'disetujui')
                                                            Catatan Persetujuan:
                                                        @else
                                                            Alasan Penolakan:
                                                        @endif
                                                    </p>
                                                    <div
                                                        class="p-2 rounded border-l-2 text-xs
                                        {{ $prestasi->status == 'disetujui'
                                            ? 'bg-green-50 border-green-400 text-green-800'
                                            : 'bg-red-50 border-red-400 text-red-800' }}">
                                                        {{ $note->note }}
                                                    </div>
                                                </div>
                                            @break
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Step 3: Final Decision -->
                        @if ($prestasi->status != 'pending')
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div
                                        class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-lg
                            {{ $prestasi->status == 'disetujui' ? 'bg-green-500' : 'bg-red-500' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $prestasi->status == 'disetujui' ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12' }}" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <h5 class="font-semibold text-gray-800">
                                            {{ $prestasi->status == 'disetujui' ? 'Prestasi Disetujui' : 'Prestasi Ditolak' }}
                                        </h5>
                                        <span
                                            class="px-2 py-0.5 rounded text-xs font-medium
                                {{ $prestasi->status == 'disetujui' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            Final
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-600">{{ $prestasi->updated_at->format('d F Y, H:i') }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $prestasi->status == 'disetujui'
                                            ? 'Prestasi berhasil diverifikasi dan dipublikasikan'
                                            : 'Prestasi tidak dapat diverifikasi' }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Dosen Pembimbing Card -->
            <div
                class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg mb-6">
                <div class="p-5 border-b border-gray-100">
                    <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Dosen Pembimbing
                    </h4>
                </div>
                <div class="p-6">
                    @if ($prestasi->dosens->isNotEmpty())
                        <div class="space-y-4">
                            @foreach ($prestasi->dosens as $dosen)
                                <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50">
                                    @if ($dosen->foto)
                                        <img src="{{ asset($dosen->foto) }}" alt="Foto Dosen"
                                            class="w-12 h-12 rounded-full object-cover border-2 border-gray-200 flex-shrink-0">
                                    @else
                                        <div
                                            class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center border-2 border-purple-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <h5 class="font-semibold text-gray-800">{{ $dosen->nama }}</h5>
                                        <p class="text-sm text-gray-500">NIDN: {{ $dosen->nidn }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mx-auto mb-3"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <p class="text-gray-500 text-sm">Tidak ada dosen pembimbing</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Mahasiswa Terlibat Card -->
            <div
                class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg">
                <div class="p-5 border-b border-gray-100">
                    <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                        Mahasiswa Terlibat
                    </h4>
                </div>
                <div class="p-6">
                    @if ($prestasi->mahasiswas->isNotEmpty())
                        <div class="space-y-4">
                            @foreach ($prestasi->mahasiswas as $mhs)
                                <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50">
                                    @if ($mhs->foto)
                                        <img src="{{ asset($mhs->foto) }}" alt="Foto Mahasiswa"
                                            class="w-12 h-12 rounded-full object-cover border-2 border-gray-200 flex-shrink-0">
                                    @else
                                        <div
                                            class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center border-2 border-blue-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <h5 class="font-semibold text-gray-800">{{ $mhs->nama }}</h5>
                                        <p class="text-sm text-gray-500">NIM: {{ $mhs->nim }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mx-auto mb-3"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <p class="text-gray-500 text-sm">Tidak ada mahasiswa terlibat</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        console.log('Admin prestasi detail script loaded');

        // Approve button handler
        $('#approve-btn').on('click', function() {
            console.log('Approve button clicked');

            Swal.fire({
                title: 'Setujui Prestasi?',
                text: 'Prestasi akan disetujui dan dipublikasikan.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Sending approve request');

                    $.ajax({
                        url: `/admin/prestasi/{{ $prestasi->id }}/approve`,
                        type: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        beforeSend: function() {
                            console.log('Sending AJAX approve request...');
                        },
                        success: function(response) {
                            console.log('Approve success:', response);
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message ||
                                    'Prestasi berhasil disetujui',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Approve error:', {
                                xhr: xhr,
                                status: status,
                                error: error
                            });

                            let errorMessage =
                                'Terjadi kesalahan saat menyetujui prestasi.';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: errorMessage
                            });
                        }
                    });
                }
            });
        });

        // Reject button handler
        $('#reject-btn').on('click', function() {
            console.log('Reject button clicked');

            Swal.fire({
                title: 'Tolak Prestasi?',
                text: 'Prestasi akan ditolak dan tidak dipublikasikan.',
                icon: 'warning',
                input: 'textarea',
                inputLabel: 'Catatan Penolakan (Wajib)',
                inputPlaceholder: 'Masukkan alasan penolakan...',
                inputAttributes: {
                    'aria-label': 'Catatan Penolakan'
                },
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Tolak!',
                cancelButtonText: 'Batal',
                preConfirm: (note) => {
                    if (!note || note.trim() === '') {
                        Swal.showValidationMessage('Catatan penolakan wajib diisi!');
                        return false;
                    }
                    return note.trim();
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Sending reject request with note:', result.value);

                    $.ajax({
                        url: `/admin/prestasi/{{ $prestasi->id }}/reject`,
                        type: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            _token: '{{ csrf_token() }}',
                            note: result.value
                        },
                        beforeSend: function() {
                            console.log('Sending AJAX reject request...');
                        },
                        success: function(response) {
                            console.log('Reject success:', response);
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message ||
                                    'Prestasi berhasil ditolak',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Reject error:', {
                                xhr: xhr,
                                status: status,
                                error: error
                            });

                            let errorMessage =
                                'Terjadi kesalahan saat menolak prestasi.';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: errorMessage
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endpush

@push('styles')
<style>
    /* Custom animations */
    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    /* Custom hover effects */
    .hover\:shadow-lg:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
</style>
@endpush
