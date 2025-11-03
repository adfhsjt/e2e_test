@extends('dosen.layouts.app')

@section('title', 'Detail Lomba')

@section('content')

<div class="mx-auto max-w-full h-full flex flex-col">
    <h1 class="text-xl font-bold mb-4">{{ Str::after($page->title, 'Detail lomba: ') }}</h1>

    <div class="bg-white shadow rounded border border-gray-200 p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 text-sm text-gray-800">

            {{-- Kolom Poster --}}
            <div class="md:col-span-3">
                @if ($lomba->file_poster)
                    <img src="{{ asset('storage/posters/' . $lomba->file_poster) }}" alt="Poster Lomba"
                        class="rounded shadow w-full object-cover">
                @else
                    <div class="text-gray-500 italic">Tidak ada poster</div>
                @endif
            </div>

            <div class="md:col-span-9 grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
                <div class="flex">
                    <div class="w-48 font-medium text-gray-600">Judul</div>
                    <div>: {{ $lomba->judul }}</div>
                </div>

                <div class="flex">
                    <div class="w-48 font-medium text-gray-600">Tempat</div>
                    <div>: {{ $lomba->tempat }}</div>
                </div>

                <div class="flex">
                    <div class="w-48 font-medium text-gray-600">Tanggal Daftar Mulai</div>
                    <div>: {{ $lomba->tanggal_daftar->translatedFormat('d M Y') }}</div>
                </div>

                <div class="flex">
                    <div class="w-48 font-medium text-gray-600">Tanggal Daftar Terakhir</div>
                    <div>: {{ $lomba->tanggal_daftar_terakhir->translatedFormat('d M Y') }}</div>
                </div>

                <div class="flex">
                    <div class="w-48 font-medium text-gray-600">URL Pendaftaran</div>
                    <div>: 
                        <a href="{{ $lomba->url }}" class="text-blue-600 underline" target="_blank">{{ $lomba->url }}</a>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-48 font-medium text-gray-600">Tingkat</div>
                    <div>:
                        @php
                            $tingkat = strtolower($lomba->tingkat);
                            $class = match($tingkat) {
                                'nasional' => 'px-1 py-1 rounded text-xs font-semibold bg-blue-100 text-blue-800',
                                'internasional' => 'px-1 py-1 rounded text-xs font-semibold bg-red-100 text-red-800',
                                'provinsi' => 'px-1 py-1 rounded text-xs font-semibold bg-yellow-100 text-yellow-800',
                                'regional' => 'px-1 py-1 rounded text-xs font-semibold bg-green-100 text-green-800',
                                default => 'px-1 py-1 rounded text-xs font-semibold bg-gray-100 text-gray-800',
                            };
                        @endphp
                        <span class="{{ $class }}">{{ ucfirst($lomba->tingkat) }}</span>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-48 font-medium text-gray-600">Jenis Lomba</div>
                    <div>:
                        @if ($lomba->is_individu) Individu @endif
                        @if ($lomba->is_individu && $lomba->is_akademik) , @endif
                        @if ($lomba->is_akademik) Akademik @endif
                        @if (!$lomba->is_individu && !$lomba->is_akademik) Tidak ada jenis lomba yang dipilih @endif
                    </div>
                </div>

                <div class="flex">
                    <div class="w-48 font-medium text-gray-600">Status</div>
                    <div>: {{ $lomba->is_active ? 'Aktif' : 'Tidak Aktif' }}</div>
                </div>

                <div class="flex md:col-span-2">
                    <div class="w-48 font-medium text-gray-600">Bidang</div>
                    <div>:
                        @if ($lomba->bidang && $lomba->bidang->count())
                            {{ $lomba->bidang->pluck('nama')->implode(', ') }}
                        @else
                            Tidak ada bidang
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div>
        <a href="{{ route('dosen.lomba.index') }}" class="text-blue-600 hover:underline text-sm">Kembali</a>
    </div>
</div>
@endsection
