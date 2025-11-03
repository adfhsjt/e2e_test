@extends('mahasiswa.layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <div class="max-w-xl mx-auto mt-8 bg-white p-8 rounded-xl shadow-lg border border-indigo-100">
        <h1 class="text-2xl font-bold text-indigo-700 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.862 4.487l2.121 2.121a2.828 2.828 0 010 4l-9.192 9.192a1.414 1.414 0 01-.707.293H5a1 1 0 01-1-1v-3.084a1.414 1.414 0 01.293-.707l9.192-9.192a2.828 2.828 0 014 0z" />
            </svg>
            Edit Profil
        </h1>
        <form action="{{ route('mahasiswa.profil.update', $mahasiswa['id']) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                <input type="file" name="foto" accept="image/*"
                    class="block w-full text-sm text-gray-600 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                @if (isset($mahasiswa['foto']))
                    <img src="{{ $mahasiswa['foto'] }}" alt="Foto Profil"
                        class="w-20 h-20 rounded-full mt-2 object-cover border border-indigo-200">
                @endif
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" value="{{ old('username', $mahasiswa['username'] ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                    required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $mahasiswa['nama'] ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                    required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $mahasiswa['email'] ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                    required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <input type="text" name="role" value="{{ old('role', $mahasiswa['role'] ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100" readonly>
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('mahasiswa.profil.index') }}"
                    class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">Batal</a>
                <button type="submit"
                    class="px-6 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">Simpan</button>
            </div>
        </form>
    </div>
@endsection
