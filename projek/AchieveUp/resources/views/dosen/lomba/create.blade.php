@extends('dosen.layouts.app')

@section('title', 'Create')

@section('content')
    <div class="mx-auto max-w-full h-full flex flex-col">

        <form id="form-create" action="{{ route('dosen.lomba.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow rounded border border-gray-200 p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-800">

                <div class="flex flex-col gap-4">
                    {{-- Judul --}}
                    <div>
                        <label for="judul" class="block mb-1 font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul" class="input max-w-[600px] p-2 border rounded"
                            value="{{ old('judul') }}">
                        @error('judul')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tempat --}}
                    <div>
                        <label for="tempat" class="block mb-1 font-medium text-gray-700">Tempat</label>
                        <input type="text" name="tempat" id="tempat" class="input max-w-[600px] p-2 border rounded"
                            value="{{ old('tempat') }}">
                        @error('tempat')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tingkat --}}
                    <div>
                        <label for="tingkat" class="block mb-1 font-medium text-gray-700">Tingkat</label>
                        <select name="tingkat" id="tingkat"
                            class="input max-w-[600px] p-2 border rounded text-gray-500"
                            onchange="this.classList.remove('text-gray-500')">
                            <option value="" disabled {{ old('tingkat') ? '' : 'selected' }} hidden>-- Pilih Tingkat --</option>
                            <option value="internasional" {{ old('tingkat') == 'internasional' ? 'selected' : '' }}>Internasional</option>
                            <option value="nasional" {{ old('tingkat') == 'nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="regional" {{ old('tingkat') == 'regional' ? 'selected' : '' }}>Regional</option>
                            <option value="provinsi" {{ old('tingkat') == 'provinsi' ? 'selected' : '' }}>Provinsi</option>
                        </select>
                        @error('tingkat')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div class="flex flex-col gap-4">
                    {{-- Tanggal Daftar --}}
                    <div>
                        <label for="tanggal_daftar" class="block mb-1 font-medium text-gray-700">Tanggal Daftar</label>
                        <input type="date" name="tanggal_daftar" id="tanggal_daftar"
                            class="input max-w-[600px] p-2 border rounded text-gray-500"
                            onchange="this.classList.remove('text-gray-500')"
                            value="{{ old('tanggal_daftar') }}">
                        @error('tanggal_daftar')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Daftar Terakhir --}}
                    <div>
                        <label for="tanggal_daftar_terakhir" class="block mb-1 font-medium text-gray-700">Tanggal Daftar Terakhir</label>
                        <input type="date" name="tanggal_daftar_terakhir" id="tanggal_daftar_terakhir"
                            class="input max-w-[600px] p-2 border rounded text-gray-500"
                            onchange="this.classList.remove('text-gray-500')"
                            value="{{ old('tanggal_daftar_terakhir') }}">
                        @error('tanggal_daftar_terakhir')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- URL Pendaftaran --}}
                    <div>
                        <label for="url" class="block mb-1 font-medium text-gray-700">URL Pendaftaran</label>
                        <input type="url" name="url" id="url" class="input max-w-[600px] p-2 border rounded"
                            value="{{ old('url') }}">
                        @error('url')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Jenis Lomba --}}
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Jenis Lomba</label>
                    <div class="flex flex-col gap-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_individu" value="1" class="mr-2"
                                {{ old('is_individu') ? 'checked' : '' }}>
                            Individu
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_akademik" value="1" class="mr-2"
                                {{ old('is_akademik') ? 'checked' : '' }}>
                            Akademik
                        </label>
                    </div>
                </div>

                {{-- Status Aktif --}}
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Status Aktif</label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" value="1" class="mr-2"
                            {{ old('is_active', true) ? 'checked' : '' }}>
                        Aktif
                    </label>
                </div>

                {{-- File Poster --}}
                <div class="md:col-span-2">
                    <label for="file_poster" class="block mb-1 font-medium text-gray-700">File Poster</label>
                    <input type="file" name="file_poster" id="file_poster" class="input w-full p-2 border rounded">
                    @error('file_poster')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bidang (Single Select) --}}
                <div class="md:col-span-2">
                    <label for="bidang" class="block mb-1">Bidang</label>
                    <select name="bidang[]" id="bidang" class="w-full mb-2 p-2 border rounded select2" multiple="multiple">
                        @foreach ($bidangs as $bidang)
                            <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                        @endforeach
                    </select>
                    @error('bidang')
                        <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                    @enderror

                    {{-- Container untuk menampilkan tag yang dipilih --}}
                    <div id="selected-tags" class="flex flex-wrap gap-2 mt-2">
                        {{-- Tag akan ditampilkan di sini --}}
                    </div>
                </div>
                
            </div>

            {{-- Tombol Submit --}}
            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            $('#bidang').select2({
                placeholder: "Pilih bidang lomba",
                tags: true,
                width: '100%'
            });
        });
    </script>

    <script>
        document.getElementById('form-create').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin ingin menambahkan data ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            });
        });
    </script>

@endsection
