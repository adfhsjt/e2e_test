@extends('admin.layouts.app')

@section('title', 'Edit')

@section('content')
    <div class="container mx-auto p-4 max-w-lg">

        <h1 class="text-xl font-bold mb-4">Edit Periode</h1>

        <form id="form-edit" action="{{ url('admin/periode/update/' . $periode->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Kode periode --}}
            <label for="kode" class="block mb-1">Kode</label>
            <input type="text" name="kode" id="kode" class="w-full mb-3 p-2 border rounded"
                value="{{ old('kode', $periode->kode) }}">
            @error('kode')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Nama periode --}}
            <label for="nama" class="block mb-1">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full mb-3 p-2 border rounded"
                value="{{ old('nama', $periode->nama) }}">
            @error('nama')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Keterangan --}}
            {{-- Status (Tidak Bisa Diedit) --}}
            <label for="status" class="block mb-1 font-medium text-gray-700">Status</label>
            <input type="text" id="status" 
                class="w-full mb-3 p-2 border border-gray-300 rounded bg-gray-200 text-gray-600 cursor-not-allowed" 
                value="{{ $periode->is_active ? 'Aktif' : 'Tidak Aktif' }}" disabled>
            @error('nama')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Submit --}}
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>

    {{-- SweetAlert --}}
    <script>
        document.getElementById('form-edit').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin ingin mengupdate data ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, update',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            });
        });
    </script>
@endsection