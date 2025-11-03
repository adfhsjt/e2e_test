@extends('mahasiswa.layouts.app')

@section('title', 'Update Prestasi')

@section('content')
    <div class="mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="col-span-2">
                <form action="{{ url('mahasiswa/prestasi/' . $prestasi->id . 'update/') }}" method="POST"
                    enctype="multipart/form-data" class="bg-white shadow rounded-[] p-6 space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Tanggal Pengajuan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengajuan</label>
                            <div class="mb-1 text-gray-600 text-md">
                                {{ \Illuminate\Support\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                            </div>
                            <input type="hidden" name="tanggal_pengajuan" value="{{ now()->format('Y-m-d') }}">
                        </div>

                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                            <input type="text" name="judul" value="{{ old('judul', $prestasi->judul) }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2" />
                        </div>

                        {{-- Tempat --}}
                        <div>
                            <label for="tempat" class="block text-sm font-medium text-gray-700 mb-1">Tempat</label>
                            <input type="text" name="tempat" id="tempat" required class="input"
                                value="{{ old('tempat', $prestasi->tempat) }}">
                        </div>

                        {{-- Tanggal Mulai --}}
                        <div>
                            <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                                value="{{ old('tanggal_mulai', $prestasi->tanggal_mulai) }}">
                        </div>

                        {{-- Tanggal Selesai --}}
                        <div>
                            <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                                value="{{ old('tanggal_selesai', $prestasi->tanggal_selesai) }}">
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <hr class="my-2 opacity-10">
                        </div>

                        {{-- URL --}}
                        <div>
                            <label for="url" class="block text-sm font-medium text-gray-700 mb-1">URL Lomba (Instagram,
                                web,
                                dll)</label>
                            <input type="url" name="url" id="url" class="input"
                                value="{{ old('url', $prestasi->url) }}">
                        </div>

                        {{-- Tingkat --}}
                        <div>
                            <label for="tingkat" class="block text-sm font-medium text-gray-700 mb-1">Tingkat</label>
                            <select name="tingkat" id="tingkat" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2">
                                <option value="">-- Pilih Tingkat --</option>
                                <option value="nasional"
                                    {{ old('tingkat', $prestasi->tingkat) == 'nasional' ? 'selected' : '' }}>Nasional
                                </option>
                                <option value="internasional"
                                    {{ old('tingkat', $prestasi->tingkat) == 'internasional' ? 'selected' : '' }}>
                                    Internasional</option>
                                <option value="regional"
                                    {{ old('tingkat', $prestasi->tingkat) == 'regional' ? 'selected' : '' }}>Regional
                                </option>
                                <option value="provinsi"
                                    {{ old('tingkat', $prestasi->tingkat) == 'provinsi' ? 'selected' : '' }}>Provinsi
                                </option>
                            </select>
                        </div>

                        {{-- Juara --}}
                        <div>
                            <label for="juara" class="block text-sm font-medium text-gray-700 mb-1">Juara</label>
                            <select name="juara" id="juara" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2">
                                <option value="">-- Pilih Juara --</option>
                                <option value="1" {{ old('juara', $prestasi->juara) == 1 ? 'selected' : '' }}>1
                                </option>
                                <option value="2" {{ old('juara', $prestasi->juara) == 2 ? 'selected' : '' }}>2
                                </option>
                                <option value="3" {{ old('juara', $prestasi->juara) == 3 ? 'selected' : '' }}>3
                                </option>
                            </select>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <hr class="my-2 opacity-10">
                        </div>

                        <div>
                            <label for="bidang" class="block text-sm font-medium text-gray-700 mb-1">Bidang
                                Prestasi</label>
                            <select name="bidang" id="bidang" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2">
                                <option value="">-- Pilih Bidang --</option>
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}"
                                        {{ old('bidang', $prestasi->bidang_id) == $bidang->id ? 'selected' : '' }}>
                                        {{ $bidang->nama }} ({{ $bidang->kode }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Individu/Kelompok -->
                        <div>
                            <div class="flex items-center mb-1">
                                <label class="block text-sm font-medium text-gray-700">Jenis Peserta</label>
                                <span class="ml-2 text-xs text-gray-400 cursor-pointer relative group">
                                    <i class="fas fa-info-circle"></i>
                                    <span
                                        class="absolute left-6 top-1/2 -translate-y-1/2 w-48 bg-gray-800 text-white text-xs rounded px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity z-20 shadow-lg pointer-events-none">
                                        Keterangan jenis peserta (Individu/Kelompok) akan ditampilkan di sini.
                                    </span>
                                </span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="is_individu" value="1"
                                        {{ old('is_individu', $prestasi->is_individu) == 1 ? 'checked' : '' }}
                                        class="mr-2">
                                    <span class="text-sm font-medium text-gray-700">Individu</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="is_individu" value="0"
                                        {{ old('is_individu', $prestasi->is_individu) == 0 ? 'checked' : '' }}
                                        class="mr-2">
                                    <span class="text-sm font-medium text-gray-700">Kelompok</span>
                                </label>
                            </div>
                        </div>

                        <!-- Akademik/Non Akademik -->
                        <div>
                            <div class="flex items-center mb-1">
                                <label class="block text-sm font-medium text-gray-700">Jenis Prestasi</label>
                                <span class="ml-2 text-xs text-gray-400 cursor-pointer relative group">
                                    <i class="fas fa-info-circle"></i>
                                    <span
                                        class="absolute left-6 top-1/2 -translate-y-1/2 w-48 bg-gray-800 text-white text-xs rounded px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity z-20 shadow-lg pointer-events-none">
                                        Keterangan jenis prestasi (Akademik/Non Akademik) akan ditampilkan di sini.
                                    </span>
                                </span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="is_akademik" value="1"
                                        {{ old('is_akademik', $prestasi->is_akademik) == 1 ? 'checked' : '' }}
                                        class="mr-2">
                                    <span class="text-sm font-medium text-gray-700">Akademik</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="is_akademik" value="0"
                                        {{ old('is_akademik', $prestasi->is_akademik) == 0 ? 'checked' : '' }}
                                        class="mr-2">
                                    <span class="text-sm font-medium text-gray-700">Non Akademik</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <hr class="my-2 opacity-10">
                        </div>

                        <div x-data="{
                            fileName: '{{ old('foto_kegiatan', $existingFileName) }}',
                            fileUrl: '{{ asset($existingFilePath) }}',
                            preview() {
                                if (this.fileUrl) {
                                    window.open(this.fileUrl, '_blank');
                                }
                            },
                            handleFileChange(e) {
                                const file = e.target.files[0];
                                if (file) {
                                    this.fileName = file.name;
                                    this.fileUrl = URL.createObjectURL(file);
                                } else {
                                    this.fileName = '';
                                    this.fileUrl = '';
                                }
                                updateFileLabel('foto_kegiatan');
                            }
                        }">
                            <label for="foto_kegiatan" class="block text-sm font-medium text-gray-700 mb-1">Foto Kegiatan
                                (jpg/png, optional)</label>
                            <div id="dropzone-foto-kegiatan"
                                class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg py-6 cursor-pointer transition hover:border-primary"
                                @click="$refs.fileInput.click();"
                                @dragover.prevent="event.currentTarget.classList.add('border-primary')"
                                @dragleave="event.currentTarget.classList.remove('border-primary')"
                                @drop.prevent="
                            if(event.dataTransfer.files.length > 0){
                                $refs.fileInput.files = event.dataTransfer.files;
                                handleFileChange({target: $refs.fileInput});
                            }
                            event.currentTarget.classList.remove('border-primary');
                        "
                                style="cursor: pointer;">
                                <span id="foto_kegiatan_label" class="mb-2 text-gray-500 select-none"
                                    style="cursor:pointer;" x-show="!fileName">Drag & drop file di sini atau</span>
                                <button type="button"
                                    class="px-4 py-2 bg-[#6041CE] text-white rounded shadow text-sm mb-2"
                                    style="cursor:pointer;" x-show="!fileName">Pilih File</button>
                                <input type="file" name="foto_kegiatan" id="foto_kegiatan"
                                    accept="image/jpeg,image/png" class="hidden" x-ref="fileInput"
                                    @change="handleFileChange($event)" />

                                <template x-if="fileName || fileUrl">
                                    <div
                                        class="flex items-center gap-2 mt-3 bg-gray-100 rounded px-3 py-2 w-full max-w-xs">
                                        <template x-if="fileUrl">
                                            <img :src="fileUrl" alt="Preview"
                                                class="h-8 w-8 object-cover rounded" />
                                        </template>
                                        <span class="truncate flex-1 text-sm"
                                            x-text="fileName || 'File yang sudah ada'"></span>
                                        <button type="button" @click="preview" class="text-blue-600 hover:text-blue-800"
                                            title="Preview" style="cursor:pointer;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button"
                                            @click="
                                        $refs.fileInput.value = '';
                                        fileName = '';
                                        fileUrl = '';
                                        updateFileLabel('foto_kegiatan');
                                    "
                                            class="text-red-500 hover:text-red-700" title="Hapus"
                                            style="cursor:pointer;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div x-data="{
                            fileName: '{{ old('file_poster', $existingPosterName) }}',
                            fileUrl: '{{ asset($existingPosterPath) }}',
                            preview() {
                                if (this.fileUrl) {
                                    window.open(this.fileUrl, '_blank');
                                }
                            },
                            handleFileChange(e) {
                                const file = e.target.files[0];
                                if (file) {
                                    this.fileName = file.name;
                                    this.fileUrl = URL.createObjectURL(file);
                                } else {
                                    this.fileName = '';
                                    this.fileUrl = '';
                                }
                                updateFileLabel('file_poster');
                            }
                        }">
                            <label for="file_poster" class="block text-sm font-medium text-gray-700 mb-1">File Poster
                                (jpg/png, optional)</label>
                            <div id="dropzone-poster"
                                class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg py-6 cursor-pointer transition hover:border-primary"
                                @click="$refs.fileInput.click();"
                                @dragover.prevent="event.currentTarget.classList.add('border-primary')"
                                @dragleave="event.currentTarget.classList.remove('border-primary')"
                                @drop.prevent="
                        if(event.dataTransfer.files.length > 0){
                            $refs.fileInput.files = event.dataTransfer.files;
                            handleFileChange({target: $refs.fileInput});
                        }
                        event.currentTarget.classList.remove('border-primary');
                    "
                                style="cursor: pointer;">
                                <span id="file_poster_label" class="mb-2 text-gray-500 select-none"
                                    style="cursor:pointer;" x-show="!fileName">Drag & drop file di sini atau</span>
                                <button type="button"
                                    class="px-4 py-2 bg-[#6041CE] text-white rounded shadow text-sm mb-2"
                                    style="cursor:pointer;" x-show="!fileName">Pilih File</button>
                                <input type="file" name="file_poster" id="file_poster" accept="image/jpeg,image/png"
                                    class="hidden" x-ref="fileInput" @change="handleFileChange($event)" />

                                <!-- Preview Card (muncul di bawah tombol, hanya jika ada file) -->
                                <template x-if="fileName || fileUrl">
                                    <div
                                        class="flex items-center gap-2 mt-3 bg-gray-100 rounded px-3 py-2 w-full max-w-xs">
                                        <template x-if="fileUrl">
                                            <img :src="fileUrl" alt="Preview"
                                                class="h-8 w-8 object-cover rounded" />
                                        </template>
                                        <span class="truncate flex-1 text-sm"
                                            x-text="fileName || 'File yang sudah ada'"></span>
                                        <button type="button" @click="preview" class="text-blue-600 hover:text-blue-800"
                                            title="Preview" style="cursor:pointer;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button"
                                            @click="
                                    $refs.fileInput.value = '';
                                    fileName = '';
                                    fileUrl = '';
                                    updateFileLabel('file_poster');
                                "
                                            class="text-red-500 hover:text-red-700" title="Hapus"
                                            style="cursor:pointer;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Garis pemisah -->
                        <div class="col-span-1 md:col-span-2">
                            <hr class="my-2 opacity-10">
                        </div>

                        <!-- Nomor Surat Tugas -->
                        <div>
                            <label for="nomor_surat_tugas" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                Surat Tugas</label>
                            <input type="text" name="nomor_surat_tugas" id="nomor_surat_tugas" required
                                class="input" value="{{ old('nomor_surat_tugas', $prestasi->nomor_surat_tugas) }}">
                        </div>

                        <!-- Tanggal Surat Tugas -->
                        <div>
                            <label for="tanggal_surat_tugas" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                Surat Tugas</label>
                            <input type="date" name="tanggal_surat_tugas" id="tanggal_surat_tugas" required
                                class="input" value="{{ old('tanggal_surat_tugas', $prestasi->tanggal_surat_tugas) }}">
                        </div>

                        <!-- File Surat Tugas -->
                        <div x-data="{
                            fileName: '{{ old('file_surat_tugas', $existingFileSuratTugas) }}',
                            fileUrl: '{{ $existingFileSuratTugasPath ? asset($existingFileSuratTugasPath) : '' }}',
                            hasExistingFile: {{ $existingFileSuratTugasPath ? 'true' : 'false' }},
                            preview() {
                                if (this.fileUrl) {
                                    window.open(this.fileUrl, '_blank');
                                }
                            },
                            handleFileChange(e) {
                                const file = e.target.files[0];
                                if (file) {
                                    this.fileName = file.name;
                                    this.fileUrl = URL.createObjectURL(file);
                                    this.hasExistingFile = false;
                                } else {
                                    this.fileName = '{{ $existingFileSuratTugas }}';
                                    this.fileUrl = '{{ $existingFileSuratTugasPath ? asset($existingFileSuratTugasPath) : '' }}';
                                    this.hasExistingFile = {{ $existingFileSuratTugasPath ? 'true' : 'false' }};
                                }
                                updateFileLabel('file_surat_tugas');
                            }
                        }">
                            <label for="file_surat_tugas" class="block text-sm font-medium text-gray-700 mb-1">File Surat
                                Tugas (.pdf)</label>
                            <div id="dropzone-surat-tugas"
                                class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg py-6 cursor-pointer transition hover:border-primary"
                                @click="$refs.fileInput.click();"
                                @dragover.prevent="event.currentTarget.classList.add('border-primary')"
                                @dragleave="event.currentTarget.classList.remove('border-primary')"
                                @drop.prevent="
            $refs.fileInput.files = event.dataTransfer.files;
            handleFileChange({target: $refs.fileInput});
            event.currentTarget.classList.remove('border-primary');
        ">
                                <span id="file_surat_tugas_label" class="mb-2 text-gray-500"
                                    x-show="!fileName && !hasExistingFile">Drag & drop file di sini atau</span>
                                <button type="button" class="px-4 py-2 bg-[#6041CE] text-white rounded shadow text-sm"
                                    x-show="!fileName && !hasExistingFile">Pilih File</button>
                                <input type="file" name="file_surat_tugas" id="file_surat_tugas"
                                    accept="application/pdf" class="hidden" x-ref="fileInput"
                                    @change="handleFileChange($event)" />
                                <input type="hidden" name="existing_file_surat_tugas"
                                    value="{{ $existingFileSuratTugasPath }}"
                                    x-bind:value="hasExistingFile ? '{{ $existingFileSuratTugasPath }}' : ''">

                                <!-- Preview Card -->
                                <template x-if="fileName || hasExistingFile">
                                    <div
                                        class="flex items-center gap-2 mt-3 bg-gray-100 rounded px-3 py-2 w-full max-w-xs">
                                        <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                                        <span class="truncate flex-1 text-sm"
                                            x-text="fileName || '{{ $existingFileSuratTugas }}'"></span>
                                        <button type="button" @click="preview" class="text-blue-600 hover:text-blue-800"
                                            title="Preview" aria-label="Preview file surat tugas">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button"
                                            @click="
                        $refs.fileInput.value = '';
                        fileName = '';
                        fileUrl = '';
                        hasExistingFile = false;
                        updateFileLabel('file_surat_tugas');
                    "
                                            class="text-red-500 hover:text-red-700" title="Hapus"
                                            aria-label="Hapus file surat tugas">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- File Sertifikat -->
                        <div x-data="{
                            fileName: '{{ old('file_sertifikat', $existingFileSertifikat) }}',
                            fileUrl: '{{ $existingFileSertifikatPath ? asset($existingFileSertifikatPath) : '' }}',
                            hasExistingFile: {{ $existingFileSertifikatPath ? 'true' : 'false' }},
                            preview() {
                                if (this.fileUrl) {
                                    window.open(this.fileUrl, '_blank');
                                }
                            },
                            handleFileChange(e) {
                                const file = e.target.files[0];
                                if (file) {
                                    this.fileName = file.name;
                                    this.fileUrl = URL.createObjectURL(file);
                                    this.hasExistingFile = false;
                                } else {
                                    this.fileName = '{{ $existingFileSertifikat }}';
                                    this.fileUrl = '{{ $existingFileSertifikatPath ? asset($existingFileSertifikatPath) : '' }}';
                                    this.hasExistingFile = {{ $existingFileSertifikatPath ? 'true' : 'false' }};
                                }
                                updateFileLabel('file_sertifikat');
                            }
                        }">
                            <label for="file_sertifikat" class="block text-sm font-medium text-gray-700 mb-1">File
                                Sertifikat (.pdf)</label>
                            <div id="dropzone-sertifikat"
                                class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg py-6 cursor-pointer transition hover:border-primary"
                                @click="$refs.fileInput.click();"
                                @dragover.prevent="event.currentTarget.classList.add('border-primary')"
                                @dragleave="event.currentTarget.classList.remove('border-primary')"
                                @drop.prevent="
            if(event.dataTransfer.files.length > 0){
                $refs.fileInput.files = event.dataTransfer.files;
                handleFileChange({target: $refs.fileInput});
            }
            event.currentTarget.classList.remove('border-primary');
        ">
                                <span id="file_sertifikat_label" class="mb-2 text-gray-500"
                                    x-show="!fileName && !hasExistingFile">Drag & drop file di sini atau</span>
                                <button type="button" class="px-4 py-2 bg-[#6041CE] text-white rounded shadow text-sm"
                                    x-show="!fileName && !hasExistingFile">Pilih File</button>
                                <input type="file" name="file_sertifikat" id="file_sertifikat"
                                    accept="application/pdf" class="hidden" x-ref="fileInput"
                                    @change="handleFileChange($event)" />
                                <input type="hidden" name="existing_file_sertifikat"
                                    value="{{ $existingFileSertifikatPath }}"
                                    x-bind:value="hasExistingFile ? '{{ $existingFileSertifikatPath }}' : ''">

                                <!-- Preview Card -->
                                <template x-if="fileName || hasExistingFile">
                                    <div
                                        class="flex items-center gap-2 mt-3 bg-gray-100 rounded px-3 py-2 w-full max-w-xs">
                                        <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                                        <span class="truncate flex-1 text-sm"
                                            x-text="fileName || '{{ $existingFileSertifikat }}'"></span>
                                        <button type="button" @click="preview" class="text-blue-600 hover:text-blue-800"
                                            title="Preview" aria-label="Preview file sertifikat">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button"
                                            @click="
                        $refs.fileInput.value = '';
                        fileName = '';
                        fileUrl = '';
                        hasExistingFile = false;
                        updateFileLabel('file_sertifikat');
                    "
                                            class="text-red-500 hover:text-red-700" title="Hapus"
                                            aria-label="Hapus file sertifikat">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Garis pemisah -->
                        <div class="col-span-1 md:col-span-2">
                            <hr class="my-2 opacity-10">
                        </div>

                        <!-- Mahasiswa yang Terlibat -->
                        <div x-data="{
                            query: '',
                            selected: [
                                @php $mhs = auth('mahasiswa')->user(); @endphp {
                                    id: {{ $mhs->id }},
                                    nama: '{{ $mhs->nama }}',
                                    nim: '{{ $mhs->nim }}'
                                }
                                @if (!$prestasi->is_individu) @foreach ($prestasi->mahasiswas as $m)
                @if ($m->id != $mhs->id)
                    ,{
                        id: {{ $m->id }},
                        nama: '{{ $m->nama }}',
                        nim: '{{ $m->nim }}'
                    } @endif
                                @endforeach
                                @endif
                            ],
                            isIndividu: {{ old('is_individu', $prestasi->is_individu) == 1 ? 'true' : 'false' }},
                            maxMahasiswa: 5,
                            init() {
                                this.$watch('isIndividu', (newValue) => {
                                    if (newValue) {
                                        this.selected = [{ id: {{ $mhs->id }}, nama: '{{ $mhs->nama }}', nim: '{{ $mhs->nim }}' }];
                                        this.query = '';
                                    }
                                });
                            },
                            filtered() {
                                const mahasiswas = {{ json_encode($mahasiswas) }} || [];
                                return mahasiswas.filter(item => {
                                    return (
                                        item.nama.toLowerCase().includes(this.query.toLowerCase()) ||
                                        item.nim.toLowerCase().includes(this.query.toLowerCase())
                                    ) && !this.selected.some(s => s.id === item.id);
                                }).slice(0, 10);
                            },
                            addStudent(item) {
                                if (this.isIndividu) {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan',
                                        text: 'Pada mode individu, hanya satu mahasiswa yang dapat dipilih.',
                                        showConfirmButton: true
                                    });
                                    return;
                                }
                                if (this.selected.length < this.maxMahasiswa) {
                                    this.selected.push(item);
                                    this.query = '';
                                } else {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan',
                                        text: 'Maksimum ' + this.maxMahasiswa + ' mahasiswa dapat dipilih.',
                                        showConfirmButton: true
                                    });
                                }
                            },
                            removeStudent(id) {
                                if (this.isIndividu) {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan',
                                        text: 'Pada mode individu, mahasiswa tidak dapat dihapus.',
                                        showConfirmButton: true
                                    });
                                    return;
                                }
                                if (id === {{ $mhs->id }}) {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan',
                                        text: 'Mahasiswa yang login tidak dapat dihapus.',
                                        showConfirmButton: true
                                    });
                                    return;
                                }
                                this.selected = this.selected.filter(i => i.id !== id);
                            }
                        }" class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mahasiswa yang Terlibat</label>
                            <input type="text" x-model="query" placeholder="Cari nama atau NIM..."
                                class="w-full border border-gray-300 rounded-lg px-4 py-2" :disabled="isIndividu">

                            <div class="mt-2 flex flex-wrap gap-2">
                                <template x-for="item in selected" :key="item.id">
                                    <span
                                        class="inline-flex items-center bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm pl-5 relative">
                                        <span x-text="item.nama + ' (' + item.nim + ')'"></span>
                                        <button type="button" :disabled="isIndividu || item.id === {{ $mhs->id }}"
                                            :class="['flex h-[32px] w-[32px] items-center justify-center rounded-full text-red-500 transition hover:text-red-700 focus:outline-none ml-2',
                                                (isIndividu || item.id === {{ $mhs->id }}) ?
                                                'cursor-not-allowed opacity-70' : 'cursor-pointer'
                                            ]"
                                            @click="removeStudent(item.id)" title="Hapus" aria-label="Hapus mahasiswa">
                                            <i class="fas fa-times text-[14px]"></i>
                                        </button>
                                    </span>
                                </template>
                            </div>

                            <ul x-show="query.length > 0 && filtered().length > 0"
                                class="mt-2 border rounded max-h-40 overflow-y-auto shadow-md bg-white z-10 absolute w-full">
                                <template x-for="item in filtered()" :key="item.id">
                                    <li @click="addStudent(item)"
                                        class="flex items-center justify-between px-3 py-2 hover:bg-blue-50 cursor-pointer rounded-md transition group">
                                        <div>
                                            <div x-text="item.nama" class="font-medium"></div>
                                            <small class="text-gray-500" x-text="item.nim"></small>
                                        </div>
                                        <button type="button"
                                            class="flex h-[32px] w-[32px] items-center justify-center rounded-full text-white bg-blue-500 opacity-0 group-hover:opacity-100 transition hover:bg-blue-600 focus:outline-none cursor-pointer"
                                            title="Pilih dan Tambahkan" aria-label="Tambahkan mahasiswa">
                                            <i class="fas fa-plus text-[14px]"></i>
                                        </button>
                                    </li>
                                </template>
                            </ul>

                            <template x-for="item in selected" :key="item.id">
                                <input type="hidden" name="mahasiswas[]" :value="item.id">
                            </template>
                        </div>

                        <!-- Dosen Pembimbing -->
                        <!-- Dosen Pembimbing -->
                        <div x-data="{
                            query: '',
                            selected: [
                                @if ($prestasi->dosens && $prestasi->dosens->isNotEmpty()) @foreach ($prestasi->dosens as $dosen)
            {
                id: {{ $dosen->id }},
                nama: '{{ addslashes($dosen->nama) }}',
                nidn: '{{ $dosen->nidn }}'
            }@if (!$loop->last), @endif
                                @endforeach
                                @endif
                            ],
                            maxDosen: 3,
                            filtered() {
                                const dosens = {{ json_encode($dosens) }} || [];
                                return dosens.filter(item => {
                                    return (
                                        item.nama.toLowerCase().includes(this.query.toLowerCase()) ||
                                        item.nidn.toLowerCase().includes(this.query.toLowerCase())
                                    ) && !this.selected.some(s => s.id === item.id);
                                }).slice(0, 10);
                            },
                            addDosen(item) {
                                if (this.selected.length < this.maxDosen) {
                                    this.selected.push(item);
                                    this.query = '';
                                } else {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan',
                                        text: 'Maksimum ' + this.maxDosen + ' dosen pembimbing dapat dipilih.',
                                        showConfirmButton: true
                                    });
                                }
                            },
                            removeDosen(id) {
                                this.selected = this.selected.filter(i => i.id !== id);
                            }
                        }" class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Dosen Pembimbing</label>
                            <input type="text" x-model="query" placeholder="Cari nama atau NIDN..."
                                class="w-full border border-gray-300 rounded-lg px-4 py-2">

                            <div class="mt-2 flex flex-wrap gap-2">
                                <template x-for="item in selected" :key="item.id">
                                    <span
                                        class="inline-flex items-center bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm pl-5 relative">
                                        <span x-text="item.nama + ' (' + item.nidn + ')'"></span>
                                        <button type="button"
                                            class="flex h-[32px] w-[32px] items-center justify-center rounded-full text-red-500 transition hover:text-red-700 focus:outline-none ml-2"
                                            @click="removeDosen(item.id)" title="Hapus"
                                            aria-label="Hapus dosen pembimbing">
                                            <i class="fas fa-times text-[14px]"></i>
                                        </button>
                                    </span>
                                </template>
                            </div>

                            <ul x-show="query.length > 0 && filtered().length > 0"
                                class="mt-2 border rounded max-h-40 overflow-y-auto shadow-md bg-white z-10 absolute w-full">
                                <template x-for="item in filtered()" :key="item.id">
                                    <li @click="addDosen(item)"
                                        class="flex items-center justify-between px-3 py-2 hover:bg-green-50 cursor-pointer rounded-md transition group">
                                        <div>
                                            <div x-text="item.nama" class="font-medium"></div>
                                            <small class="text-gray-500" x-text="item.nidn"></small>
                                        </div>
                                        <button type="button"
                                            class="flex h-[32px] w-[32px] items-center justify-center rounded-full text-white bg-green-500 opacity-0 group-hover:opacity-100 transition hover:bg-green-600 focus:outline-none cursor-pointer"
                                            title="Pilih dan Tambahkan" aria-label="Tambahkan dosen pembimbing">
                                            <i class="fas fa-plus text-[14px]"></i>
                                        </button>
                                    </li>
                                </template>
                            </ul>

                            <template x-for="item in selected" :key="item.id">
                                <input type="hidden" name="dosen_pembimbing[]" :value="item.id">
                            </template>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="button-primary-medium">
                            <i class="fas fa-save mr-2"></i>
                            <span>Ajukan</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Kolom Kanan: Catatan Penolakan -->
            <div class="col-span-1 space-y-6">
                @if ($prestasi->status === 'ditolak' && $prestasi->notes && count($prestasi->notes))
                    <div class="bg-white shadow-md rounded-xl p-5 border border-red-300">
                        <h4 class="text-lg font-semibold text-red-600 mb-3">Catatan Penolakan</h4>
                        <ul class="space-y-2 text-gray-900">
                            @php
                                $latestNotes = $prestasi->notes->slice(-2);
                            @endphp
                            @foreach ($latestNotes as $note)
                                <li class="border-b pb-2">
                                    <div
                                        class="inline-flex items-center gap-2 px-2 py-1 rounded text-xs font-semibold capitalize
                    {{ $note->status === 'disetujui'
                        ? 'bg-green-100 text-green-800'
                        : ($note->status === 'pending'
                            ? 'bg-gray-200 text-gray-900'
                            : ($note->status === 'ditolak'
                                ? 'bg-red-100 text-red-800'
                                : 'bg-gray-200 text-gray-900')) }}">
                                        {{ $note->status }}
                                    </div>

                                    {{-- Menampilkan Tanggal --}}
                                    <div class="text-xs text-gray-500 mt-1">
                                        {{ \Carbon\Carbon::parse($note->created_at)->format('d M Y, H:i') }}
                                    </div>

                                    {{-- Catatan --}}
                                    <div class="text-gray-600 mt-1">{{ $note->note }}</div>

                                    {{-- Dosen --}}
                                    <div class="text-xs text-gray-500 mt-1">Dosen: {{ $note->dosen->nama ?? 'N/A' }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="bg-white shadow-md rounded-xl p-5">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Catatan Penolakan</h4>
                        <p class="text-gray-500 text-sm">Tidak ada catatan penolakan.</p>
                    </div>
                @endif
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const individuRadio = document.querySelector('input[name="is_individu"][value="1"]');
                    const kelompokRadio = document.querySelector('input[name="is_individu"][value="0"]');
                    const mahasiswaAlpine = Alpine.$data(document.querySelector('[x-data*="maxMahasiswa"]'));

                    individuRadio.addEventListener('change', () => {
                        if (individuRadio.checked) {
                            mahasiswaAlpine.isIndividu = true;
                        }
                    });

                    kelompokRadio.addEventListener('change', () => {
                        if (kelompokRadio.checked) {
                            mahasiswaAlpine.isIndividu = false;
                        }
                    });

                    document.querySelector('form').addEventListener('submit', function(e) {
                        const dosenAlpine = Alpine.$data(document.querySelector('[x-data*="maxDosen"]'));
                        const dosenSelected = dosenAlpine.selected.length;
                        if (dosenSelected === 0) {
                            e.preventDefault();
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Minimal satu dosen pembimbing harus dipilih.',
                                showConfirmButton: true
                            });
                        }
                    });
                });
            </script>

            <script>
                function updateFileLabel(inputId) {
                    const input = document.getElementById(inputId);
                    const label = document.getElementById(inputId + '_label');
                    if (input.files.length > 0) {
                        label.textContent = input.files[0].name;
                    } else {
                        label.textContent = 'Drag & drop file di sini atau';
                    }
                }

                function handleDrop(event, inputId) {
                    event.preventDefault();
                    const input = document.getElementById(inputId);
                    const files = event.dataTransfer.files;
                    if (files.length > 0) {
                        input.files = files;
                        updateFileLabel(inputId);
                    }
                    event.currentTarget.classList.remove('border-primary');
                }
            </script>

            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '{{ session('success') }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                </script>
            @endif

            @if ($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            html: `{!! implode('<br>', $errors->all()) !!}`,
                            showConfirmButton: true
                        });
                    });
                </script>
            @endif
        @endsection
