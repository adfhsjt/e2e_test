@extends('dosen.layouts.app')

@section('title', $page->title)

@section('content')
    <div class="mx-auto max-w-6xl h-full flex flex-col space-y-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $page->title }}</h1>
                <p class="mt-1 text-sm text-gray-600">Detail informasi mahasiswa dan prestasi yang telah diraih</p>
            </div>
            <a href="{{ route('dosen.bimbingan.index') }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Student Information Card -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Data Mahasiswa
                </h2>
            </div>

            <div class="px-6 py-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <dt class="text-sm font-medium text-gray-600 sm:w-32 mb-1 sm:mb-0">Nama</dt>
                        <dd class="text-sm text-gray-900 font-medium sm:ml-4">{{ $mahasiswa->nama }}</dd>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <dt class="text-sm font-medium text-gray-600 sm:w-32 mb-1 sm:mb-0">NIM</dt>
                        <dd class="text-sm text-gray-900 sm:ml-4">{{ $mahasiswa->nim }}</dd>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <dt class="text-sm font-medium text-gray-600 sm:w-32 mb-1 sm:mb-0">Username</dt>
                        <dd class="text-sm text-gray-900 sm:ml-4">{{ $mahasiswa->username }}</dd>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <dt class="text-sm font-medium text-gray-600 sm:w-32 mb-1 sm:mb-0">Email</dt>
                        <dd class="text-sm text-gray-900 sm:ml-4">
                            <a href="mailto:{{ $mahasiswa->email }}"
                                class="text-blue-600 hover:text-blue-800 hover:underline">
                                {{ $mahasiswa->email }}
                            </a>
                        </dd>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center md:col-span-2">
                        <dt class="text-sm font-medium text-gray-600 sm:w-32 mb-1 sm:mb-0">Program Studi</dt>
                        <dd class="text-sm text-gray-900 sm:ml-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $mahasiswa->program_studi }}
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Achievements Section -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                        Prestasi yang Pernah Diraih
                    </h2>
                    @if ($prestasi->count())
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            {{ $prestasi->count() }} prestasi
                        </span>
                    @endif
                </div>
            </div>

            <div class="px-6 py-6">
                @if ($prestasi->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Judul Prestasi
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tempat
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tingkat
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Peringkat
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($prestasi as $index => $p)
                                    <tr
                                        class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-blue-50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $p->judul }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-700">{{ $p->tempat }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-700">
                                                {{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        {{ $p->tingkat === 'internasional'
                                            ? 'bg-purple-100 text-purple-800'
                                            : ($p->tingkat === 'nasional'
                                                ? 'bg-blue-100 text-blue-800'
                                                : ($p->tingkat === 'regional'
                                                    ? 'bg-green-100 text-green-800'
                                                    : 'bg-gray-100 text-gray-800')) }}">
                                                {{ ucfirst($p->tingkat) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($p->juara)
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            {{ str_contains(strtolower($p->juara), '1') || str_contains(strtolower($p->juara), 'satu')
                                                ? 'bg-yellow-100 text-yellow-800'
                                                : (str_contains(strtolower($p->juara), '2') || str_contains(strtolower($p->juara), 'dua')
                                                    ? 'bg-gray-100 text-gray-800'
                                                    : (str_contains(strtolower($p->juara), '3') || str_contains(strtolower($p->juara), 'tiga')
                                                        ? 'bg-orange-100 text-orange-800'
                                                        : 'bg-blue-100 text-blue-800')) }}">
                                                    {{ $p->juara }}
                                                </span>
                                            @else
                                                <span class="text-sm text-gray-400">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada prestasi</h3>
                        <p class="mt-1 text-sm text-gray-500">Mahasiswa ini belum memiliki prestasi yang tercatat dalam
                            sistem.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
