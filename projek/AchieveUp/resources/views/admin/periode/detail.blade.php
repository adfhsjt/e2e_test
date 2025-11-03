@extends('admin.layouts.app')

@section('title', 'Detail Periode')

@section('content')
    <div class="max-w-[1280px] mx-auto my-8 px-4 md:px-8">
        <div class="grid grid-cols-12 gap-6 lg:gap-8">
            <!-- Main Content -->
            <div class="col-span-12 lg:col-span-8">
                <div class="rounded-lg shadow-lg overflow-hidden mb-6"
                    style="background: linear-gradient(91deg, #6041CE -0.69%, #513C99 100%);">
                    <div class="p-6 text-white">
                        <div class="flex items-center gap-3 mb-4">
                            <a href="{{ route('admin.periode.index') }}"
                                class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/20 hover:bg-white/30 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </a>
                            <div>
                                <h1 class="text-2xl font-bold">{{ $periode->nama }}</h1>
                                <p class="text-purple-100 text-sm">Detail periode akademik</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-3 h-3 rounded-full {{ $periode->is_active ? 'bg-green-400' : 'bg-gray-400' }}">
                                </div>
                                <span
                                    class="text-sm font-medium">{{ $periode->is_active ? 'Periode Aktif' : 'Periode Tidak Aktif' }}</span>
                            </div>
                            <div class="text-sm opacity-75">
                                Kode: {{ $periode->kode }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden mb-6">
                    <div class="border-b border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Informasi Periode
                        </h2>
                    </div>

                    <div class="p-6">
                        <div class="flex items-start gap-6 mb-8">
                            <div
                                class="w-24 h-24 rounded-xl bg-gradient-to-br from-blue-100 to-cyan-100 flex items-center justify-center border-4 border-gray-200 shadow-lg flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>

                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $periode->nama }}</h3>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Periode Akademik
                                    </span>

                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-cyan-100 text-cyan-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                        </svg>
                                        Kode: {{ $periode->kode }}
                                    </span>

                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                        {{ $periode->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $periode->is_active ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2' }}" />
                                        </svg>
                                        {{ $periode->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </div>
                                <p class="text-gray-600">
                                    {{ $periode->is_active
                                        ? 'Periode akademik yang sedang berlangsung untuk pencatatan prestasi dan lomba'
                                        : 'Periode akademik yang telah berakhir atau belum dimulai' }}
                                </p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-6">Detail Informasi</h3>

                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="bg-white rounded-lg p-4 border border-gray-200">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium">Nama Periode</p>
                                                <p class="text-sm font-semibold text-gray-900">{{ $periode->nama }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg p-4 border border-gray-200">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-cyan-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium">Kode Periode</p>
                                                <p class="text-sm font-semibold text-gray-900 font-mono">
                                                    {{ $periode->kode }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg p-4 border border-gray-200">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg {{ $periode->is_active ? 'bg-green-100' : 'bg-gray-100' }} flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 {{ $periode->is_active ? 'text-green-600' : 'text-gray-600' }}"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="{{ $periode->is_active ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2' }}" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium">Status</p>
                                                <span
                                                    class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium 
                                                    {{ $periode->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                    {{ $periode->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-white rounded-lg p-4 border border-gray-200">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium">Dibuat</p>
                                                <p class="text-sm font-semibold text-gray-900">
                                                    {{ $periode->created_at ? $periode->created_at->format('d M Y') : '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg p-4 border border-gray-200">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium">Terakhir Diupdate</p>
                                                <p class="text-sm font-semibold text-gray-900">
                                                    {{ $periode->updated_at ? $periode->updated_at->format('d M Y') : '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

            <!-- Sidebar -->
            <div class="col-span-12 lg:col-span-4">
                <div
                    class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg mb-6">
                    <div class="p-5" style="background: linear-gradient(91deg, #6041CE -0.69%, #513C99 100%);">
                        <h4 class="text-lg font-bold text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Aksi
                        </h4>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="{{ route('admin.periode.edit', $periode->id) }}"
                                class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-medium text-gray-800">Edit Periode</h5>
                                    <p class="text-sm text-gray-500">Update informasi periode</p>
                                </div>
                            </a>

                            @if (!$periode->is_active)
                                <button type="button"
                                    class="btn-aktifkan w-full flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors"
                                    data-id="{{ $periode->id }}">
                                    <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-check-circle text-green-600"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-medium text-gray-800">Aktifkan Periode</h5>
                                        <p class="text-sm text-gray-500">Set sebagai periode aktif</p>
                                    </div>
                                </button>
                            @else
                                <div class="flex items-center gap-3 p-3 rounded-lg bg-green-50 border border-green-200">
                                    <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-check-circle text-green-600"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-medium text-green-800">Periode Aktif</h5>
                                        <p class="text-sm text-green-600">Sedang digunakan saat ini</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <div class="p-5 border-b border-gray-100">
                        <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Informasi Sistem
                        </h4>
                    </div>
                    <div class="p-5">
                        <div class="space-y-4 text-sm">
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-3 rounded-r">
                                <h5 class="font-medium text-blue-800 mb-1">Periode Akademik</h5>
                                <p class="text-blue-700">Periode digunakan untuk mengelompokkan prestasi berdasarkan waktu
                                    akademik tertentu.</p>
                            </div>

                            <div class="space-y-3">
                                <div>
                                    <h6 class="font-medium text-gray-800">Fungsi</h6>
                                    <ul class="text-gray-600 text-xs mt-1 space-y-1">
                                        <li>• Pengelompokan prestasi berdasarkan periode</li>
                                        <li>• Filter data prestasi per periode</li>
                                        <li>• Laporan dan statistik berkala</li>
                                        <li>• Kontrol data akademik</li>
                                    </ul>
                                </div>

                                <div>
                                    <h6 class="font-medium text-gray-800">Status Periode</h6>
                                    <div class="mt-1">
                                        @if ($periode->is_active)
                                            <div class="flex items-center gap-2 text-green-700">
                                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                                <span class="text-xs">Periode ini sedang aktif dan digunakan untuk
                                                    pencatatan prestasi baru</span>
                                            </div>
                                        @else
                                            <div class="flex items-center gap-2 text-gray-600">
                                                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                                <span class="text-xs">Periode tidak aktif, tidak dapat digunakan untuk
                                                    pencatatan prestasi baru</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <h6 class="font-medium text-gray-800">Contoh Periode</h6>
                                    <ul class="text-gray-600 text-xs mt-1 space-y-1">
                                        <li>• Semester Ganjil 2024/2025</li>
                                        <li>• Semester Genap 2024/2025</li>
                                        <li>• Tahun Akademik 2024/2025</li>
                                    </ul>
                                </div>

                                <div>
                                    <h6 class="font-medium text-gray-800">Terakhir Update</h6>
                                    <p class="text-gray-600">
                                        {{ $periode->updated_at ? $periode->updated_at->format('d F Y, H:i') : 'Belum pernah diupdate' }}
                                    </p>
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

        /* Custom hover effects */
        .hover\:shadow-lg:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
@endpush
