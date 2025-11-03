@extends('mahasiswa.layouts.app')

@section('title', 'Detail Lomba')

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
                                <h1 class="text-2xl font-bold">{{ $lomba->judul }}</h1>
                                <p class="text-purple-100 text-sm">Informasi detail lomba</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-3 h-3 rounded-full 
                                    {{ $lomba->is_active ? 'bg-green-400' : 'bg-red-400' }}">
                                </div>
                                <span class="text-sm font-medium">{{ $lomba->is_active ? 'Aktif' : 'Tidak Aktif' }}</span>
                            </div>
                            <div class="text-sm opacity-75">
                                {{ $lomba->created_at->format('d F Y, H:i') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Competition Details Card -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                            Detail Lomba
                        </h2>
                    </div>

                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium capitalize
                                {{ $lomba->tingkat == 'internasional'
                                    ? 'bg-red-100 text-red-800'
                                    : ($lomba->tingkat == 'nasional'
                                        ? 'bg-yellow-100 text-yellow-800'
                                        : ($lomba->tingkat == 'regional'
                                            ? 'bg-blue-100 text-blue-800'
                                            : 'bg-green-100 text-green-800')) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                </svg>
                                Tingkat {{ ucfirst($lomba->tingkat) }}
                            </span>

                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium
                                {{ $lomba->is_individu ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $lomba->is_individu ? 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z' : 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z' }}" />
                                </svg>
                                {{ $lomba->is_individu ? 'Individu' : 'Tim' }}
                            </span>

                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium
                                {{ $lomba->is_akademik ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $lomba->is_akademik ? 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253' : 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10' }}" />
                                </svg>
                                {{ $lomba->is_akademik ? 'Akademik' : 'Non-Akademik' }}
                            </span>
                        </div>

                        <!-- Bidang Lomba Section -->
                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Bidang Lomba</h4>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach ($lomba->bidang as $bidang)
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ $bidang->nama }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8 mb-6">
                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Tempat</p>
                                <p class="text-gray-900 font-semibold flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $lomba->tempat }}
                                </p>
                            </div>

                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Tanggal Daftar</p>
                                <p class="text-gray-900 font-semibold flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $lomba->tanggal_daftar->format('d F Y') }}
                                </p>
                            </div>

                            <div class="space-y-1">
                                <p class="text-sm text-gray-500 font-medium">Batas Pendaftaran</p>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-gray-900 font-semibold">
                                        {{ $lomba->tanggal_daftar_terakhir->format('d F Y') }}</p>
                                    @if ($lomba->tanggal_daftar_terakhir < now())
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-xs font-medium bg-red-100 text-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Expired
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-xs font-medium bg-green-100 text-green-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            Masih Buka
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if ($pengajuan)
                            <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-5 mt-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-lg font-medium text-blue-800">Status Pengajuan Anda</h3>
                                        <div class="mt-2 text-blue-700">
                                            <p class="mb-2 flex items-center">
                                                Status:
                                                <span
                                                    class="ml-2 inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                                    {{ $pengajuan->status == 'disetujui'
                                                        ? 'bg-green-100 text-green-800'
                                                        : ($pengajuan->status == 'ditolak'
                                                            ? 'bg-red-100 text-red-800'
                                                            : 'bg-yellow-100 text-yellow-800') }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="{{ $pengajuan->status == 'disetujui' ? 'M5 13l4 4L19 7' : ($pengajuan->status == 'ditolak' ? 'M6 18L18 6M6 6l12 12' : 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z') }}" />
                                                    </svg>
                                                    {{ ucfirst($pengajuan->status) }}
                                                </span>
                                            </p>
                                            @if ($pengajuan->notes)
                                                <p class="mb-3 text-sm">
                                                    <span class="font-semibold">Catatan Admin:</span>
                                                    {{ $pengajuan->notes }}
                                                </p>
                                            @endif
                                            <a href="{{ route('mahasiswa.pengajuan.detail', $pengajuan->id) }}"
                                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition-colors text-sm font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Lihat Detail Pengajuan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if ($lomba->is_active && $lomba->tanggal_daftar_terakhir >= now())
                                <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-5 mt-6">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-lg font-medium text-green-800">Pendaftaran Masih Dibuka!</h3>
                                            <div class="mt-2 text-green-700">
                                                <p class="mb-3">Kamu dapat mengajukan diri untuk lomba ini.</p>
                                                @if ($lomba->url)
                                                    <a href="{{ $lomba->url }}" target="_blank"
                                                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700 transition-colors text-sm font-medium">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                        </svg>
                                                        Kunjungi Website Lomba
                                                    </a>
                                                @else
                                                    <a href="{{ route('mahasiswa.lomba.create') }}?lomba_id={{ $lomba->id }}"
                                                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700 transition-colors text-sm font-medium">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                        Ajukan Sekarang
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-5 mt-6">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-lg font-medium text-yellow-800">Pendaftaran Ditutup</h3>
                                            <div class="mt-2 text-yellow-700">
                                                <p>Maaf, pendaftaran untuk lomba ini sudah tidak tersedia.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-span-12 lg:col-span-4">
                <!-- Poster Card -->
                <div
                    class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg mb-6">
                    <div class="p-5 border-b border-gray-100">
                        <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Poster Lomba
                        </h4>
                    </div>
                    <div class="p-0">
                        @if ($lomba->file_poster)
                            <img src="{{ asset('storage/poster_lomba/' . $lomba->file_poster) }}"
                                alt="Poster {{ $lomba->judul }}" class="w-full h-auto object-cover"
                                onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'flex flex-col items-center justify-center py-16 px-6 text-center\'><svg xmlns=\'http://www.w3.org/2000/svg\' class=\'h-16 w-16 text-gray-300 mb-3\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\' /></svg><p class=\'text-gray-500 text-sm\'>Tidak ada gambar</p></div>'">
                            <div class="p-4 text-center">
                                <a href="{{ asset('storage/poster_lomba/' . $lomba->file_poster) }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 text-sm font-medium px-3 py-1.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Lihat Lebih Besar
                                </a>
                            </div>
                        @else
                            <div class="flex flex-col items-center justify-center py-16 px-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-3"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-gray-500 text-sm">Tidak ada gambar</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Information Card -->
                <div
                    class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <div class="p-5 border-b border-gray-100">
                        <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Informasi Tambahan
                        </h4>
                    </div>
                    <div class="p-5">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-sm font-semibold text-gray-800">Panduan Pendaftaran</h5>
                                    <p class="text-sm text-gray-600 mt-1">Silakan cek website lomba untuk informasi
                                        pendaftaran lebih detail.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-sm font-semibold text-gray-800">Manfaat Mengikuti</h5>
                                    <p class="text-sm text-gray-600 mt-1">Pengalaman berharga, sertifikat, dan potensial
                                        hadiah menarik.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-sm font-semibold text-gray-800">Batas Waktu</h5>
                                    <p class="text-sm text-gray-600 mt-1">Pastikan mendaftar sebelum batas waktu
                                        pendaftaran berakhir.</p>
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
        /* Primary color variable */
        :root {
            --color-primary: #4F46E5;
            --color-primary-dark: #4338CA;
            --color-primary-light: #EEF2FF;
        }

        /* Primary color classes */
        .text-primary {
            color: var(--color-primary);
        }

        .text-primary-dark {
            color: var(--color-primary-dark);
        }

        .bg-primary {
            background-color: var(--color-primary);
        }

        .bg-primary-light {
            background-color: var(--color-primary-light);
        }

        .border-primary {
            border-color: var(--color-primary);
        }

        .hover\:bg-primary:hover {
            background-color: var(--color-primary);
        }

        .hover\:border-primary:hover {
            border-color: var(--color-primary);
        }

        .hover\:text-primary:hover {
            color: var(--color-primary);
        }

        .bg-primary-100 {
            background-color: #EEF2FF;
            /* Indigo 100 */
        }

        .text-primary-800 {
            color: #3730A3;
            /* Indigo 800 */
        }
    </style>
@endpush
