@extends('admin.layouts.app')

@section('title', 'Create')

@section('content')
    <div class="container mx-auto p-4 max-w-lg">

        <h1 class="text-xl font-bold mb-4">Tambah Periode</h1>

        <form id="form-create" action="{{ url('admin/periode/store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Kode Periode --}}
            <label for="kode" class="block mb-1">Kode</label>
            <input type="text" name="kode" id="kode" class="w-full mb-3 p-2 border rounded"
                value="{{ old('kode') }}" placeholder="Contoh: 2024-1">
            @error('kode')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Nama Periode --}}
            <label for="nama" class="block mb-1">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full mb-3 p-2 border rounded"
                value="{{ old('nama') }}" placeholder="Format: 2024/2025 ganjil">
            @error('nama')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Submit --}}
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>
    {{-- SweetAlert --}}
    <script>
        document.getElementById('form-create').addEventListener('submit', function(e) {
            e.preventDefault();

            const kodeInput = document.getElementById('kode');
            const regex = /^\d{4}\-\d{1}$/;

            if (!regex.test(kodeInput.value)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format Tidak Valid',
                    text: 'Gunakan format: 2024-1'
                });
                return;
            }

            const namaInput = document.getElementById('nama');
            const regex = /^\d{4}\/\d{4} (ganjil|genap)$/;

            if (!regex.test(namaInput.value)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format Tidak Valid',
                    text: 'Gunakan format: 2024/2025 ganjil atau 2024/2025 genap'
                });
                return;
            }

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

    
    {{-- <script>
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
    </script> --}}
@endsection
