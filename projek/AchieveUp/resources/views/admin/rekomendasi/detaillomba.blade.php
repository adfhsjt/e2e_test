@extends('admin.layouts.app')

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
                            <a href="{{ url('admin/lomba') }}"
                                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/20 hover:bg-white/30 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </a>
                            <div>
                                <h1 class="text-2xl font-bold">{{ $lomba['judul'] }}</h1>
                                <p class="text-purple-100 text-sm">Kelola informasi lomba</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-3 h-3 rounded-full 
                                    {{ $lomba['is_active'] ? 'bg-green-400' : 'bg-red-400' }}">
                                </div>
                                <span class="text-sm font-medium">{{ $lomba['is_active'] ? 'Aktif' : 'Tidak Aktif' }}</span>
                            </div>
                            <div class="text-sm opacity-75">
                                ID: #{{ $lomba['id'] }}
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
                            Informasi Lomba
                        </h2>
                    </div>

                    <div class="p-6">
                        <!-- Main Category Badges -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium capitalize
                                {{ $lomba['tingkat'] == 'internasional'
                                    ? 'bg-red-100 text-red-800'
                                    : ($lomba['tingkat'] == 'nasional'
                                        ? 'bg-yellow-100 text-yellow-800'
                                        : ($lomba['tingkat'] == 'regional'
                                            ? 'bg-blue-100 text-blue-800'
                                            : 'bg-green-100 text-green-800')) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                </svg>
                                Tingkat {{ ucfirst($lomba['tingkat']) }}
                            </span>

                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium
                                {{ $lomba['is_individu'] ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $lomba['is_individu'] ? 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z' : 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z' }}" />
                                </svg>
                                {{ $lomba['is_individu'] ? 'Individu' : 'Tim' }}
                            </span>

                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium
                                {{ $lomba['is_akademik'] ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $lomba['is_akademik'] ? 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253' : 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10' }}" />
                                </svg>
                                {{ $lomba['is_akademik'] ? 'Akademik' : 'Non-Akademik' }}
                            </span>

                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium
                                {{ $lomba['is_active'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $lomba['is_active'] ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z' }}" />
                                </svg>
                                {{ $lomba['is_active'] ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>

                        <!-- Bidang Lomba Section -->
                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Bidang Lomba</h4>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach ($lomba['bidang'] as $bidang)
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ $bidang['nama'] }}
                                    </span>
                                @endforeach
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
                                        <p class="text-gray-600">{{ $lomba['tempat'] }}</p>
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
                                        <h4 class="font-semibold text-gray-800 mb-1">Periode Pendaftaran</h4>
                                        <p class="text-gray-600">{{ $lomba['periode_pendaftaran'] }}</p>
                                    </div>
                                </div>

                                @if ($lomba['link'])
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
                                            <a href="{{ $lomba['link'] }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-800 text-sm break-all">
                                                {{ $lomba['link'] }}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-6">
                                @if ($lomba['file_poster'])
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
                                            <a href="{{ asset($lomba['file_poster']) }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-800 text-sm">
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
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">ID Lomba</h4>
                                        <p class="text-gray-600">#{{ $lomba['id'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">

                    <div class="border-b border-gray-100 p-6">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Aksi Tersedia
                            </h2>

                            <div class="flex gap-3">
                                <a href="{{ url("admin/lomba/edit/{$lomba['id']}") }}"
                                    class="flex items-center gap-2 px-4 py-2 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600 transition-colors font-medium text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit Lomba
                                </a>

                                <a href="{{ url("admin/rekomendasi/create/{$lomba['id']}") }}"
                                    class="flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition-colors font-medium text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Buat Rekomendasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-span-12 lg:col-span-4">
                <!-- Poster Preview Card -->
                @if ($lomba['file_poster'])
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
                            <img src="{{ asset($lomba['file_poster']) }}" alt="Poster {{ $lomba['judul'] }}"
                                class="w-full h-auto object-cover"
                                onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'flex flex-col items-center justify-center py-16 px-6 text-center\'><svg xmlns=\'http://www.w3.org/2000/svg\' class=\'h-16 w-16 text-gray-300 mb-3\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\' /></svg><p class=\'text-gray-500 text-sm\'>Gambar tidak dapat dimuat</p></div>'">
                            <div class="p-4 text-center">
                                <a href="{{ asset($lomba['file_poster']) }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 text-sm font-medium px-3 py-1.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Lihat Ukuran Penuh
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Admin Notes Card -->
                <div
                    class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <div class="p-5 border-b border-gray-100">
                        <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Catatan
                        </h4>
                    </div>
                    <div class="p-5">
                        <div class="space-y-4 text-sm">
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-3 rounded-r">
                                <h5 class="font-medium text-blue-800 mb-1">Pengelolaan Lomba</h5>
                                <p class="text-blue-700">Pastikan semua informasi lomba sudah lengkap dan akurat.</p>
                            </div>

                            <div class="space-y-3">
                                <div>
                                    <h6 class="font-medium text-gray-800">Edit Informasi</h6>
                                    <p class="text-gray-600">Ubah detail lomba, tanggal, lokasi, dan informasi lainnya.</p>
                                </div>

                                <div>
                                    <h6 class="font-medium text-gray-800">Buat Rekomendasi</h6>
                                    <p class="text-gray-600">Buatkan rekomendasi lomba untuk mahasiswa berdasarkan kriteria
                                        tertentu.</p>
                                </div>

                                <div>
                                    <h6 class="font-medium text-gray-800">Status Aktivasi</h6>
                                    <p class="text-gray-600">Kelola status aktif/non-aktif lomba untuk visibilitas
                                        mahasiswa.</p>
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
