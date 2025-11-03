@extends('mahasiswa.layouts.app')

@section('title', 'Detail Pengajuan Lomba')

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
                            <a href="{{ route('mahasiswa.lomba.index') }}"
                                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/20 hover:bg-white/30 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </a>
                            <div>
                                <h1 class="text-2xl font-bold">Pengajuan Lomba #{{ $pengajuan->id }}</h1>
                                <p class="text-purple-100 text-sm">Usulan informasi lomba kepada admin</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-3 h-3 rounded-full 
                                    {{ $pengajuan->status == 'disetujui'
                                        ? 'bg-green-400'
                                        : ($pengajuan->status == 'ditolak'
                                            ? 'bg-red-400'
                                            : 'bg-yellow-400') }}">
                                </div>
                                <span class="text-sm font-medium">{{ ucfirst($pengajuan->status) }}</span>
                            </div>
                            <div class="text-sm opacity-75">
                                {{ $pengajuan->created_at->format('d F Y, H:i') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Competition Details Card -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden mb-6">
                    <div class="border-b border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                            Detail Lomba yang Diusulkan
                        </h2>
                    </div>

                    <div class="p-6">
                        <!-- Competition Title -->
                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $pengajuan->lomba->judul }}</h3>

                            <!-- Main Category Badges -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium capitalize
                                    {{ $pengajuan->lomba->tingkat == 'internasional'
                                        ? 'bg-red-100 text-red-800'
                                        : ($pengajuan->lomba->tingkat == 'nasional'
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : ($pengajuan->lomba->tingkat == 'regional'
                                                ? 'bg-blue-100 text-blue-800'
                                                : 'bg-green-100 text-green-800')) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                    </svg>
                                    Tingkat {{ ucfirst($pengajuan->lomba->tingkat) }}
                                </span>

                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium
                                    {{ $pengajuan->lomba->is_individu ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $pengajuan->lomba->is_individu ? 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z' : 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z' }}" />
                                    </svg>
                                    {{ $pengajuan->lomba->is_individu ? 'Individu' : 'Tim' }}
                                </span>

                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium
                                    {{ $pengajuan->lomba->is_akademik ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $pengajuan->lomba->is_akademik ? 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253' : 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10' }}" />
                                    </svg>
                                    {{ $pengajuan->lomba->is_akademik ? 'Akademik' : 'Non-Akademik' }}
                                </span>
                            </div>

                            <!-- Bidang Lomba Section -->
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-500 mb-2">Bidang Lomba</h4>
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($pengajuan->lomba->bidang as $bidang)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                                            {{ $bidang->nama }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Competition Info Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">Lokasi Pelaksanaan</h4>
                                        <p class="text-gray-600">{{ $pengajuan->lomba->tempat }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">Tanggal Pendaftaran</h4>
                                        <p class="text-gray-600">
                                            {{ \Carbon\Carbon::parse($pengajuan->lomba->tanggal_daftar)->format('d F Y') }}
                                        </p>
                                    </div>
                                </div>

                                @if ($pengajuan->lomba->url)
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">Website Lomba</h4>
                                            <a href="{{ $pengajuan->lomba->url }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-800 text-sm break-all">
                                                {{ $pengajuan->lomba->url }}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-6">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">Batas Pendaftaran</h4>
                                        <div class="flex items-center gap-2">
                                            <p class="text-gray-600">
                                                {{ \Carbon\Carbon::parse($pengajuan->lomba->tanggal_daftar_terakhir)->format('d F Y') }}
                                            </p>
                                            @if (\Carbon\Carbon::parse($pengajuan->lomba->tanggal_daftar_terakhir) < now())
                                                <span
                                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Sudah Berakhir
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Masih Buka
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if ($pengajuan->lomba->file_poster)
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">File Poster</h4>
                                            <a href="{{ asset('storage/poster_lomba/' . $pengajuan->lomba->file_poster) }}"
                                                target="_blank" class="text-blue-600 hover:text-blue-800 text-sm">
                                                Lihat Poster
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">Dibuat</h4>
                                        <p class="text-gray-600">{{ $pengajuan->lomba->created_at->format('d F Y, H:i') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-span-12 lg:col-span-4">
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
                                        <h5 class="font-semibold text-gray-800">Pengajuan Disubmit</h5>
                                        <span
                                            class="px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                                    </div>
                                    <p class="text-sm text-gray-600">{{ $pengajuan->created_at->format('d F Y, H:i') }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">Usulan lomba berhasil dikirim ke admin</p>
                                </div>
                            </div>

                            <!-- Step 2: Under Review -->
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div
                                        class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-lg
                                        {{ $pengajuan->status != 'pending' ? 'bg-green-500' : 'bg-blue-500' }}">
                                        @if ($pengajuan->status != 'pending')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        @else
                                            <div class="w-3 h-3 bg-white rounded-full animate-pulse"></div>
                                        @endif
                                    </div>
                                    @if ($pengajuan->status != 'pending')
                                        <div class="w-0.5 h-8 bg-green-300 mt-2"></div>
                                    @endif
                                </div>
                                <div class="flex-1 pb-6">
                                    <div class="flex items-center gap-2 mb-1">
                                        <h5 class="font-semibold text-gray-800">Review Admin</h5>
                                        <span
                                            class="px-2 py-0.5 rounded text-xs font-medium
                                            {{ $pengajuan->status != 'pending' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $pengajuan->status == 'pending' ? 'Sedang Berjalan' : 'Selesai' }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-600">
                                        {{ $pengajuan->status == 'pending' ? 'Sedang dalam proses review...' : $pengajuan->updated_at->format('d F Y, H:i') }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $pengajuan->status == 'pending' ? 'Admin sedang meninjau usulan lomba' : 'Admin telah menyelesaikan review' }}
                                    </p>

                                    <!-- Admin Response in Timeline -->
                                    @if ($pengajuan->status != 'pending' && ($pengajuan->admin || $pengajuan->notes))
                                        <div class="mt-3 p-3 rounded-lg bg-gray-50 border">
                                            @if ($pengajuan->admin)
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
                                                            {{ $pengajuan->admin->nama }}</p>
                                                        <p class="text-xs text-gray-500">Admin</p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($pengajuan->notes)
                                                <div class="mt-2">
                                                    <p class="text-xs font-medium text-gray-700 mb-1">
                                                        @if ($pengajuan->status == 'disetujui')
                                                            Catatan Persetujuan:
                                                        @else
                                                            Alasan Penolakan:
                                                        @endif
                                                    </p>
                                                    <div
                                                        class="p-2 rounded border-l-2 text-xs
                                                        {{ $pengajuan->status == 'disetujui'
                                                            ? 'bg-green-50 border-green-400 text-green-800'
                                                            : 'bg-red-50 border-red-400 text-red-800' }}">
                                                        {{ $pengajuan->notes }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Step 3: Final Decision -->
                            @if ($pengajuan->status != 'pending')
                                <div class="flex items-start">
                                    <div class="flex flex-col items-center mr-4">
                                        <div
                                            class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-lg
                                            {{ $pengajuan->status == 'disetujui' ? 'bg-green-500' : 'bg-red-500' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $pengajuan->status == 'disetujui' ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12' }}" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <h5 class="font-semibold text-gray-800">
                                                {{ $pengajuan->status == 'disetujui' ? 'Pengajuan Disetujui' : 'Pengajuan Ditolak' }}
                                            </h5>
                                            <span
                                                class="px-2 py-0.5 rounded text-xs font-medium
                                                {{ $pengajuan->status == 'disetujui' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                Final
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-600">
                                            {{ $pengajuan->updated_at->format('d F Y, H:i') }}</p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $pengajuan->status == 'disetujui'
                                                ? 'Lomba akan dipublikasikan ke mahasiswa'
                                                : 'Usulan tidak dapat diproses lebih lanjut' }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Info Card -->
                <div
                    class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <div class="p-5 border-b border-gray-100">
                        <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Informasi Pengajuan
                        </h4>
                    </div>
                    <div class="p-5">
                        <div class="space-y-4 text-sm">
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-3 rounded-r">
                                <h5 class="font-medium text-blue-800 mb-1">Tentang Pengajuan Lomba</h5>
                                <p class="text-blue-700">Fitur ini memungkinkan mahasiswa mengusulkan informasi lomba baru
                                    kepada admin untuk dipublikasikan.</p>
                            </div>

                            <div class="space-y-3">
                                <div>
                                    <h6 class="font-medium text-gray-800">Status Pending</h6>
                                    <p class="text-gray-600">Usulan sedang ditinjau oleh admin.</p>
                                </div>

                                <div>
                                    <h6 class="font-medium text-gray-800">Status Disetujui</h6>
                                    <p class="text-gray-600">Lomba akan dipublikasikan dan dapat dilihat mahasiswa lain.
                                    </p>
                                </div>

                                <div>
                                    <h6 class="font-medium text-gray-800">Status Ditolak</h6>
                                    <p class="text-gray-600">Usulan tidak dapat diproses. Periksa catatan admin di riwayat
                                        pengajuan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
    </style>
@endpush
