@extends('mahasiswa.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 p-4">
            <!-- Profile Widget -->
            <div class="lg:col-span-4 h-auto">
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
                    <!-- Profile Header -->
                    <div class="flex flex-col items-center p-6">
                        <div class="relative mb-4">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-violet-500/30 to-purple-700/30 rounded-full blur-[10px]">
                            </div>
                            <div class="relative w-28 h-28 rounded-full border-4 border-white shadow-lg overflow-hidden">
                                <img src="{{ Auth::guard('mahasiswa')->user() && Auth::guard('mahasiswa')->user()->foto ? asset(Auth::guard('mahasiswa')->user()->foto) : asset('images/default-user.png') }}"
                                    onerror="this.onerror=null; this.src='{{ asset('images/default-user.png') }}';"
                                    alt="User Image"
                                    class="w-full h-full object-cover transition-all duration-300 hover:scale-105" />
                            </div>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">
                            {{ Auth::guard('mahasiswa')->user()->nama ?? '-' }}
                        </h2>
                        <p class="text-sm text-gray-500">Mahasiswa</p>
                    </div>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>

                    <!-- Recent Competitions -->
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-gray-800">Lomba Terakhir</h3>
                            <a href="{{ route('mahasiswa.prestasi.index') }}"
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

                        <!-- Competition Cards -->
                        <div class="space-y-3">
                            @if ($prestasiTerakhir && $prestasiTerakhir->count() > 0)
                                @foreach ($prestasiTerakhir->take(3) as $prestasi)
                                    <div
                                        class="p-3 rounded-xl bg-gradient-to-r from-purple-50 to-white border border-purple-100 hover:shadow-sm transition-all">
                                        <div class="flex flex-col">
                                            <div class="flex justify-between items-start">
                                                <h4 class="font-semibold text-gray-800 text-sm line-clamp-1">
                                                    {{ $prestasi->judul }}</h4>
                                                @if ($prestasi->juara)
                                                    <div class="flex-shrink-0 ml-2">
                                                        <span
                                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                            Juara {{ $prestasi->juara }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex justify-end items-center mt-1">
                                                <span class="text-xs text-gray-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 inline mr-1"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($prestasi->tanggal_selesai)->locale('id')->isoFormat('D MMM YYYY') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div
                                    class="flex flex-col items-center justify-center p-6 rounded-xl bg-gray-50 border border-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                    <p class="text-sm text-gray-600 text-center">
                                        Belum ada data prestasi/lomba terbaru.
                                    </p>
                                    <a href="{{ route('mahasiswa.prestasi.create') }}"
                                        class="mt-3 px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-lg hover:bg-purple-700 transition-colors">
                                        Tambah Prestasi
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-8 flex flex-col gap-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Pending Verification -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                        <div class="h-1 bg-gray-700"></div>
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-medium text-gray-600">Pengajuan Verifikasi</h3>
                                <span class="text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold">{{ $totalPrestasiDiajukan }}</p>
                        </div>
                    </div>

                    <!-- Verified -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                        <div class="h-1 bg-green-700"></div>
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-medium text-gray-600">Di-Verifikasi</h3>
                                <span class="text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold">{{ $totalPrestasiDisetujui }}</p>
                        </div>
                    </div>

                    <!-- Rejected -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                        <div class="h-1 bg-red-700"></div>
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-medium text-gray-600">Ditolak</h3>
                                <span class="text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold">{{ $totalPrestasiDitolak }}</p>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bar Chart Card -->
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
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
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
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

                <!-- Quick Actions -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                    <h3 class="font-bold text-gray-800 mb-4">Aksi Cepat</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <a href="{{ route('mahasiswa.prestasi.create') }}"
                            class="flex items-center gap-3 p-4 bg-gradient-to-r from-purple-50 to-white border border-purple-100 rounded-xl hover:shadow-sm transition-all">
                            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <span class="font-medium text-gray-800">Tambah Prestasi</span>
                        </a>

                        <a href="{{ route('mahasiswa.prestasi.index') }}"
                            class="flex items-center gap-3 p-4 bg-gradient-to-r from-blue-50 to-white border border-blue-100 rounded-xl hover:shadow-sm transition-all">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <span class="font-medium text-gray-800">Daftar Prestasi</span>
                        </a>

                        <a href="#"
                            class="flex items-center gap-3 p-4 bg-gradient-to-r from-amber-50 to-white border border-amber-100 rounded-xl hover:shadow-sm transition-all">
                            <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                            </div>
                            <span class="font-medium text-gray-800">Sertifikat</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Time -->
        <div class="p-4">
            <div class="bg-white rounded-xl shadow-sm p-4 flex justify-between items-center">
                <div class="text-sm text-gray-500">
                    <span>Terakhir diperbarui: {{ date('d M Y H:i:s') }}</span>
                </div>
                <div>
                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">
                        {{ Auth::guard('mahasiswa')->user()->nama ?? 'User' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Chart Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
            const prestasiData = [65, 59, 80, 81, 56, 55, 40];

            const primaryColor = '#6366F1'; 
            const secondaryColor = '#8B5CF6'; 
            const tertiaryColor = '#EC4899';
            const quaternaryColor = '#F97316'; 

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

            // BAR CHART
            const barCtx = document.getElementById('barChart').getContext('2d');

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

            // DONUT CHART
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
                });
            }
        });
    </script>
@endsection
