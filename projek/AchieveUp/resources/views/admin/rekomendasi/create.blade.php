@extends('admin.layouts.app')

@section('title', 'Tambah Rekomendasi')

@section('content')
    <div class="container mx-auto px-4 py-6">

        <!-- Lomba Header with enhanced styling -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 rounded-lg shadow-lg border border-blue-100/50 mb-8 transform hover:scale-[1.01] transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/5 to-purple-600/5"></div>
            <div class="relative p-6 md:p-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="space-y-3">
                        <h1
                            class="text-xl md:text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent animate-fade-in">
                            {{ $lomba->judul }}
                        </h1>
                        <div class="flex flex-wrap items-center gap-3">
                            <span
                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-100 to-indigo-200 text-indigo-800 text-sm font-medium rounded-full shadow-sm hover:shadow-md transition-shadow duration-200">
                                <div class="w-2 h-2 bg-indigo-500 rounded-full mr-2 animate-pulse"></div>
                                {{ $lomba->tingkat }}
                            </span>
                            <span
                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 text-sm font-medium rounded-full shadow-sm hover:shadow-md transition-shadow duration-200">
                                <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Bidang: {{ $lomba->bidang->pluck('nama')->join(', ') }}
                            </span>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-3 text-sm text-gray-600 bg-white/50 backdrop-blur-sm rounded-lg p-4 shadow-sm">
                        <div class="flex items-center gap-2">
                            <div class="p-2 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-lg shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-medium text-gray-700">Periode Pendaftaran</div>
                                <div class="text-xs">
                                    {{ \Carbon\Carbon::parse($lomba->tanggal_daftar)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::parse($lomba->tanggal_daftar_terakhir)->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Ranking Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
            <!-- ARAS Ranking -->
            <div
                class="group relative overflow-hidden bg-gradient-to-br from-blue-50 via-purple-50 to-indigo-50 rounded-lg shadow-lg border border-purple-100/50 hover:shadow-md transition-all duration-500 transform hover:scale-[1.02]">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-600/5 to-blue-600/5"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg text-white font-bold transform group-hover:rotate-12 transition-transform duration-300">
                                A
                            </div>
                            <div>
                                <div>Ranking ARAS</div>
                                <div class="text-sm text-gray-500 font-normal">Advanced Ranking Method</div>
                            </div>
                        </h2>
                        <span
                            class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800 text-xs font-medium rounded-full shadow-sm">
                            <div class="w-2 h-2 bg-purple-500 rounded-full mr-2 animate-pulse"></div>
                            Nilai Utility
                        </span>
                    </div>

                    <div class="overflow-hidden rounded-lg border border-gray-200/50 bg-white/70 backdrop-blur-sm">
                        <table class="min-w-full">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th
                                        class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Rank</th>
                                    <th
                                        class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Mahasiswa</th>
                                    <th
                                        class="px-4 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Ki Score</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200/50">
                                @foreach ($rankAras as $i => $data)
                                    <tr
                                        class="hover:bg-gradient-to-r hover:from-purple-50 hover:to-blue-50 transition-all duration-300 group/row">
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            @if ($i < 3)
                                                <div
                                                    class="flex items-center justify-center w-8 h-8 rounded-lg {{ $i === 0 ? 'bg-gradient-to-br from-yellow-400 to-yellow-500 text-white shadow-lg' : ($i === 1 ? 'bg-gradient-to-br from-gray-300 to-gray-400 text-white shadow-md' : 'bg-gradient-to-br from-amber-600 to-amber-700 text-white shadow-md') }} font-bold text-sm transform group-hover/row:scale-110 transition-transform duration-200">
                                                    {{ $i + 1 }}
                                                </div>
                                            @else
                                                <div
                                                    class="flex items-center justify-center w-8 h-8 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 text-gray-700 font-medium text-sm">
                                                    {{ $i + 1 }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4">
                                            <div
                                                class="font-semibold text-gray-900 group-hover/row:text-purple-700 transition-colors duration-200">
                                                {{ $data['nama'] }}</div>
                                            <div class="text-sm text-gray-500">{{ $data['nim'] }}</div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-right">
                                            <span
                                                class="font-mono text-sm {{ $i < 3 ? 'text-purple-700 font-semibold' : 'text-gray-700' }}">
                                                {{ isset($data['nilaiKi']) ? number_format($data['nilaiKi'], 4) : '-' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ELECTRE Ranking -->
            <div
                class="group relative overflow-hidden bg-gradient-to-br from-green-50 via-teal-50 to-emerald-50 rounded-lg shadow-lg border border-teal-100/50 hover:shadow-md transition-all duration-500 transform hover:scale-[1.02]">
                <div class="absolute inset-0 bg-gradient-to-br from-teal-600/5 to-green-600/5"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg shadow-lg text-white font-bold transform group-hover:rotate-12 transition-transform duration-300">
                                E
                            </div>
                            <div>
                                <div>Ranking ELECTRE</div>
                                <div class="text-sm text-gray-500 font-normal">Elimination Method</div>
                            </div>
                        </h2>
                        <span
                            class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-teal-100 to-teal-200 text-teal-800 text-xs font-medium rounded-full shadow-sm">
                            <div class="w-2 h-2 bg-teal-500 rounded-full mr-2 animate-pulse"></div>
                            Net Flow
                        </span>
                    </div>

                    <div class="overflow-hidden rounded-lg border border-gray-200/50 bg-white/70 backdrop-blur-sm">
                        <table class="min-w-full">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th
                                        class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Rank</th>
                                    <th
                                        class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Mahasiswa</th>
                                    <th
                                        class="px-4 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Net Flow</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200/50">
                                @foreach ($rankElectre as $i => $data)
                                    <tr
                                        class="hover:bg-gradient-to-r hover:from-teal-50 hover:to-green-50 transition-all duration-300 group/row">
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            @if ($i < 3)
                                                <div
                                                    class="flex items-center justify-center w-8 h-8 rounded-lg {{ $i === 0 ? 'bg-gradient-to-br from-yellow-400 to-yellow-500 text-white shadow-lg' : ($i === 1 ? 'bg-gradient-to-br from-gray-300 to-gray-400 text-white shadow-md' : 'bg-gradient-to-br from-amber-600 to-amber-700 text-white shadow-md') }} font-bold text-sm transform group-hover/row:scale-110 transition-transform duration-200">
                                                    {{ $i + 1 }}
                                                </div>
                                            @else
                                                <div
                                                    class="flex items-center justify-center w-8 h-8 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 text-gray-700 font-medium text-sm">
                                                    {{ $i + 1 }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4">
                                            <div
                                                class="font-semibold text-gray-900 group-hover/row:text-teal-700 transition-colors duration-200">
                                                {{ $data['nama'] }}</div>
                                            <div class="text-sm text-gray-500">{{ $data['nim'] }}</div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-right">
                                            <span
                                                class="font-mono text-sm {{ $i < 3 ? 'text-teal-700 font-semibold' : 'text-gray-700' }}">
                                                {{ isset($data['net_flow']) ? number_format($data['net_flow'], 4) : '-' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Form Section -->
        <div class="max-w-4xl mx-auto">
            <div
                class="relative overflow-hidden bg-gradient-to-br from-white to-gray-50 rounded-lg shadow-md border border-gray-200/50">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/5 to-purple-600/5"></div>
                <div class="relative p-8">
                    <div class="text-center mb-8">
                        <h2
                            class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
                            Buat Rekomendasi Baru
                        </h2>
                        <p class="text-gray-600">Pilih mahasiswa dan dosen pembimbing untuk rekomendasi lomba</p>
                    </div>

                    <form action="{{ route('admin.rekomendasi.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <input type="hidden" name="lomba_id" value="{{ $lomba->id }}">

                        <!-- Mahasiswa Selection -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="block text-lg font-semibold text-gray-800 flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                    </div>
                                    Pilih Mahasiswa
                                </label>
                                <div class="flex items-center gap-3">
                                    <button type="button" onclick="selectAll('mahasiswa_select')"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Pilih Semua
                                    </button>
                                    <button type="button" onclick="unselectAll('mahasiswa_select')"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 transition-colors duration-200">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Hapus Semua
                                    </button>
                                </div>
                            </div>

                            <div class="relative">
                                <select id="mahasiswa_select" name="mahasiswa_id[]" multiple required class="w-full">
                                    @foreach ($mahasiswa as $mhs)
                                        <option value="{{ $mhs->id }}">{{ $mhs->nama }} - {{ $mhs->nim }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Dosen Selection -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="block text-lg font-semibold text-gray-800 flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                                        </svg>
                                    </div>
                                    Pilih Dosen Pembimbing
                                </label>
                                <div class="flex items-center gap-3">
                                    <button type="button" onclick="selectAll('dosen_select')"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Pilih Semua
                                    </button>
                                    <button type="button" onclick="unselectAll('dosen_select')"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 transition-colors duration-200">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Hapus Semua
                                    </button>
                                </div>
                            </div>

                            <div class="relative">
                                <select id="dosen_select" name="dosen_id[]" multiple required class="w-full">
                                    @foreach ($dosen as $dsn)
                                        <option value="{{ $dsn->id }}">{{ $dsn->nama }} - {{ $dsn->nidn }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-6">
                            <button type="submit"
                                class="group relative w-full flex justify-center items-center py-4 px-6 border border-transparent text-lg font-semibold rounded-lg text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg hover:shadow-md transition-all duration-300 transform hover:scale-[1.02]">
                                <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Kirin Rekomendasi
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/20 to-white/20 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.8s ease-out;
            }

            /* Custom scrollbar for tables */
            .overflow-x-auto::-webkit-scrollbar {
                height: 6px;
            }

            .overflow-x-auto::-webkit-scrollbar-track {
                background: #f1f5f9;
                border-radius: 3px;
            }

            .overflow-x-auto::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 3px;
            }

            .overflow-x-auto::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }

            /* TomSelect custom styling */
            .ts-control {
                border: 2px solid #e5e7eb !important;
                border-radius: 12px !important;
                padding: 8px 12px !important;
                background: linear-gradient(to bottom right, #ffffff, #f8fafc) !important;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06) !important;
                transition: all 0.2s ease !important;
            }

            .ts-control:focus {
                border-color: #6366f1 !important;
                box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1) !important;
            }

            .ts-item {
                background: linear-gradient(to right, #6366f1, #8b5cf6) !important;
                color: white !important;
                border: none !important;
                border-radius: 8px !important;
                margin: 2px !important;
                padding: 4px 8px !important;
                font-size: 0.875rem !important;
            }

            .ts-item .remove {
                color: rgba(255, 255, 255, 0.8) !important;
                border-left: 1px solid rgba(255, 255, 255, 0.2) !important;
                margin-left: 6px !important;
                padding-left: 6px !important;
            }

            .ts-item .remove:hover {
                color: white !important;
                background: rgba(255, 255, 255, 0.2) !important;
                border-radius: 4px !important;
            }

            .ts-dropdown {
                border: 2px solid #e5e7eb !important;
                border-radius: 12px !important;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
                backdrop-filter: blur(10px) !important;
                background: rgba(255, 255, 255, 0.95) !important;
            }

            .ts-dropdown .option {
                padding: 10px 12px !important;
                border-radius: 8px !important;
                margin: 4px !important;
                transition: all 0.2s ease !important;
            }

            .ts-dropdown .option:hover {
                background: linear-gradient(to right, #6366f1, #8b5cf6) !important;
                color: white !important;
                transform: translateX(4px) !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize TomSelect with enhanced styling
                const mahasiswaSelect = new TomSelect('#mahasiswa_select', {
                    plugins: ['remove_button'],
                    maxItems: null,
                    placeholder: 'Pilih mahasiswa...',
                    searchField: ['text'],
                    create: false,
                    render: {
                        option: function(data, escape) {
                            return '<div class="flex items-center justify-between p-2">' +
                                '<div>' +
                                '<div class="font-medium">' + escape(data.text.split(' - ')[0]) + '</div>' +
                                '<div class="text-sm text-gray-500">' + escape(data.text.split(' - ')[1]) +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        }
                    }
                });
                window.mahasiswaSelectInstance = mahasiswaSelect;

                const dosenSelect = new TomSelect('#dosen_select', {
                    plugins: ['remove_button'],
                    maxItems: null,
                    placeholder: 'Pilih dosen pembimbing...',
                    searchField: ['text'],
                    create: false,
                    render: {
                        option: function(data, escape) {
                            return '<div class="flex items-center justify-between p-2">' +
                                '<div>' +
                                '<div class="font-medium">' + escape(data.text.split(' - ')[0]) + '</div>' +
                                '<div class="text-sm text-gray-500">' + escape(data.text.split(' - ')[1]) +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        }
                    }
                });
                window.dosenSelectInstance = dosenSelect;
            });

            function selectAll(selectId) {
                const instanceMap = {
                    'mahasiswa_select': window.mahasiswaSelectInstance,
                    'dosen_select': window.dosenSelectInstance
                };

                const selectInstance = instanceMap[selectId];

                if (selectInstance) {
                    const allValues = Object.keys(selectInstance.options);
                    selectInstance.setValue(allValues);

                    // Add animation feedback
                    const button = event.target.closest('button');
                    button.classList.add('animate-pulse');
                    setTimeout(() => {
                        button.classList.remove('animate-pulse');
                    }, 500);
                } else {
                    console.error("Tom Select instance not found for:", selectId);
                }
            }

            function unselectAll(selectId) {
                const instanceMap = {
                    'mahasiswa_select': window.mahasiswaSelectInstance,
                    'dosen_select': window.dosenSelectInstance
                };

                const selectInstance = instanceMap[selectId];

                if (selectInstance) {
                    selectInstance.clear();

                    // Add animation feedback
                    const button = event.target.closest('button');
                    button.classList.add('animate-pulse');
                    setTimeout(() => {
                        button.classList.remove('animate-pulse');
                    }, 500);
                } else {
                    console.error("Tom Select instance not found for:", selectId);
                }
            }

            // Add loading state to form submission
            document.querySelector('form').addEventListener('submit', function(e) {
                const submitButton = this.querySelector('button[type="submit"]');
                const originalContent = submitButton.innerHTML;

                submitButton.disabled = true;
                submitButton.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Menyimpan...
            `;

                // Restore original state if form validation fails
                setTimeout(() => {
                    if (submitButton.disabled) {
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalContent;
                    }
                }, 5000);
            });
        </script>
    @endpush

@endsection
