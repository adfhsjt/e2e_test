@extends('admin.layouts.app')
@section('title', 'Update Dosen')
@section('content')

    <div class="container mx-auto p-6">
        <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6">
            <h1 class="text-xl font-bold mb-6">Update Dosen</h1>

            <form action="{{ url('admin/users/dosen/' . $dosen->id . '/update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="flex flex-col items-center space-y-4">
                        <label for="foto" class="block text-sm font-medium text-gray-700 text-center">Foto Profil
                            (Opsional)</label>

                        <div
                            class="relative w-28 h-28 overflow-hidden rounded-lg border border-gray-300 shadow-sm bg-white">
                            @if ($dosen->foto)
                                <img src="{{ asset($dosen->foto) }}" alt="Foto Saat Ini" class="w-full h-full object-cover">
                            @else
                                <div
                                    class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400 text-sm font-medium">
                                    Tidak ada foto
                                </div>
                            @endif
                        </div>

                        <div class="flex flex-col items-center space-y-2 w-full max-w-xs">
                            <input type="file" name="foto" id="foto" accept="image/*" class="hidden" />

                            <label for="foto"
                                class="bg-primary text-white px-4 py-2 rounded-md text-sm font-medium cursor-pointer hover:bg-[#4B30AA] transition duration-200 w-fit text-center">
                                Choose File
                            </label>

                            <span id="fileName" class="text-sm text-gray-600 truncate w-full text-center">
                                {{ $dosen->foto ? basename($dosen->foto) : 'Tidak ada file dipilih' }}
                            </span>

                            @error('foto')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="nidn" class="block text-sm font-medium text-gray-700 mb-1">NIDN</label>
                            <input type="text" name="nidn" id="nidn" value="{{ old('nidn', $dosen->nidn) }}"
                                class="input">
                            @error('nidn')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $dosen->nama) }}"
                                class="input">
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" name="username" id="username"
                                value="{{ old('username', $dosen->username) }}" class="input">
                            @error('username')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $dosen->email) }}"
                                class="input">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru
                                (Opsional)</label>
                            <input type="password" name="password" id="password" class="input">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="input">
                        </div>

                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                            <div class="relative">
                                <select name="role" id="role" class="input appearance-none block w-full pr-10">
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role', $dosen->role) == 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="kajur" {{ old('role', $dosen->role) == 'kajur' ? 'selected' : '' }}>
                                        Kajur</option>
                                    <option value="dosen pembimbing"
                                        {{ old('role', $dosen->role) == 'dosen pembimbing' ? 'selected' : '' }}>Dosen
                                        Pembimbing</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </div>
                            </div>
                            @error('role')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="button-primary-medium">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ session('error') }}",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    <script>
        document.getElementById('foto')?.addEventListener('change', function() {
            const fileName = this.files[0]?.name || 'Tidak ada file dipilih';
            document.getElementById('fileName').textContent = fileName;
        });
    </script>

@endsection
