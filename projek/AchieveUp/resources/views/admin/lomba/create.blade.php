@extends('admin.layouts.app')

@section('title', 'Create')

@section('content')
    <div class="container mx-auto max-w-7xl p-6">
        <div class="bg-white shadow-md rounded-lg p-8">
            <form id="form-create" action="{{ url('admin/lomba/store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Judul Lomba --}}
                    <div>
                        <label for="judul" class="block text-sm font-semibold mb-2 text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul" class="input" value="{{ old('judul') }}" />
                        @error('judul')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tempat --}}
                    <div>
                        <label for="tempat" class="block text-sm font-semibold mb-2 text-gray-700">Tempat</label>
                        <input type="text" name="tempat" id="tempat" class="input" value="{{ old('tempat') }}" />
                        @error('tempat')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Daftar --}}
                    <div>
                        <label for="tanggal_daftar" class="block text-sm font-semibold mb-2 text-gray-700">Tanggal
                            Daftar</label>
                        <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="input"
                            value="{{ old('tanggal_daftar') }}" />
                        @error('tanggal_daftar')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Daftar Terakhir --}}
                    <div>
                        <label for="tanggal_daftar_terakhir" class="block text-sm font-semibold mb-2 text-gray-700">Tanggal
                            Daftar Terakhir</label>
                        <input type="date" name="tanggal_daftar_terakhir" id="tanggal_daftar_terakhir" class="input"
                            value="{{ old('tanggal_daftar_terakhir') }}" />
                        @error('tanggal_daftar_terakhir')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- URL Pendaftaran --}}
                    <div>
                        <label for="url" class="block text-sm font-semibold mb-2 text-gray-700">URL Pendaftaran</label>
                        <input type="url" name="url" id="url" class="input" value="{{ old('url') }}" />
                        @error('url')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tingkat --}}
                    <div>
                        <label for="tingkat" class="block text-sm font-semibold mb-2 text-gray-700">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="input">
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="internasional">Internasional</option>
                            <option value="nasional">Nasional</option>
                            <option value="regional">Regional</option>
                            <option value="provinsi">Provinsi</option>
                        </select>
                        @error('tingkat')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold mb-2 text-gray-700">Jenis Peserta</label>
                        <div class="flex gap-6">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="is_individu" value="1" class="form-radio text-blue-600"
                                    {{ old('is_individu', '1') == '1' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-800">Individu</span>
                            </label>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="is_individu" value="0" class="form-radio text-blue-600"
                                    {{ old('is_individu') == '0' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-800">Kelompok</span>
                            </label>
                        </div>
                        @error('is_individu')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold mb-2 text-gray-700">Jenis Kompetisi</label>
                        <div class="flex gap-6">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="is_akademik" value="1" class="form-radio text-blue-600"
                                    {{ old('is_akademik', '1') == '1' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-800">Akademik</span>
                            </label>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="is_akademik" value="0" class="form-radio text-blue-600"
                                    {{ old('is_akademik') == '0' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-800">Non-Akademik</span>
                            </label>
                        </div>
                        @error('is_akademik')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- File Poster --}}
                    <div x-data="fileUpload()" class="">
                        <label for="file_poster" class="block text-sm font-semibold mb-2 text-gray-700">File Poster</label>

                        <div x-ref="dropzone"
                            class="flex flex-col items-center justify-center text-gray-500 border-2 border-dashed border-gray-300 rounded-lg h-56 cursor-pointer bg-gray-50 hover:bg-gray-100 transition"
                            @dragover.prevent="$refs.dropzone.classList.add('border-blue-400')"
                            @dragleave.prevent="$refs.dropzone.classList.remove('border-blue-400')"
                            @drop.prevent="handleDrop($event)" @click="$refs.fileInput.click()">
                            <template x-if="previewUrl">
                                <img :src="previewUrl" alt="Preview Image"
                                    class="max-h-40 object-contain mb-2 rounded" />
                            </template>
                            <template x-if="!previewUrl">
                                <div class="text-center px-4">
                                    <i class="fas fa-cloud-upload-alt text-3xl mb-2 text-blue-500"></i>
                                    <p class="text-sm">Tarik dan lepas file di sini atau klik untuk memilih</p>
                                    <p class="text-xs text-gray-400">Format JPG/PNG, maks 5MB</p>
                                </div>
                            </template>

                            <input type="file" name="file_poster" id="file_poster" accept=".jpg,.jpeg,.png"
                                class="hidden" x-ref="fileInput" @change="handleFile($event)" />
                        </div>

                        <template x-if="fileName && previewUrl">
                            <p class="text-sm text-green-600 mt-2 font-medium" x-text="fileName"></p>
                        </template>

                        <template x-if="errorMsg">
                            <p class="text-red-600 text-xs mt-1" x-text="errorMsg"></p>
                        </template>

                        @error('file_poster')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Dropdown Bidang --}}
                    <div x-data="bidangDropdown()" class="md:col-span-3">
                        <label for="bidang" class="block text-sm font-semibold mb-2 text-gray-700">Bidang</label>

                        {{-- Dropdown --}}
                        <select id="bidang" @change="addSelected($event)" class="input">
                            <option value="">-- Pilih Bidang --</option>
                            @foreach ($bidangs as $bidang)
                                <option value="{{ $bidang->id }}" data-nama="{{ $bidang->nama }}">{{ $bidang->nama }}
                                </option>
                            @endforeach
                        </select>

                        {{-- Badge-style selected bidang --}}
                        <div class="flex flex-wrap gap-2 mt-3">
                            <template x-for="(item, index) in selected" :key="item.id">
                                <span
                                    class="inline-flex items-center bg-[#F0EDFB] text-green-800 px-3 py-1 rounded-full text-sm pl-[20px] relative">
                                    <span x-text="item.nama"></span>
                                    <button type="button"
                                        class="flex h-[32px] w-[32px] items-center justify-center rounded-full text-red-500 transition hover:text-red-700 focus:outline-none ml-2"
                                        @click="removeSelected(item.id)" title="Hapus">
                                        <i class="fas fa-times text-[14px]"></i>
                                    </button>
                                    <input type="hidden" :name="'bidang[]'" :value="item.id">
                                </span>
                            </template>
                        </div>

                        {{-- Error --}}
                        @error('bidang')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-3 rounded-md focus:outline-none focus:ring-4 focus:ring-blue-400 mt-6">
                    Simpan
                </button>
            </form>
        </div>
    </div>

    <script>
        function bidangDropdown() {
            return {
                selected: [],
                addSelected(event) {
                    const option = event.target.options[event.target.selectedIndex];
                    const id = option.value;
                    const nama = option.getAttribute('data-nama');

                    if (!id || this.selected.some(item => item.id === id)) return;

                    this.selected.push({
                        id,
                        nama
                    });
                    event.target.selectedIndex = 0;
                },
                removeSelected(id) {
                    this.selected = this.selected.filter(item => item.id !== id);
                }
            };
        }
    </script>

    <script>
        function fileUpload() {
            return {
                fileName: '',
                previewUrl: '',
                errorMsg: '',
                handleFile(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    const validTypes = ['image/jpeg', 'image/png'];
                    if (!validTypes.includes(file.type)) {
                        this.errorMsg = 'Format file harus JPG atau PNG.';
                        this.clearFile();
                        return;
                    }

                    if (file.size > 5 * 1024 * 1024) {
                        this.errorMsg = 'Ukuran file maksimal 5MB.';
                        this.clearFile();
                        return;
                    }

                    this.errorMsg = '';
                    this.fileName = file.name;
                    this.previewUrl = URL.createObjectURL(file);
                },
                handleDrop(event) {
                    const files = event.dataTransfer.files;
                    if (files.length === 0) return;

                    const fileInput = this.$refs.fileInput;
                    const file = files[0];

                    const validTypes = ['image/jpeg', 'image/png'];
                    if (!validTypes.includes(file.type)) {
                        this.errorMsg = 'Format file harus JPG atau PNG.';
                        this.clearFile();
                        return;
                    }

                    if (file.size > 5 * 1024 * 1024) {
                        this.errorMsg = 'Ukuran file maksimal 5MB.';
                        this.clearFile();
                        return;
                    }

                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;

                    this.errorMsg = '';
                    this.fileName = file.name;
                    this.previewUrl = URL.createObjectURL(file);
                },
                clearFile() {
                    this.fileName = '';
                    this.previewUrl = '';
                    this.$refs.fileInput.value = '';
                }
            }
        }
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
