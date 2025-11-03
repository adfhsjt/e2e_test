@extends('dosen.layouts.app')

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
                            Selamat Datang,
                        </h2>
                        <p class="text-lg font-semibold text-gray-600">
                            {{ Auth::guard('dosen')->user()->nama ?? 'Dosen' }}
                        </p>
                    </div>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>

                    <!-- Guided Students -->
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-gray-800">Membimbingi Mahasiswa</h3>
                            <a href="http://achieveup.test/dosen_pembimbing/bimbingan"
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

                        <!-- Student Cards -->
                        <div class="space-y-3">
                            <!-- Student 1 -->
                            <div
                                class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-purple-50 to-white border border-purple-100 hover:shadow-sm transition-all">
                                <div class="flex-shrink-0">
                                    <div class="relative w-12 h-12 rounded-lg border-2 border-amber-400 overflow-hidden">
                                        <img src="{{ Auth::guard('dosen')->user() && Auth::guard('dosen')->user()->foto ? asset(Auth::guard('dosen')->user()->foto) : asset('images/default-user.png') }}"
                                            onerror="this.onerror=null; this.src='{{ asset('images/default-user.png') }}';"
                                            class="w-full h-full object-cover" alt="Student">
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-semibold text-gray-800 text-sm">Ananda Putri</h4>
                                    <p class="text-xs text-gray-500">Teknik Informatika</p>
                                </div>
                                <div
                                    class="flex-shrink-0 bg-purple-100 text-purple-700 font-bold px-3 py-1 rounded-full text-sm">
                                    5</div>
                            </div>

                            <!-- Student 2 -->
                            <div
                                class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-purple-50 to-white border border-purple-100 hover:shadow-sm transition-all">
                                <div class="flex-shrink-0">
                                    <div class="relative w-12 h-12 rounded-lg border-2 border-amber-400 overflow-hidden">
                                        <img src="{{ Auth::guard('dosen')->user() && Auth::guard('dosen')->user()->foto ? asset(Auth::guard('dosen')->user()->foto) : asset('images/default-user.png') }}"
                                            onerror="this.onerror=null; this.src='{{ asset('images/default-user.png') }}';"
                                            class="w-full h-full object-cover" alt="Student">
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-semibold text-gray-800 text-sm">Budi Santoso</h4>
                                    <p class="text-xs text-gray-500">Sistem Informasi</p>
                                </div>
                                <div
                                    class="flex-shrink-0 bg-purple-100 text-purple-700 font-bold px-3 py-1 rounded-full text-sm">
                                    3</div>
                            </div>

                            <!-- Student 3 -->
                            <div
                                class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-purple-50 to-white border border-purple-100 hover:shadow-sm transition-all">
                                <div class="flex-shrink-0">
                                    <div class="relative w-12 h-12 rounded-lg border-2 border-amber-400 overflow-hidden">
                                        <img src="{{ Auth::guard('dosen')->user() && Auth::guard('dosen')->user()->foto ? asset(Auth::guard('dosen')->user()->foto) : asset('images/default-user.png') }}"
                                            onerror="this.onerror=null; this.src='{{ asset('images/default-user.png') }}';"
                                            class="w-full h-full object-cover" alt="Student">
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-semibold text-gray-800 text-sm">Cindy Wijaya</h4>
                                    <p class="text-xs text-gray-500">Teknik Elektro</p>
                                </div>
                                <div
                                    class="flex-shrink-0 bg-purple-100 text-purple-700 font-bold px-3 py-1 rounded-full text-sm">
                                    2</div>
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
                            <h3 class="font-medium text-gray-600">Pengajuan Di-Verifikasi</h3>
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
                            <h3 class="font-medium text-gray-600">Pengajuan Ditolak</h3>
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
                            <canvas id="myBarChart"></canvas>
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
                            <canvas id="myDonutChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Utils for Chart.js
                const Utils = {
                    CHART_COLORS: {
                        red: 'rgb(255, 99, 132)',
                        orange: 'rgb(255, 159, 64)',
                        yellow: 'rgb(255, 205, 86)',
                        green: 'rgb(75, 192, 192)',
                        blue: 'rgb(54, 162, 235)',
                        purple: 'rgb(153, 102, 255)',
                        grey: 'rgb(201, 203, 207)'
                    },
                    transparentize: function(color, opacity) {
                        var alpha = opacity === undefined ? 0.5 : 1 - opacity;
                        if (typeof color === 'string' && color.startsWith('rgb(')) {
                            return color.replace('rgb(', 'rgba(').replace(')', `, ${alpha})`);
                        }
                        return color;
                    }
                };

                // Bar Chart
                const ctx = document.getElementById('myBarChart');
                if (ctx) {
                    const barCtx = ctx.getContext('2d');

                    // Create gradient
                    const barGradient = barCtx.createLinearGradient(0, 0, 0, 400);
                    barGradient.addColorStop(0, 'rgba(96, 65, 206, 0.8)');
                    barGradient.addColorStop(1, 'rgba(96, 65, 206, 0.2)');

                    const myBarChart = new Chart(barCtx, {
                        type: 'bar',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            datasets: [{
                                label: 'Pengajuan',
                                data: [65, 59, 80, 81, 56, 55, 40],
                                borderColor: '#6041CE',
                                backgroundColor: barGradient,
                                borderWidth: 2,
                                barPercentage: 0.8,
                                categoryPercentage: 0.7,
                                borderSkipped: false,
                                borderRadius: 6
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    min: 0,
                                    max: 100,
                                    ticks: {
                                        stepSize: 20,
                                        color: '#6B7280',
                                        font: {
                                            family: 'Inter, system-ui, sans-serif'
                                        }
                                    },
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.05)',
                                        drawBorder: false
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: '#6B7280',
                                        font: {
                                            family: 'Inter, system-ui, sans-serif'
                                        }
                                    },
                                    grid: {
                                        display: false,
                                        drawBorder: false
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                        padding: 20,
                                        font: {
                                            family: 'Inter, system-ui, sans-serif'
                                        }
                                    }
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(255, 255, 255, 0.95)',
                                    titleColor: '#1F2937',
                                    bodyColor: '#4B5563',
                                    borderColor: 'rgba(203, 213, 225, 0.5)',
                                    borderWidth: 1,
                                    cornerRadius: 8
                                }
                            }
                        }
                    });
                }

                // Donut Chart
                const donutCtx = document.getElementById('myDonutChart');
                if (donutCtx) {
                    const myDonutChart = new Chart(donutCtx.getContext('2d'), {
                        type: 'doughnut',
                        data: {
                            labels: ['Akademik', 'Non-Akademik'],
                            datasets: [{
                                label: 'Jenis Prestasi',
                                data: [70, 30],
                                backgroundColor: ['#6041CE', '#FB8500'],
                                hoverOffset: 8,
                                borderRadius: 8,
                                borderColor: 'white',
                                borderWidth: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            cutout: '75%',
                            plugins: {
                                legend: {
                                    position: 'right',
                                    align: 'center',
                                    labels: {
                                        boxWidth: 12,
                                        padding: 20,
                                        font: {
                                            size: 14,
                                            family: 'Inter, system-ui, sans-serif'
                                        },
                                        usePointStyle: true
                                    }
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(255, 255, 255, 0.95)',
                                    titleColor: '#1F2937',
                                    bodyColor: '#4B5563',
                                    borderColor: 'rgba(203, 213, 225, 0.5)',
                                    borderWidth: 1,
                                    cornerRadius: 8,
                                    callbacks: {
                                        label: function(context) {
                                            const value = context.parsed;
                                            const total = context.dataset.data.reduce((acc, data) => acc +
                                                data, 0);
                                            const percentage = Math.round((value / total) * 100);
                                            return `${context.label}: ${percentage}% (${value})`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection
