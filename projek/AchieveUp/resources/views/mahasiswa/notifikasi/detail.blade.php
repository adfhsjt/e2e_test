@extends('mahasiswa.layouts.app')
@section('title', 'Detail Notifikasi')
@section('content')

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50/30 py-8">
        <div class="container mx-auto px-4 max-w-6xl">

            {{-- Jika ini notifikasi rekomendasi --}}
            @if (isset($rekomendasi))
                <!-- Competition Info Card -->
                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-md border border-white/20 mb-8 overflow-hidden">
                    <div class="relative">
                        <!-- Decorative background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/5 to-purple-600/5"></div>

                        <div class="relative p-8">
                            <div class="flex items-start justify-between mb-6">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $rekomendasi->lomba->judul ?? '-' }}
                                    </h1>
                                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                                        <span class="flex items-center">
                                            <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                                            {{ $rekomendasi->lomba->tempat ?? '-' }}
                                        </span>
                                        <span class="flex items-center">
                                            <i class="fas fa-layer-group text-blue-500 mr-2"></i>
                                            {{ ucfirst($rekomendasi->lomba->tingkat ?? '-') }}
                                        </span>
                                    </div>
                                </div>

                                @if ($rekomendasi->lomba->is_active)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                        <span class="w-2 h-2 bg-gray-400 rounded-full mr-2"></span>
                                        Nonaktif
                                    </span>
                                @endif
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Left Column -->
                                <div class="space-y-6">
                                    <!-- Registration Period -->
                                    <div
                                        class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-calendar-alt text-blue-600 mr-2"></i>
                                            Periode Pendaftaran
                                        </h3>
                                        <div class="space-y-3">
                                            <div class="flex items-center justify-between">
                                                <span class="text-xs text-gray-600">Mulai</span>
                                                <span class="text-sm font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($rekomendasi->lomba->tanggal_daftar)->format('d M Y') }}
                                                </span>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <span class="text-xs text-gray-600">Berakhir</span>
                                                <span class="text-sm font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($rekomendasi->lomba->tanggal_daftar_terakhir)->format('d M Y') }}
                                                </span>
                                            </div>
                                            @php
                                                $today = \Carbon\Carbon::now();
                                                $endDate = \Carbon\Carbon::parse(
                                                    $rekomendasi->lomba->tanggal_daftar_terakhir,
                                                );
                                                $daysLeft = $today->diffInDays($endDate, false);
                                            @endphp
                                            <div class="pt-2 border-t border-blue-200">
                                                @if ($daysLeft > 0)
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-xs text-orange-600">Sisa waktu</span>
                                                        <span
                                                            class="text-sm font-semibold text-orange-600">{{ $daysLeft }}
                                                            hari</span>
                                                    </div>
                                                @elseif($daysLeft == 0)
                                                    <div class="text-center">
                                                        <span
                                                            class="text-xs font-medium text-red-600 bg-red-50 px-2 py-1 rounded">
                                                            Hari terakhir!
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class="text-center">
                                                        <span class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded">
                                                            Pendaftaran berakhir
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Competition Details -->
                                    <div class="space-y-4">
                                        <div
                                            class="flex items-center justify-between p-4 bg-gray-50/50 rounded-lg border border-gray-100">
                                            <span class="text-sm text-gray-600">Kategori Peserta</span>
                                            <span class="text-sm font-medium text-gray-900 flex items-center">
                                                <i
                                                    class="fas {{ $rekomendasi->lomba->is_individu ? 'fa-user' : 'fa-users' }} text-blue-500 mr-2"></i>
                                                {{ $rekomendasi->lomba->is_individu ? 'Individu' : 'Kelompok' }}
                                            </span>
                                        </div>

                                        <div
                                            class="flex items-center justify-between p-4 bg-gray-50/50 rounded-lg border border-gray-100">
                                            <span class="text-sm text-gray-600">Jenis Lomba</span>
                                            <span class="text-sm font-medium text-gray-900 flex items-center">
                                                <i
                                                    class="fas {{ $rekomendasi->lomba->is_akademik ? 'fa-graduation-cap' : 'fa-palette' }} text-purple-500 mr-2"></i>
                                                {{ $rekomendasi->lomba->is_akademik ? 'Akademik' : 'Nonakademik' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="space-y-6">
                                    <!-- Bidang Lomba -->
                                    @if ($rekomendasi->lomba && $rekomendasi->lomba->bidang->count())
                                        <div>
                                            <h3 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                                <i class="fas fa-tags text-indigo-600 mr-2"></i>
                                                Bidang Lomba
                                            </h3>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($rekomendasi->lomba->bidang as $b)
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-medium bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors">
                                                        {{ $b->nama }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Official Link -->
                                    @if ($rekomendasi->lomba->url)
                                        <div
                                            class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border border-green-100">
                                            <h3 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                                <i class="fas fa-link text-green-600 mr-2"></i>
                                                Tautan Resmi
                                            </h3>
                                            <a href="{{ $rekomendasi->lomba->url }}" target="_blank"
                                                class="inline-flex items-center text-sm text-green-700 hover:text-green-800 font-medium group">
                                                <span class="truncate max-w-xs">{{ $rekomendasi->lomba->url }}</span>
                                                <i
                                                    class="fas fa-external-link-alt ml-2 text-xs group-hover:translate-x-1 transition-transform"></i>
                                            </a>
                                        </div>
                                    @endif

                                    <!-- Poster Preview -->
                                    @if ($rekomendasi->lomba->file_poster)
                                        <div>
                                            <h3 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                                <i class="fas fa-image text-pink-600 mr-2"></i>
                                                Poster Lomba
                                            </h3>
                                            <div class="relative group">
                                                <img src="{{ asset('storage/' . $rekomendasi->lomba->file_poster) }}"
                                                    alt="Poster Lomba"
                                                    class="w-full h-48 object-cover rounded-xl shadow-lg cursor-pointer group-hover:shadow-md transition-all duration-300"
                                                    onclick="openImageModal(this.src)">
                                                <div
                                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-xl transition-all duration-300 flex items-center justify-center">
                                                    <button
                                                        onclick="openImageModal('{{ asset('storage/' . $rekomendasi->lomba->file_poster) }}')"
                                                        class="opacity-0 group-hover:opacity-100 bg-white bg-opacity-90 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 transform scale-95 group-hover:scale-100">
                                                        <i class="fas fa-expand-alt mr-2"></i>
                                                        Lihat Poster
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Participants Tables -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Students Table -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg border border-white/20 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50/50 to-indigo-50/50">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <i class="fas fa-user-graduate text-blue-600 mr-3"></i>
                                Mahasiswa Direkomendasikan
                            </h3>
                        </div>
                        <div class="overflow-hidden">
                            @forelse($mahasiswa as $index => $m)
                                <div
                                    class="px-6 py-4 border-b border-gray-50 last:border-b-0 hover:bg-blue-50/30 transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-sm font-bold shadow-lg">
                                                {{ substr($m->mahasiswa->nama ?? 'N', 0, 1) }}
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-semibold text-gray-900 truncate">
                                                {{ $m->mahasiswa->nama ?? '-' }}</h4>
                                            <p class="text-xs text-gray-500">NIM: {{ $m->mahasiswa->nim ?? '-' }}</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                #{{ $index + 1 }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="px-6 py-8 text-center">
                                    <div
                                        class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-user-slash text-gray-400 text-xl"></i>
                                    </div>
                                    <p class="text-sm text-gray-500">Tidak ada mahasiswa yang direkomendasikan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Supervisors Table -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg border border-white/20 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50/50 to-emerald-50/50">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <i class="fas fa-chalkboard-teacher text-green-600 mr-3"></i>
                                Dosen Pembimbing
                            </h3>
                        </div>
                        <div class="overflow-hidden">
                            @forelse($dosen as $index => $d)
                                <div
                                    class="px-6 py-4 border-b border-gray-50 last:border-b-0 hover:bg-green-50/30 transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white text-sm font-bold shadow-lg">
                                                {{ substr($d->dosen->nama ?? 'D', 0, 1) }}
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-semibold text-gray-900 truncate">
                                                {{ $d->dosen->nama ?? '-' }}</h4>
                                            <p class="text-xs text-gray-500">NIDN: {{ $d->dosen->nidn ?? '-' }}</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                #{{ $index + 1 }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="px-6 py-8 text-center">
                                    <div
                                        class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-chalkboard-teacher text-gray-400 text-xl"></i>
                                    </div>
                                    <p class="text-sm text-gray-500">Tidak ada dosen pembimbing yang ditugaskan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="{{ url('mahasiswa/notifikasi') }}"
                        class="inline-flex items-center px-6 py-3 bg-white/80 backdrop-blur-sm text-gray-700 text-sm rounded-xl border border-gray-200 hover:bg-white hover:shadow-lg transition-all duration-300 group">
                        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                        Kembali
                    </a>
                    @if ($rekomendasi->lomba->url)
                        <a href="{{ $rekomendasi->lomba->url }}" target="_blank"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm rounded-xl hover:from-blue-600 hover:to-blue-700 shadow-lg hover:shadow-md transition-all duration-300 group">
                            <i class="fas fa-external-link-alt mr-2 group-hover:translate-x-1 transition-transform"></i>
                            Kunjungi Situs Lomba
                        </a>
                    @endif
                    <button type="button"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white text-sm rounded-xl hover:from-red-600 hover:to-red-700 shadow-lg hover:shadow-md transition-all duration-300 group btn-hapus"
                        data-id="{{ $mahasiswaRekom->id }}" data-type="rekomendasi">
                        <i class="fas fa-trash mr-2 group-hover:scale-110 transition-transform"></i>
                        Hapus Notifikasi
                    </button>
                </div>
            @endif

            {{-- Jika ini notifikasi verifikasi --}}
            @if (isset($note))
                <div
                    class="bg-white/80 backdrop-blur-sm rounded-lg shadow-md border border-white/20 mb-8 overflow-hidden">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/5 to-purple-600/5"></div>

                        <div class="relative p-8">
                            <div class="flex items-start justify-between mb-6">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Detail Verifikasi Prestasi</h1>
                                    <p class="text-gray-600">{{ $note->judul ?? '-' }}</p>
                                </div>

                                @php
                                    $statusConfig = [
                                        'approved' => [
                                            'bg-green-100 text-green-800 border-green-200',
                                            'fas fa-check-circle',
                                            'bg-green-400',
                                        ],
                                        'rejected' => [
                                            'bg-red-100 text-red-800 border-red-200',
                                            'fas fa-times-circle',
                                            'bg-red-400',
                                        ],
                                        'pending' => [
                                            'bg-yellow-100 text-yellow-800 border-yellow-200',
                                            'fas fa-hourglass-half',
                                            'bg-yellow-400',
                                        ],
                                    ];
                                    $config = $statusConfig[$note->status] ?? [
                                        'bg-gray-100 text-gray-800 border-gray-200',
                                        'fas fa-question-circle',
                                        'bg-gray-400',
                                    ];
                                @endphp
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $config[0] }} border">
                                    <span class="w-2 h-2 {{ $config[2] }} rounded-full mr-2"></span>
                                    {{ ucfirst($note->status ?? '-') }}
                                </span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-6">
                                    <div
                                        class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-calendar-alt text-blue-600 mr-2"></i>
                                            Waktu Verifikasi
                                        </h3>
                                        <p class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($note->created_at)->format('d M Y H:i') }}</p>
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <div
                                        class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-100">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-sticky-note text-purple-600 mr-2"></i>
                                            Catatan
                                        </h3>
                                        <p class="text-sm text-gray-700">{{ $note->note ?? 'Tidak ada catatan' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="{{ url('mahasiswa/notifikasi') }}"
                        class="inline-flex items-center px-6 py-3 bg-white/80 backdrop-blur-sm text-gray-700 text-sm rounded-xl border border-gray-200 hover:bg-white hover:shadow-lg transition-all duration-300 group">
                        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                        Kembali
                    </a>
                    <a href="{{ url('mahasiswa/prestasi/' . $note->prestasi_id) }}"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm rounded-xl hover:from-blue-600 hover:to-blue-700 shadow-lg hover:shadow-md transition-all duration-300 group">
                        <i class="fas fa-eye mr-2 group-hover:scale-110 transition-transform"></i>
                        Detail Prestasi
                    </a>
                    <button type="button"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white text-sm rounded-xl hover:from-red-600 hover:to-red-700 shadow-lg hover:shadow-md transition-all duration-300 group btn-hapus"
                        data-id="{{ $note->id }}" data-type="verifikasi">
                        <i class="fas fa-trash mr-2 group-hover:scale-110 transition-transform"></i>
                        Hapus Notifikasi
                    </button>
                </div>
            @endif

            {{-- Jika ini notifikasi pengajuan lomba --}}
            @if (isset($pengajuanLomba))
                <div
                    class="bg-white/80 backdrop-blur-sm rounded-lg shadow-md border border-white/20 mb-8 overflow-hidden">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 to-red-600/5"></div>

                        <div class="relative p-8">
                            <div class="flex items-start justify-between mb-6">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Detail Pengajuan Lomba</h1>
                                    <p class="text-gray-600">{{ $lomba->judul ?? '-' }}</p>
                                </div>

                                @php
                                    $statusConfig = [
                                        'approved' => [
                                            'bg-green-100 text-green-800 border-green-200',
                                            'fas fa-check-circle',
                                            'bg-green-400',
                                        ],
                                        'rejected' => [
                                            'bg-red-100 text-red-800 border-red-200',
                                            'fas fa-times-circle',
                                            'bg-red-400',
                                        ],
                                        'pending' => [
                                            'bg-yellow-100 text-yellow-800 border-yellow-200',
                                            'fas fa-hourglass-half',
                                            'bg-yellow-400',
                                        ],
                                    ];
                                    $config = $statusConfig[$pengajuan->status] ?? [
                                        'bg-gray-100 text-gray-800 border-gray-200',
                                        'fas fa-question-circle',
                                        'bg-gray-400',
                                    ];
                                @endphp
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $config[0] }} border">
                                    <span class="w-2 h-2 {{ $config[2] }} rounded-full mr-2"></span>
                                    @if ($pengajuan->status === 'approved')
                                        Disetujui
                                    @elseif($pengajuan->status === 'rejected')
                                        Ditolak
                                    @else
                                        Sedang Diproses
                                    @endif
                                </span>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <div class="space-y-6">
                                    <div
                                        class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-map-marker-alt text-blue-600 mr-2"></i>
                                            Lokasi
                                        </h3>
                                        <p class="text-sm text-gray-900">{{ $lomba->tempat ?? '-' }}</p>
                                    </div>

                                    <div
                                        class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border border-green-100">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-calendar text-green-600 mr-2"></i>
                                            Periode Pendaftaran
                                        </h3>
                                        @if ($lomba)
                                            <div class="space-y-2">
                                                <div class="flex justify-between text-sm">
                                                    <span class="text-gray-600">Mulai:</span>
                                                    <span
                                                        class="font-medium">{{ \Carbon\Carbon::parse($lomba->tanggal_daftar)->format('d M Y') }}</span>
                                                </div>
                                                <div class="flex justify-between text-sm">
                                                    <span class="text-gray-600">Berakhir:</span>
                                                    <span
                                                        class="font-medium">{{ \Carbon\Carbon::parse($lomba->tanggal_daftar_terakhir)->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        @else
                                            <p class="text-sm text-gray-500">-</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <div
                                        class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-100">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-clock text-purple-600 mr-2"></i>
                                            Waktu Pengajuan
                                        </h3>
                                        <p class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($pengajuan->created_at)->format('d M Y H:i') }}</p>
                                    </div>

                                    <div
                                        class="bg-gradient-to-r from-orange-50 to-yellow-50 rounded-xl p-6 border border-orange-100">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center">
                                            <i class="fas fa-sticky-note text-orange-600 mr-2"></i>
                                            Catatan
                                        </h3>
                                        <p class="text-sm text-gray-700">{{ $pengajuan->notes ?? 'Tidak ada catatan' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="{{ url('mahasiswa/notifikasi') }}"
                        class="inline-flex items-center px-6 py-3 bg-white/80 backdrop-blur-sm text-gray-700 text-sm rounded-xl border border-gray-200 hover:bg-white hover:shadow-lg transition-all duration-300 group">
                        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                        Kembali
                    </a>
                    <button type="button"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white text-sm rounded-xl hover:from-red-600 hover:to-red-700 shadow-lg hover:shadow-md transition-all duration-300 group btn-hapus"
                        data-id="{{ $pengajuanLomba->id }}" data-type="pengajuan_lomba">
                        <i class="fas fa-trash mr-2 group-hover:scale-110 transition-transform"></i>
                        Hapus Notifikasi
                    </button>
                </div>
            @endif

        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal"
        class="fixed inset-0 bg-black bg-opacity-75 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="relative max-w-4xl max-h-full p-4">
            <button onclick="closeImageModal()"
                class="absolute -top-12 right-0 text-white hover:text-gray-300 z-10 bg-black bg-opacity-50 rounded-full p-2 transition-all">
                <i class="fas fa-times text-xl"></i>
            </button>
            <img id="modalImage" src="" alt="Poster Lomba" class="max-w-full max-h-full rounded-lg shadow-2xl">
        </div>
    </div>

    <script>
        function openImageModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            $(document).on('click', '.btn-hapus', function() {
                const id = $(this).data('id');
                const type = $(this).data('type');
                Swal.fire({
                    title: 'Yakin hapus notifikasi ini?',
                    text: "Data yang dihapus tidak dapat dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/mahasiswa/notifikasi/${type}/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire('Berhasil!', response.message, 'success')
                                    .then(() => {
                                        window.location.href =
                                            "{{ url('mahasiswa/notifikasi') }}";
                                    });
                            },
                            error: function() {
                                Swal.fire('Gagal!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
