@extends('admin.layouts.app')

@section('title', 'Edit Bidang')

@section('content')
    <div class="container mx-auto p-4 max-w-lg">
    <div class="container mx-auto p-4 max-w-lg">

        <h1 class="text-xl font-bold mb-4">Edit Bidang</h1>

        <form id="form-edit" action="{{ url('admin/bidang/update/' . $bidang->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <form id="form-edit" action="{{ url('admin/bidang/update/' . $bidang->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Kode --}}
            <label for="kode" class="block mb-1">Kode</label>
            <input type="text" name="kode" id="kode" class="w-full mb-3 p-2 border rounded"
                value="{{ old('kode', $bidang->kode) }}">
            @error('kode')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Nama Bidang --}}
            <label for="nama" class="block mb-1">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full mb-3 p-2 border rounded"
                value="{{ old('nama', $bidang->nama) }}">
            @error('nama')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Submit --}}
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan
                Perubahan</button>
        </form>
    </div>
           

    {{-- SweetAlert --}}
    <script>
        document.getElementById('form-edit').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin ingin menyimpan perubahan?',
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
