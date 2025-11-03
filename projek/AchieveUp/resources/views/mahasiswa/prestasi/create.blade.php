@extends('mahasiswa.layouts.app')

@section('title', 'Prestasi')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 max-w-6xl">
            <form action="{{ url('/mahasiswa/prestasi/store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- Basic Information Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-info-circle text-blue-600"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900">Informasi Dasar</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Date Display -->
                        <div class="lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pengajuan</label>
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                                    <span class="text-gray-800 font-medium">
                                        {{ \Illuminate\Support\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" name="tanggal_pengajuan" value="{{ now()->format('Y-m-d') }}">
                        </div>

                        <!-- Activity Title -->
                        <div class="lg:col-span-2">
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Kegiatan
                                *</label>
                            <input type="text" name="judul" id="judul" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400"
                                placeholder="Masukkan judul kegiatan..." value="{{ old('judul') }}">
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="tempat" class="block text-sm font-medium text-gray-700 mb-2">Tempat *</label>
                            <input type="text" name="tempat" id="tempat" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400"
                                placeholder="Lokasi kegiatan..." value="{{ old('tempat') }}">
                        </div>

                        <!-- Start Date -->
                        <div>
                            <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai
                                *</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400"
                                value="{{ old('tanggal_mulai') }}">
                        </div>

                        <!-- End Date -->
                        <div>
                            <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                                Selesai *</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400"
                                value="{{ old('tanggal_selesai') }}">
                        </div>

                        <!-- URL -->
                        <div class="lg:col-span-2">
                            <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL Lomba</label>
                            <input type="url" name="url" id="url"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400"
                                placeholder="https://example.com" value="{{ old('url') }}">
                        </div>
                    </div>
                </div>

                <!-- Achievement Details Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-trophy text-yellow-600"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900">Detail Prestasi</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Level & Rank Row -->
                        <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Level -->
                            <div>
                                <label for="tingkat" class="block text-sm font-medium text-gray-700 mb-2">Tingkat *</label>
                                <select name="tingkat" id="tingkat" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 bg-white">
                                    <option value="">Pilih Tingkat</option>
                                    <option value="internasional" {{ old('tingkat') == 'internasional' ? 'selected' : '' }}>
                                        <i class="fas fa-globe"></i> Internasional
                                    </option>
                                    <option value="nasional" {{ old('tingkat') == 'nasional' ? 'selected' : '' }}>
                                        <i class="fas fa-flag"></i> Nasional
                                    </option>
                                    <option value="regional" {{ old('tingkat') == 'regional' ? 'selected' : '' }}>
                                        <i class="fas fa-map"></i> Regional
                                    </option>
                                    <option value="provinsi" {{ old('tingkat') == 'provinsi' ? 'selected' : '' }}>
                                        <i class="fas fa-building"></i> Provinsi
                                    </option>
                                </select>
                            </div>

                            <!-- Rank -->
                            <div>
                                <label for="juara" class="block text-sm font-medium text-gray-700 mb-2">Peringkat
                                    *</label>
                                <select name="juara" id="juara" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 bg-white">
                                    <option value="">Pilih Peringkat</option>
                                    <option value="1" {{ old('juara') == 1 ? 'selected' : '' }}>Juara 1</option>
                                    <option value="2" {{ old('juara') == 2 ? 'selected' : '' }}>Juara 2</option>
                                    <option value="3" {{ old('juara') == 3 ? 'selected' : '' }}>Juara 3</option>
                                </select>
                            </div>

                            <!-- Field -->
                            <div>
                                <label for="bidang" class="block text-sm font-medium text-gray-700 mb-2">Bidang *</label>
                                <select name="bidang" id="bidang" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 bg-white">
                                    <option value="">Pilih Bidang</option>
                                    @foreach ($bidangs as $bidang)
                                        <option value="{{ $bidang->id }}"
                                            {{ old('bidang') == $bidang->id ? 'selected' : '' }}>
                                            {{ $bidang->nama }} ({{ $bidang->kode }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Category Toggles -->
                        <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6" x-data="{
                            isIndividu: {{ old('is_individu', 1) }},
                            updateParticipantType() {
                                // Trigger update for participant section
                                this.$dispatch('participant-type-changed', { isIndividu: this.isIndividu });
                            }
                        }">
                            <!-- Participant Type -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Jenis Peserta *</label>
                                <div class="space-y-2">
                                    <label
                                        class="flex items-center p-3 rounded-lg border border-gray-200 cursor-pointer hover:bg-blue-50 transition-colors duration-200">
                                        <input type="radio" name="is_individu" value="1" x-model="isIndividu"
                                            @change="updateParticipantType()"
                                            {{ old('is_individu', 1) == 1 ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <i class="fas fa-user ml-3 mr-2 text-blue-600"></i>
                                        <span class="text-sm font-medium text-gray-700">Individu</span>
                                    </label>
                                    <label
                                        class="flex items-center p-3 rounded-lg border border-gray-200 cursor-pointer hover:bg-blue-50 transition-colors duration-200">
                                        <input type="radio" name="is_individu" value="0" x-model="isIndividu"
                                            @change="updateParticipantType()"
                                            {{ old('is_individu') == 0 ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <i class="fas fa-users ml-3 mr-2 text-blue-600"></i>
                                        <span class="text-sm font-medium text-gray-700">Kelompok</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Achievement Type -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Jenis Prestasi *</label>
                                <div class="space-y-2">
                                    <label
                                        class="flex items-center p-3 rounded-lg border border-gray-200 cursor-pointer hover:bg-blue-50 transition-colors duration-200">
                                        <input type="radio" name="is_akademik" value="1"
                                            {{ old('is_akademik', 1) == 1 ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <i class="fas fa-graduation-cap ml-3 mr-2 text-blue-600"></i>
                                        <span class="text-sm font-medium text-gray-700">Akademik</span>
                                    </label>
                                    <label
                                        class="flex items-center p-3 rounded-lg border border-gray-200 cursor-pointer hover:bg-blue-50 transition-colors duration-200">
                                        <input type="radio" name="is_akademik" value="0"
                                            {{ old('is_akademik') == 0 ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <i class="fas fa-palette ml-3 mr-2 text-blue-600"></i>
                                        <span class="text-sm font-medium text-gray-700">Nonakademik</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents Upload Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-file-upload text-green-600"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900">Dokumen Pendukung</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Optional Files Row -->
                        <div class="lg:col-span-2">
                            <h3 class="text-lg font-medium text-gray-700 mb-4">Berkas Opsional</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Activity Photo -->
                                <div x-data="fileUpload('foto_kegiatan')" class="group">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-camera mr-1"></i> Foto Kegiatan
                                    </label>
                                    <div class="dropzone" @click="$refs.fileInput.click()"
                                        @dragover.prevent="dragover = true" @dragleave="dragover = false"
                                        @drop.prevent="handleDrop($event)"
                                        :class="dragover ? 'border-blue-400 bg-blue-50' : 'border-gray-300'">

                                        <div x-show="!fileName" class="text-center py-8">
                                            <i class="fas fa-camera text-3xl text-gray-400 mb-3"></i>
                                            <p class="text-sm text-gray-500 mb-2">Seret dan letakkan berkas di sini atau
                                                klik untuk mengunggah</p>
                                            <p class="text-xs text-gray-400">JPG, PNG (maks. 1 MB)</p>
                                        </div>

                                        <div x-show="fileName" class="file-preview">
                                            <img x-show="fileUrl" :src="fileUrl" alt="Pratinjau"
                                                class="preview-image">
                                            <div class="file-info">
                                                <span x-text="fileName" class="file-name"></span>
                                                <div class="file-actions">
                                                    <button type="button" @click.stop="preview()"
                                                        class="action-btn preview-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button" @click.stop="removeFile()"
                                                        class="action-btn remove-btn">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="file" name="foto_kegiatan" accept="image/jpeg,image/png"
                                            class="hidden" x-ref="fileInput" @change="handleFileChange($event)">
                                    </div>
                                </div>

                                <!-- Poster File -->
                                <div x-data="fileUpload('file_poster')" class="group">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-image mr-1"></i> Berkas Poster
                                    </label>
                                    <div class="dropzone" @click="$refs.fileInput.click()"
                                        @dragover.prevent="dragover = true" @dragleave="dragover = false"
                                        @drop.prevent="handleDrop($event)"
                                        :class="dragover ? 'border-blue-400 bg-blue-50' : 'border-gray-300'">

                                        <div x-show="!fileName" class="text-center py-8">
                                            <i class="fas fa-image text-3xl text-gray-400 mb-3"></i>
                                            <p class="text-sm text-gray-500 mb-2">Seret dan letakkan berkas di sini atau
                                                klik untuk mengunggah</p>
                                            <p class="text-xs text-gray-400">JPG, PNG (maks. 1 MB)</p>
                                        </div>

                                        <div x-show="fileName" class="file-preview">
                                            <img x-show="fileUrl" :src="fileUrl" alt="Pratinjau"
                                                class="preview-image">
                                            <div class="file-info">
                                                <span x-text="fileName" class="file-name"></span>
                                                <div class="file-actions">
                                                    <button type="button" @click.stop="preview()"
                                                        class="action-btn preview-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button" @click.stop="removeFile()"
                                                        class="action-btn remove-btn">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="file" name="file_poster" accept="image/jpeg,image/png"
                                            class="hidden" x-ref="fileInput" @change="handleFileChange($event)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Required Files Section -->
                        <div class="lg:col-span-2 border-t pt-6">
                            <h3 class="text-lg font-medium text-gray-700 mb-4">Berkas Wajib</h3>

                            <!-- Assignment Letter Info -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div>
                                    <label for="nomor_surat_tugas"
                                        class="block text-sm font-medium text-gray-700 mb-2">Nomor Surat Tugas *</label>
                                    <input type="text" name="nomor_surat_tugas" id="nomor_surat_tugas" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400"
                                        placeholder="Nomor surat tugas..." value="{{ old('nomor_surat_tugas') }}">
                                </div>
                                <div>
                                    <label for="tanggal_surat_tugas"
                                        class="block text-sm font-medium text-gray-700 mb-2">Tanggal Surat Tugas *</label>
                                    <input type="date" name="tanggal_surat_tugas" id="tanggal_surat_tugas" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400"
                                        value="{{ old('tanggal_surat_tugas') }}">
                                </div>
                            </div>

                            <!-- Required PDF Files -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Assignment Letter -->
                                <div x-data="fileUpload('file_surat_tugas', true)" class="group">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-file-contract mr-1"></i> Berkas Surat Tugas *
                                    </label>
                                    <div class="dropzone border-red-200" @click="$refs.fileInput.click()"
                                        @dragover.prevent="dragover = true" @dragleave="dragover = false"
                                        @drop.prevent="handleDrop($event)"
                                        :class="dragover ? 'border-red-400 bg-red-50' : 'border-red-200'">

                                        <div x-show="!fileName" class="text-center py-8">
                                            <i class="fas fa-file-pdf text-3xl text-red-400 mb-3"></i>
                                            <p class="text-sm text-gray-500 mb-2">Seret dan letakkan berkas di sini atau
                                                klik untuk mengunggah</p>
                                            <p class="text-xs text-gray-400">PDF saja (maks. 500 KB)</p>
                                        </div>

                                        <div x-show="fileName" class="file-preview">
                                            <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                            <div class="file-info">
                                                <span x-text="fileName" class="file-name"></span>
                                                <div class="file-actions">
                                                    <button type="button" @click.stop="preview()"
                                                        class="action-btn preview-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button" @click.stop="removeFile()"
                                                        class="action-btn remove-btn">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="file" name="file_surat_tugas" accept="application/pdf" required
                                            class="hidden" x-ref="fileInput" @change="handleFileChange($event)">
                                    </div>
                                </div>

                                <!-- Certificate -->
                                <div x-data="fileUpload('file_sertifikat', true)" class="group">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-certificate mr-1"></i> Berkas Sertifikat *
                                    </label>
                                    <div class="dropzone border-yellow-200" @click="$refs.fileInput.click()"
                                        @dragover.prevent="dragover = true" @dragleave="dragover = false"
                                        @drop.prevent="handleDrop($event)"
                                        :class="dragover ? 'border-yellow-400 bg-yellow-50' : 'border-yellow-200'">

                                        <div x-show="!fileName" class="text-center py-8">
                                            <i class="fas fa-certificate text-3xl text-yellow-400 mb-3"></i>
                                            <p class="text-sm text-gray-500 mb-2">Seret dan letakkan berkas di sini atau
                                                klik untuk mengunggah</p>
                                            <p class="text-xs text-gray-400">PDF saja (maks. 500 KB)</p>
                                        </div>

                                        <div x-show="fileName" class="file-preview">
                                            <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                            <div class="file-info">
                                                <span x-text="fileName" class="file-name"></span>
                                                <div class="file-actions">
                                                    <button type="button" @click.stop="preview()"
                                                        class="action-btn preview-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button" @click.stop="removeFile()"
                                                        class="action-btn remove-btn">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="file" name="file_sertifikat" accept="application/pdf" required
                                            class="hidden" x-ref="fileInput" @change="handleFileChange($event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Participants Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-users text-purple-600"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900">Peserta dan Pembimbing</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Students Selection -->
                        <div x-data="participantSelector('mahasiswa', {{ json_encode($mahasiswas) }}, {{ auth('mahasiswa')->user()->id }})"
                            @participant-type-changed.window="handleParticipantTypeChange($event.detail)"
                            class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user-graduate mr-1"></i> Mahasiswa yang Terlibat
                                </label>
                                <div class="relative">
                                    <input type="text" x-model="query" placeholder="Cari nama atau NIM..."
                                        :disabled="isIndividuMode"
                                        :class="isIndividuMode ? 'bg-gray-100 cursor-not-allowed' : ''"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400"
                                        @focus="showDropdown = true">

                                    <!-- Search Results -->
                                    <div x-show="showDropdown && query.length > 0 && filtered().length > 0 && !isIndividuMode"
                                        class="absolute z-20 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg max-h-48 overflow-y-auto"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100">
                                        <template x-for="item in filtered()" :key="item.id">
                                            <div @click="addParticipant(item)"
                                                class="px-4 py-3 hover:bg-blue-50 cursor-pointer border-b border-gray-100 last:border-b-0 transition-colors duration-150">
                                                <div class="font-medium text-gray-900" x-text="item.nama"></div>
                                                <div class="text-sm text-gray-500" x-text="item.nim"></div>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <!-- Individual Mode Notice -->
                                <div x-show="isIndividuMode"
                                    class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                                        <span class="text-sm text-blue-700">Mode individu: Hanya mahasiswa yang sedang
                                            masuk yang terlibat.</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Selected Students -->
                            <div class="space-y-2">
                                <template x-for="participant in selected" :key="participant.id">
                                    <div
                                        class="flex items-center justify-between bg-blue-50 border border-blue-200 rounded-lg p-3">
                                        <div class="flex items-center">
                                            <div
                                                class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                                                <span x-text="participant.nama.charAt(0).toUpperCase()"></span>
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-900" x-text="participant.nama"></div>
                                                <div class="text-sm text-gray-500" x-text="participant.nim"></div>
                                            </div>
                                        </div>
                                        <button type="button"
                                            :disabled="participant.id === currentUserId || isIndividuMode"
                                            @click="removeParticipant(participant.id)"
                                            :class="(participant.id === currentUserId || isIndividuMode) ?
                                            'opacity-50 cursor-not-allowed' : 'hover:bg-red-100'"
                                            class="p-2 rounded-lg text-red-500 transition-colors duration-200">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <input type="hidden" name="mahasiswas[]" :value="participant.id">
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Supervisors Selection -->
                        <div x-data="participantSelector('dosen', {{ json_encode($dosens) }})" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-chalkboard-teacher mr-1"></i> Dosen Pembimbing
                                </label>
                                <div class="relative">
                                    <input type="text" x-model="query" placeholder="Cari nama atau NIDN..."
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400"
                                        @focus="showDropdown = true">

                                    <!-- Search Results -->
                                    <div x-show="showDropdown && query.length > 0 && filtered().length > 0"
                                        class="absolute z-20 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg max-h-48 overflow-y-auto"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100">
                                        <template x-for="item in filtered()" :key="item.id">
                                            <div @click="addParticipant(item)"
                                                class="px-4 py-3 hover:bg-green-50 cursor-pointer border-b border-gray-100 last:border-b-0 transition-colors duration-150">
                                                <div class="font-medium text-gray-900" x-text="item.nama"></div>
                                                <div class="text-sm text-gray-500" x-text="item.nidn"></div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- Selected Supervisors -->
                            <div class="space-y-2">
                                <template x-for="participant in selected" :key="participant.id">
                                    <div
                                        class="flex items-center justify-between bg-green-50 border border-green-200 rounded-lg p-3">
                                        <div class="flex items-center">
                                            <div
                                                class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                                                <span x-text="participant.nama.charAt(0).toUpperCase()"></span>
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-900" x-text="participant.nama"></div>
                                                <div class="text-sm text-gray-500" x-text="participant.nidn"></div>
                                            </div>
                                        </div>
                                        <button type="button" @click="removeParticipant(participant.id)"
                                            class="p-2 rounded-lg text-red-500 hover:bg-red-100 transition-colors duration-200">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <input type="hidden" name="dosen_pembimbing[]" :value="participant.id">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-6">
                    <button type="submit"
                        class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <i class="fas fa-paper-plane mr-3 text-lg"></i>
                        <span class="text-lg">Ajukan Prestasi</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .dropzone {
            @apply border-2 border-dashed rounded-lg cursor-pointer transition-all duration-300 hover:shadow-md;
        }

        .file-preview {
            @apply flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-200;
        }

        .preview-image {
            @apply w-12 h-12 object-cover rounded-lg shadow-sm;
        }

        .file-info {
            @apply flex-1 flex items-center justify-between;
        }

        .file-name {
            @apply text-sm font-medium text-gray-700 truncate;
        }

        .file-actions {
            @apply flex gap-2;
        }

        .action-btn {
            @apply p-2 rounded-lg transition-colors duration-200;
        }

        .preview-btn {
            @apply text-blue-600 hover:bg-blue-100;
        }

        .remove-btn {
            @apply text-red-600 hover:bg-red-100;
        }
    </style>


    @push('scripts')
    <script>
        // File Upload Component with size validation
        function fileUpload(fieldName, isRequired = false) {
            return {
                fileName: '',
                fileUrl: '',
                dragover: false,

                handleFileChange(event) {
                    const file = event.target.files[0];
                    if (file) {
                        // Validate file size
                        const maxSize = this.getMaxFileSize(file.type);
                        if (file.size > maxSize) {
                            const maxSizeMB = maxSize / (1024 * 1024);
                            const unit = maxSizeMB >= 1 ? 'MB' : 'KB';
                            const displaySize = maxSizeMB >= 1 ? maxSizeMB : maxSize / 1024;

                            Swal.fire({
                                icon: 'error',
                                title: 'Ukuran Berkas Terlalu Besar',
                                text: `Ukuran berkas maksimal ${displaySize} ${unit}`,
                                showConfirmButton: true
                            });

                            // Clear the input
                            event.target.value = '';
                            this.reset();
                            return;
                        }

                        this.fileName = file.name;
                        this.fileUrl = URL.createObjectURL(file);
                    } else {
                        this.reset();
                    }
                },

                getMaxFileSize(fileType) {
                    // Image files: 1MB = 1024 * 1024 bytes
                    if (fileType.startsWith('image/')) {
                        return 1024 * 1024; // 1MB
                    }
                    // PDF files: 500KB = 500 * 1024 bytes
                    if (fileType === 'application/pdf') {
                        return 500 * 1024; // 500KB
                    }
                    return 1024 * 1024; // Default 1MB
                },

                handleDrop(event) {
                    this.dragover = false;
                    const files = event.dataTransfer.files;
                    if (files.length > 0) {
                        this.$refs.fileInput.files = files;
                        this.handleFileChange({
                            target: {
                                files
                            }
                        });
                    }
                },

                preview() {
                    if (this.fileUrl) {
                        window.open(this.fileUrl, '_blank');
                    }
                },

                removeFile() {
                    this.$refs.fileInput.value = '';
                    this.reset();
                },

                reset() {
                    this.fileName = '';
                    this.fileUrl = '';
                }
            }
        }

        // Participant Selector Component
        function participantSelector(type, allData, currentUserId = null) {
            return {
                query: '',
                selected: type === 'mahasiswa' && currentUserId ?
                    allData.filter(item => item.id === currentUserId) : [],
                showDropdown: false,
                currentUserId: currentUserId,
                isIndividuMode: {{ old('is_individu', 1) }} == 1,

                filtered() {
                    const searchField = type === 'mahasiswa' ? 'nim' : 'nidn';
                    return allData.filter(item => {
                        const matchesSearch = item.nama.toLowerCase().includes(this.query.toLowerCase()) ||
                            item[searchField].toLowerCase().includes(this.query.toLowerCase());
                        const notSelected = !this.selected.some(s => s.id === item.id);
                        return matchesSearch && notSelected;
                    });
                },

                addParticipant(item) {
                    if (type === 'mahasiswa' && this.isIndividuMode) {
                        return; // Don't allow adding if in individual mode
                    }
                    this.selected.push(item);
                    this.query = '';
                    this.showDropdown = false;
                },

                removeParticipant(id) {
                    if (type === 'mahasiswa' && this.isIndividuMode && id === this.currentUserId) {
                        return; // Don't allow removing current user in individual mode
                    }
                    this.selected = this.selected.filter(item => item.id !== id);
                },

                handleParticipantTypeChange(detail) {
                    if (type === 'mahasiswa') {
                        this.isIndividuMode = detail.isIndividu == 1;

                        if (this.isIndividuMode) {
                            // Keep only current user
                            this.selected = allData.filter(item => item.id === this.currentUserId);
                            this.query = '';
                            this.showDropdown = false;
                        }
                    }
                }
            }
        }

        // Hide dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('[x-data*="participantSelector"]');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target)) {
                    // Hide dropdown logic would go here if needed
                }
            });
        });
    </script>
    @endpush
    

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
