@extends('admin.layouts.app')

@section('title', 'Create')

@section('content')
    <div class="container mx-auto p-4 max-w-lg">

        <h1 class="text-xl font-bold mb-4">Tambah Bidang</h1>

        <form id="form-create" action="{{ url('admin/bidang/store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Kode Bidang --}}
            <label for="kode" class="block mb-1">Kode</label>
            <input type="text" name="kode" id="kode" class="w-full mb-3 p-2 border rounded"
                value="{{ old('kode') }}">
            @error('kode')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Nama Bidang --}}
            <label for="nama" class="block mb-1">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full mb-3 p-2 border rounded"
                value="{{ old('nama') }}">
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

    {{-- Tampilkan Pesan SweetAlert jika error --}}
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonText: 'OK'
            });
        </script>
    @endif

@endsection
