@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-8">
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
            <h1 class="text-2xl font-bold mb-4">Selamat datang di Dashboard</h1>
            <p>Konten utama dashboard bisa ditampilkan di sini.</p>
        </div>

        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Statistik Prestasi Mahasiswa</h5>
            <p class="mb-4 font-normal text-gray-700">Grafik perkembangan prestasi mahasiswa tahun ini.</p>
            <canvas id="chartPrestasi" class="w-full h-40"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chartPrestasi').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar'],
                datasets: [{
                    label: 'Jumlah Prestasi',
                    data: [5, 8, 4],
                    backgroundColor: '#6041CE',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
