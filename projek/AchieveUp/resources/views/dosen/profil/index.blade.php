@extends('dosen.layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="space-y-8">
        <div class="w-full p-6 bg-gradient-to-r from-blue-50 to-indigo-100 border border-indigo-200 rounded-xl shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-indigo-800 flex items-center gap-2">
                <svg class="w-7 h-7 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.657 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Profil Pengguna
            </h1>
            {{-- Tombol Edit Profil --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('dosen.profil.edit') }}"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l2.121 2.121a2.828 2.828 0 010 4l-9.192 9.192a1.414 1.414 0 01-.707.293H5a1 1 0 01-1-1v-3.084a1.414 1.414 0 01.293-.707l9.192-9.192a2.828 2.828 0 014 0z" />
                    </svg>
                    Edit Profil
                </a>
            </div>
            <div class="flex items-center gap-6">
                <div
                    class="w-28 h-28 rounded-full border-4 border-indigo-300 shadow-md overflow-hidden bg-white flex items-center justify-center">
                    <img src="{{ $dosen['foto'] ?? asset('images/default-user.png') }}"
                        onerror="this.onerror=null;this.src='{{ asset('images/default-user.png') }}';" alt="User Image"
                        class="w-full h-full object-cover">
                </div>
                <div class="ml-2 flex flex-col gap-2">
                    <h2 class="text-lg font-semibold text-indigo-700 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 01-8 0 4 4 0 018 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ $dosen['username'] ?? 'Username' }}
                    </h2>
                    <h2 class="text-xl font-bold text-gray-800">{{ $dosen['nama'] ?? 'Nama Pengguna' }}</h2>
                    <p class="text-gray-600 flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 12a4 4 0 01-8 0m8 0a4 4 0 01-8 0m8 0V8a4 4 0 00-8 0v4m8 0v4a4 4 0 01-8 0v-4" />
                        </svg>
                        {{ $dosen['email'] ?? 'Email Pengguna' }}
                    </p>
                    <span
                        class="inline-block px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-semibold mt-1">
                        {{ $dosen['role'] ?? 'Role Pengguna' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection
