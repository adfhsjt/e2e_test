@extends('admin.layouts.app')

@section('title', 'Create')

@section('content')
    <div class="container mx-auto p-4 max-w-lg">

        <h1 class="text-xl font-bold mb-4">Tambah {{ ucfirst($type) }}</h1>

        <form id="form-create" action="{{ url('admin/users/store') }}" method="POST" enctype="multipart/form-data"
            onsubmit="return confirmSubmit(this)">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">

            @if ($type === 'mahasiswa')

                <label for="nim" class="block mb-1">NIM</label>
                <input type="text" name="nim" id="nim" class="w-full mb-3 p-2 border rounded"
                    value="{{ old('nim') }}">
                @error('nim')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="nama" class="block mb-1">Nama Mahasiswa</label>
                <input type="text" name="nama" id="nama" class="w-full mb-3 p-2 border rounded"
                    value="{{ old('nama') }}">
                @error('nama')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="username" class="block mb-1">Username</label>
                <input type="text" name="username" id="username" class="w-full mb-3 p-2 border rounded"
                    value="{{ old('username') }}">
                @error('username')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="email" class="block mb-1">Email</label>
                <input type="email" name="email" id="email" class="w-full mb-3 p-2 border rounded"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="password" class="block mb-1">Password</label>
                <input type="password" name="password" id="password" class="w-full mb-3 p-2 border rounded">
                @error('password')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="password_confirmation" class="block mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full mb-3 p-2 border rounded">
                @error('password')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="program_studi" class="block mb-1">Program Studi</label>
                <select name="program_studi_id" id="program_studi_id" class="w-full mb-3 p-2 border rounded">
                    <option value="">-- Pilih Program Studi --</option>
                    @foreach ($programStudis as $prodi)
                        <option value="{{ $prodi->id }}" {{ old('program_studi') == $prodi->id ? 'selected' : '' }}>
                            {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
                @error('program_studi')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="foto" class="block mb-1">Foto Mahasiswa (optional)</label>
                <input type="file" name="foto" id="foto" class="w-full mb-4 p-2 border rounded">
                @error('foto')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror
            @elseif($type === 'dosen')
                <label for="nidn">NIDN</label>
                <input type="text" name="nidn" value="{{ old('nidn') }}" class="w-full mb-2 border p-2 rounded">
                @error('nidn')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label for="username">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" class="w-full mb-2 border p-2 rounded">
                @error('username')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label for="nama">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="w-full mb-2 border p-2 rounded">
                @error('nama')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full mb-2 border p-2 rounded">
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label for="password">Password</label>
                <input type="password" name="password" class="w-full mb-2 border p-2 rounded">
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full mb-2 border p-2 rounded">
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror


                <label for="foto">Foto (Opsional)</label>
                <input type="file" name="foto" class="w-full mb-2 border p-2 rounded">
                @error('foto')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label for="role">Role</label>
                <select name="role" class="w-full mb-4 p-2 border rounded">
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="kajur" {{ old('role') == 'kajur' ? 'selected' : '' }}>Kajur</option>
                </select>
                @error('role')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            @endif

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </form>

    </div>

    <script>
        const form = document.getElementById('form-create');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin ingin menambahkan data ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ session('error') }}",
            });
        @endif
    </script>
@endsection
