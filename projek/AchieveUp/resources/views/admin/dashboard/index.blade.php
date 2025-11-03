@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 p-4">
            <!-- Profile Widget -->
            <div class="lg:col-span-4 h-auto">
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                    <!-- Profile Header -->
                    <div class="flex flex-col items-center p-6">
                        <div class="relative mb-4">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-violet-500/30 to-purple-700/30 rounded-full blur-[10px]">
                            </div>
                            <div class="relative w-28 h-28 rounded-full border-4 border-white shadow-lg overflow-hidden">
                                <img src="{{ Auth::guard('dosen')->user() && Auth::guard('dosen')->user()->foto ? asset(Auth::guard('dosen')->user()->foto) : asset('images/default-user.png') }}"
                                    onerror="this.onerror=null; this.src='{{ asset('images/default-user.png') }}';"
                                    alt="User Image"
                                    class="w-full h-full object-cover transition-all duration-300 hover:scale-105" />
                            </div>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">
                            {{ Auth::guard('dosen')->user()->nama ?? 'clockingoffbye' }}
                        </h2>
                        <p class="text-gray-500">
                            {{ Auth::guard('dosen')->user()->role ?? 'clockingoffbye' }}
                        </p>
                    </div>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>

                    <!-- Top Participants -->
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-gray-800">Top Partisipasi Lomba</h3>
                            <a href=""
                                class="text-purple-600 text-sm font-medium flex items-center gap-1 hover:gap-2 transition-all">
                                Lihat Semua
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>

                        <!-- Participant Cards -->
                        <div class="space-y-3">
                            <!-- Gold Participant -->
                            <div
                                class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-amber-50 to-white border border-amber-100 hover:shadow-sm transition-all">
                                <div class="flex-shrink-0">
                                    <div class="relative w-12 h-12 rounded-lg border-2 border-amber-400 overflow-hidden">
                                        <span
                                            class="absolute -top-1 -left-1 bg-amber-400 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-br">1</span>
                                        <img src="{{ asset('images/default-user.png') }}" class="w-full h-full object-cover"
                                            alt="Participant">
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-semibold text-gray-800 text-sm">Ananda Putri</h4>
                                    <p class="text-xs text-gray-500">Teknik Informatika</p>
                                </div>
                                <div
                                    class="flex-shrink-0 bg-purple-100 text-purple-700 font-bold px-3 py-1 rounded-full text-sm">
                                    12</div>
                            </div>

                            <!-- Silver Participant -->
                            <div
                                class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-slate-50 to-white border border-slate-100 hover:shadow-sm transition-all">
                                <div class="flex-shrink-0">
                                    <div class="relative w-12 h-12 rounded-lg border-2 border-slate-400 overflow-hidden">
                                        <span
                                            class="absolute -top-1 -left-1 bg-slate-400 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-br">2</span>
                                        <img src="{{ asset('images/default-user.png') }}" class="w-full h-full object-cover"
                                            alt="Participant">
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-semibold text-gray-800 text-sm">Budi Santoso</h4>
                                    <p class="text-xs text-gray-500">Sistem Informasi</p>
                                </div>
                                <div
                                    class="flex-shrink-0 bg-purple-100 text-purple-700 font-bold px-3 py-1 rounded-full text-sm">
                                    8</div>
                            </div>

                            <!-- Bronze Participant -->
                            <div
                                class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-orange-50 to-white border border-orange-100 hover:shadow-sm transition-all">
                                <div class="flex-shrink-0">
                                    <div class="relative w-12 h-12 rounded-lg border-2 border-orange-400 overflow-hidden">
                                        <span
                                            class="absolute -top-1 -left-1 bg-orange-400 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-br">3</span>
                                        <img src="{{ asset('images/default-user.png') }}" class="w-full h-full object-cover"
                                            alt="Participant">
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-semibold text-gray-800 text-sm">Cindy Wijaya</h4>
                                    <p class="text-xs text-gray-500">Teknik Elektro</p>
                                </div>
                                <div
                                    class="flex-shrink-0 bg-purple-100 text-purple-700 font-bold px-3 py-1 rounded-full text-sm">
                                    5</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-8 flex flex-col gap-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Pending Verification -->
                    <div
                        class="bg-white rounded-lg p-5 shadow-md hover:shadow-lg transition-all duration-300 border-t-4 border-gray-700">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-medium text-gray-600">Pengajuan Verifikasi</h3>
                            <span class="text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </div>
                        <p class="text-3xl font-bold">100</p>
                    </div>

                    <!-- Verified -->
                    <div
                        class="bg-white rounded-lg p-5 shadow-md hover:shadow-lg transition-all duration-300 border-t-4 border-green-500">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-medium text-gray-600">Diverifikasi</h3>
                            <span class="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </div>
                        <p class="text-3xl font-bold">100</p>
                    </div>

                    <!-- Rejected -->
                    <div
                        class="bg-white rounded-lg p-5 shadow-md hover:shadow-lg transition-all duration-300 border-t-4 border-red-500">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-medium text-gray-600">Ditolak</h3>
                            <span class="text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </div>
                        <p class="text-3xl font-bold">100</p>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bar Chart Card -->
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-gray-800">Total Prestasi Mahasiswa</h3>
                            <div class="dropdown relative">
                                <button class="p-1 rounded hover:bg-gray-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="h-64">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>

                    <!-- Donut Chart Card -->
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-gray-800">Jenis Prestasi</h3>
                            <div class="dropdown relative">
                                <button class="p-1 rounded hover:bg-gray-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="h-64 flex items-center justify-center">
                            <canvas id="donutChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ranking Section -->
        <div class="p-4">
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Peringkat Mahasiswa</h2>

                    <!-- Control Panel -->
                    <div class="flex flex-wrap gap-4 mb-6">
                        <!-- Method Selection -->
                        <div class="flex-grow max-w-xs">
                            <label for="metode" class="block mb-2 text-sm font-medium text-gray-700">Pilih Metode
                                Pemeringkatan</label>
                            <div class="relative">
                                <select id="metode"
                                    class="block w-full py-2.5 px-4 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent appearance-none pr-10">
                                    <option value="entropy">Entropy</option>
                                    <option value="electre">Electre</option>
                                    <option value="aras">Aras</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-end gap-2 ml-auto">
                            <button
                                class="px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-lg flex items-center gap-1.5 font-medium transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                <span>Export Data</span>
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-hidden rounded-lg border border-gray-200">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Peringkat</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama Mahasiswa</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            NIM</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Program Studi</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Skor</th>
                                        <th
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <!-- Row 1 -->
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-amber-100 text-amber-600 font-bold shadow-sm">1</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">John Doe</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">12345678</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">Teknik Informatika</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">98.5</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <button
                                                class="text-blue-600 hover:text-blue-800 transition-colors hover:underline">Detail</button>
                                        </td>
                                    </tr>

                                    <!-- Row 2 -->
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-600 font-bold shadow-sm">2</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">Jane Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">87654321</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">Sistem Informasi</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">92.3</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <button
                                                class="text-blue-600 hover:text-blue-800 transition-colors hover:underline">Detail</button>
                                        </td>
                                    </tr>

                                    <!-- Row 3 -->
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-orange-100 text-orange-600 font-bold shadow-sm">3</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">Alex Johnson</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">45678901</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">Teknik Elektro</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">87.6</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <button
                                                class="text-blue-600 hover:text-blue-800 transition-colors hover:underline">Detail</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Footer Links -->
                    <div class="flex flex-wrap justify-center gap-3 mt-6">
                        <a href="{{ route('admin.dashboard.entropy') }}"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-md hover:bg-gray-50 text-gray-700 font-medium transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Langkah-langkah Entropy
                        </a>
                        <a href="{{ route('admin.dashboard.electre') }}"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-md hover:bg-gray-50 text-gray-700 font-medium transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Langkah-langkah Electre
                        </a>
                        <a href="{{ route('admin.dashboard.aras') }}"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-md hover:bg-gray-50 text-gray-700 font-medium transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Langkah-langkah Aras
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Time -->
        <div class="p-4">
            <div class="bg-white rounded-lg shadow-md p-4 flex justify-between items-center">
                <div class="text-sm text-gray-500">
                    <span>Last Updated: 2025-06-09 21:47:05</span>
                </div>
                <div>
                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">
                        {{ Auth::guard('dosen')->user()->nama ?? 'clockingoffbye' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Custom Chart Configuration
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
                const prestasiData = [65, 59, 80, 81, 56, 55, 40];

                // Custom colors
                const primaryColor = '#6366F1'; // Indigo
                const secondaryColor = '#8B5CF6'; // Violet
                const tertiaryColor = '#EC4899'; // Pink
                const quaternaryColor = '#F97316'; // Orange

                // Chart Options - Custom Theme
                const defaultOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    family: 'Inter, system-ui, sans-serif',
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            enabled: true,
                            backgroundColor: 'rgba(255, 255, 255, 0.95)',
                            titleColor: '#1F2937',
                            bodyColor: '#4B5563',
                            borderColor: 'rgba(203, 213, 225, 0.5)',
                            borderWidth: 1,
                            cornerRadius: 8,
                            padding: 12,
                            boxPadding: 6,
                            usePointStyle: true,
                            callbacks: {
                                // Custom tooltip formatting
                                labelPointStyle: function() {
                                    return {
                                        pointStyle: 'rectRounded',
                                        rotation: 0
                                    };
                                }
                            }
                        }
                    }
                };

                // BAR CHART - Completely custom with gradients
                const barCtx = document.getElementById('barChart').getContext('2d');

                // Create gradient
                const barGradient = barCtx.createLinearGradient(0, 0, 0, 400);
                barGradient.addColorStop(0, 'rgba(99, 102, 241, 0.8)');
                barGradient.addColorStop(1, 'rgba(99, 102, 241, 0.2)');

                const barChart = new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Prestasi',
                            data: prestasiData,
                            backgroundColor: barGradient,
                            borderColor: primaryColor,
                            borderWidth: 2,
                            borderRadius: 6,
                            borderSkipped: false,
                            hoverBackgroundColor: primaryColor
                        }]
                    },
                    options: {
                        ...defaultOptions,
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    drawBorder: false,
                                    color: 'rgba(0, 0, 0, 0.05)'
                                },
                                ticks: {
                                    font: {
                                        family: 'Inter, system-ui, sans-serif',
                                        size: 11
                                    },
                                    color: '#6B7280'
                                }
                            },
                            x: {
                                grid: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    font: {
                                        family: 'Inter, system-ui, sans-serif',
                                        size: 11
                                    },
                                    color: '#6B7280'
                                }
                            }
                        },
                        plugins: {
                            ...defaultOptions.plugins,
                            tooltip: {
                                ...defaultOptions.plugins.tooltip,
                                callbacks: {
                                    ...defaultOptions.plugins.tooltip.callbacks,
                                    title: function(tooltipItems) {
                                        return 'Bulan: ' + tooltipItems[0].label;
                                    },
                                    label: function(context) {
                                        return `Total Prestasi: ${context.parsed.y}`;
                                    }
                                }
                            }
                        }
                    }
                });

                // DONUT CHART - Custom with pattern fills
                const donutCtx = document.getElementById('donutChart').getContext('2d');

                const donutChart = new Chart(donutCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Akademik', 'Non-Akademik'],
                        datasets: [{
                            data: [65, 35],
                            backgroundColor: [primaryColor, quaternaryColor],
                            borderColor: 'white',
                            borderWidth: 4,
                            hoverOffset: 15,
                            borderRadius: 4
                        }]
                    },
                    options: {
                        ...defaultOptions,
                        cutout: '70%',
                        plugins: {
                            ...defaultOptions.plugins,
                            tooltip: {
                                ...defaultOptions.plugins.tooltip,
                                callbacks: {
                                    label: function(context) {
                                        const value = context.parsed;
                                        const total = context.dataset.data.reduce((acc, data) => acc + data,
                                            0);
                                        const percentage = Math.round((value / total) * 100);
                                        return `${context.label}: ${percentage}% (${value})`;
                                    }
                                }
                            },
                            legend: {
                                position: 'right',
                                align: 'center'
                            }
                        }
                    }
                });

                const metodeSelect = document.getElementById('metode');
                if (metodeSelect) {
                    metodeSelect.addEventListener('change', function() {
                        console.log(`Method changed to: ${this.value}`);
                        // Here you would typically fetch new data based on the method
                    });
                }
            });
        </script>
    @endpush
@endsection
