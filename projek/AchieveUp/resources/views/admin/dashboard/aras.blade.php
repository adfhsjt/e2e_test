@extends('admin.layouts.app')

@section('title', 'Aras')

@section('content')

    {{-- Tabel Data Bobot --}}
    <div class="data_bobot">
        <h1 class="text-lg font-bold mb-2">Data Bobot</h1>
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Kriteria</th>
                    <th class="border border-black px-4 py-2 text-center">Jenis Kriteria</th>
                    <th class="border border-black px-4 py-2 text-center">Bobot Kriteria</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center">IPK</td>
                    <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['ipk'], 4, ',', ''); ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center">Jumlah Lomba yang Diikuti</td>
                    <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['jumlah_lomba'], 4, ',', ''); ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</td>
                    <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['pengalaman_organisasi'], 4, ',', ''); ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</td>
                    <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['skor_bahasa_inggris'], 4, ',', ''); ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center">Prestasi Kemenangan Lomba</td>
                    <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['prestasi_kemenangan'], 4, ',', ''); ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center">Semester</td>
                    <td class="border border-black px-4 py-2 text-center">Cost</td>
                    <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['semester'], 4, ',', ''); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Tabel Data Alternatif --}}
    <h1 class="text-lg font-bold mb-2">Data Alternatif Mahasiswa</h1>

    <div class="data-alternatif">
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                    <th class="border border-black px-4 py-2 text-center">Bobot IPK</th>
                    <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                    <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                    <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                    <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                    <th class="border border-black px-4 py-2 text-center">Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($getDataAlternatif as $data): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['alternatif']) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['ipk'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['jumlah_lomba'], 2) ?>
                    </td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['pengalaman_organisasi'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['skor_bahasa_inggris'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['prestasi_kemenangan'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['semester'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    {{-- Tabel Data Alternatif Setiap Kriteria --}}
    <h1 class="text-lg font-bold mb-2">Data Alternatif Mahasiswa Setiap Kriteria</h1>

    <div class="data-alternatif-setiap-kriteria">
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                    <th class="border border-black px-4 py-2 text-center">Bobot IPK</th>
                    <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                    <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                    <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                    <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                    <th class="border border-black px-4 py-2 text-center">Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($getAlternatif as $data): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['alternatif']) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['ipk'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['jumlah_lomba'], 2) ?>
                    </td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['pengalaman_organisasi'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['skor_bahasa_inggris'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['prestasi_kemenangan'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['semester'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    {{-- Normalisai --}}
    <h1 class="text-lg font-bold mb-2">Normalisasi</h1>

    {{-- Data Baru --}}
    <h1 class="text-lg font-bold mb-2">Data Baru</h1>

    <div class="data-baru">
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                    <th class="border border-black px-4 py-2 text-center">Bobot IPK</th>
                    <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                    <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                    <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                    <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                    <th class="border border-black px-4 py-2 text-center">Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($getDataBaru as $data): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['alternatif']) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['ipk'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['jumlah_lomba'], 2) ?>
                    </td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['pengalaman_organisasi'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['skor_bahasa_inggris'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['prestasi_kemenangan'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['semester'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    {{-- Tabel Total Setiap Kriteria --}}
    <div class="data-total-setiap-kriteria">
        <h1 class="text-lg font-bold mb-2">Total Setiap Kriteria</h1>
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center"></th>
                    <th class="border border-black px-4 py-2 text-center">IPK</th>
                    <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                    <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                    <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                    <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                    <th class="border border-black px-4 py-2 text-center">Semester</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center">Total</td>
                    <td class="border border-black px-4 py-2 text-center">{{ number_format($getTotalKriteria['ipk'], 2) }}
                    </td>
                    <td class="border border-black px-4 py-2 text-center">
                        {{ number_format($getTotalKriteria['jumlah_lomba'], 2) }}</td>
                    <td class="border border-black px-4 py-2 text-center">
                        {{ number_format($getTotalKriteria['pengalaman_organisasi'], 2) }}</td>
                    <td class="border border-black px-4 py-2 text-center">
                        {{ number_format($getTotalKriteria['skor_bahasa_inggris'], 2) }}</td>
                    <td class="border border-black px-4 py-2 text-center">
                        {{ number_format($getTotalKriteria['prestasi_kemenangan'], 2) }}</td>
                    <td class="border border-black px-4 py-2 text-center">
                        {{ number_format($getTotalKriteria['semester'], 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Tabel Hasil Normalisasi Terbobot --}}
    <h1 class="text-lg font-bold mb-2">Hasil Normalisasi Terbobot</h1>

    <div class="hasil-normalisasi">
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                    <th class="border border-black px-4 py-2 text-center">Bobot IPK</th>
                    <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                    <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                    <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                    <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                    <th class="border border-black px-4 py-2 text-center">Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($getNormalisasi as $data): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['alternatif']) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['ipk'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['jumlah_lomba'], 2) ?>
                    </td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['pengalaman_organisasi'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['skor_bahasa_inggris'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($data['prestasi_kemenangan'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['semester'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    {{-- Tabel Utilitas --}}
    <div class="tabel-utilitas mt-8">
        <h1 class="text-lg font-bold mb-2">Tabel Utilitas</h1>
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                    <th class="border border-black px-4 py-2 text-center">Bobot IPK</th>
                    <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                    <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                    <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                    <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                    <th class="border border-black px-4 py-2 text-center">Semester</th>
                    <th class="border border-black px-4 py-2 text-center">Nilai Si</th>
                    <th class="border border-black px-4 py-2 text-center">Nilai Ki</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getNormalisasi as $i => $data)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-black px-4 py-2 text-center">{{ $data['alternatif'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ number_format($data['ipk'], 2) }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ number_format($data['jumlah_lomba'], 2) }}
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ number_format($data['pengalaman_organisasi'], 2) }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ number_format($data['skor_bahasa_inggris'], 2) }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ number_format($data['prestasi_kemenangan'], 2) }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ number_format($data['semester'], 2) }}
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ isset($getNilaiUtilitas[$i]['nilaiSi']) ? number_format($getNilaiUtilitas[$i]['nilaiSi'], 2) : '-' }}
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ isset($getNilaiUtilitas[$i]['nilaiKi']) && $getNilaiUtilitas[$i]['nilaiKi'] !== null ? number_format($getNilaiUtilitas[$i]['nilaiKi'], 2) : '-' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Ranking --}}
    <div class="tabel-ranking mt-8">
        <h1 class="text-lg font-bold mb-2">Tabel Ranking</h1>
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                    <th class="border border-black px-4 py-2 text-center">Nilai Si</th>
                    <th class="border border-black px-4 py-2 text-center">Nilai Ki</th>
                    <th class="border border-black px-4 py-2 text-center">Ranking</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($getRanking as $i => $data)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-black px-4 py-2 text-center">{{ $data['alternatif'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ isset($data['nilaiSi']) ? number_format($data['nilaiSi'], 2) : '-' }}
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ isset($data['nilaiKi']) && $data['nilaiKi'] !== null ? number_format($data['nilaiKi'], 2) : '-' }}
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ isset($data['ranking']) ? number_format($data['ranking'], 0) : '-' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fungsi untuk mengupdate chart berdasarkan metode yang dipilih
        function updateChart(metode) {
            const ctx = document.getElementById('chartPrestasi').getContext('2d');
            const data = {
                labels: ['Jan', 'Feb', 'Mar'],
                datasets: [{
                    label: 'Jumlah Prestasi',
                    data: metode === 'aras' ? [5, 8, 4] : [3, 6, 9],
                    backgroundColor: '#6041CE',
                }]
            };
            ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            new Chart(ctx, {
                type: 'bar',
                data: data,
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
        }

        // Event listener untuk dropdown
        document.getElementById('metode').addEventListener('change', function() {
            updateChart(this.value);
        });

        // Inisialisasi chart dengan metode default
        updateChart('aras');
    </script>
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
