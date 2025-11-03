@extends('admin.layouts.app')

@section('title', 'Entropy')

@section('content')
    <div class="space-y-8">
        {{-- Tabel kriteria dan jenis kriteria --}}
        <div>
            <h1 class="text-lg font-bold mb-2">Kriteria dan Jenis Kriteria</h1>
            <!-- Tab Kriteria -->
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Kriteria
                        </th>
                        <th class="border border-black px-4 py-2 text-center">Jenis</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">IPK</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Jumlah Lomba yang Diikuti</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Prestasi Kemenangan Lomba</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Semester</td>
                        <td class="border border-black px-4 py-2 text-center">Cost</td>
                    </tr>
                </tbody>
            </table>
            <p id="kriteria_info" class="text-sm text-gray-500 mt-2"></p>
            <div id="kriteria_pagination" class="mt-2 flex flex-wrap gap-2"></div>
        </div>

        {{-- Tabel Prestasi Kemenangan Lomba --}}
        <div>
            <h1 class="text-lg font-bold mb-2">Prestasi Kemenangan Lomba</h1>
            <!-- Tab Kriteria -->
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Tingkat
                        </th>
                        <th class="border border-black px-4 py-2 text-center">
                            Pencapaian</th>
                        <th class="border border-black px-4 py-2 text-center">Individu
                        </th>
                        <th class="border border-black px-4 py-2 text-center">Kelompok
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Internasional -->
                    <tr>
                        <td rowspan="3" class="border border-black px-4 py-2 text-center font-medium text-gray-900">
                            Internasional</td>
                        <td class="border border-black px-4 py-2 text-center">Juara 1</td>
                        <td class="border border-black px-4 py-2 text-center">10</td>
                        <td class="border border-black px-4 py-2 text-center">5</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Juara 2</td>
                        <td class="border border-black px-4 py-2 text-center">8</td>
                        <td class="border border-black px-4 py-2 text-center">4</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Juara 3</td>
                        <td class="border border-black px-4 py-2 text-center">4</td>
                        <td class="border border-black px-4 py-2 text-center">2</td>
                    </tr>

                    <!-- Nasional -->
                    <tr>
                        <td rowspan="3" class="border border-black px-4 py-2 text-center font-medium text-gray-900">
                            Nasional</td>
                        <td class="border border-black px-4 py-2 text-center">Juara 1</td>
                        <td class="border border-black px-4 py-2 text-center">8</td>
                        <td class="border border-black px-4 py-2 text-center">4</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Juara 2</td>
                        <td class="border border-black px-4 py-2 text-center">6</td>
                        <td class="border border-black px-4 py-2 text-center">3</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Juara 3</td>
                        <td class="border border-black px-4 py-2 text-center">3</td>
                        <td class="border border-black px-4 py-2 text-center">1,5</td>
                    </tr>

                    <!-- Regional -->
                    <tr>
                        <td rowspan="3" class="border border-black px-4 py-2 text-center font-medium text-gray-900">
                            Regional</td>
                        <td class="border border-black px-4 py-2 text-center">Juara 1</td>
                        <td class="border border-black px-4 py-2 text-center">6</td>
                        <td class="border border-black px-4 py-2 text-center">3</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Juara 2</td>
                        <td class="border border-black px-4 py-2 text-center">4</td>
                        <td class="border border-black px-4 py-2 text-center">2</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Juara 3</td>
                        <td class="border border-black px-4 py-2 text-center">2</td>
                        <td class="border border-black px-4 py-2 text-center">1</td>
                    </tr>

                    <!-- Provinsi -->
                    <tr>
                        <td rowspan="3" class="border border-black px-4 py-2 text-center font-medium text-gray-900">
                            Provinsi</td>
                        <td class="border border-black px-4 py-2 text-center">Juara 1</td>
                        <td class="border border-black px-4 py-2 text-center">4</td>
                        <td class="border border-black px-4 py-2 text-center">1</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Juara 2</td>
                        <td class="border border-black px-4 py-2 text-center">2</td>
                        <td class="border border-black px-4 py-2 text-center">1</td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Juara 3</td>
                        <td class="border border-black px-4 py-2 text-center">1</td>
                        <td class="border border-black px-4 py-2 text-center">0,5</td>
                    </tr>
                </tbody>
            </table>

            <p id="prestasi_kemenangan_lomba_info" class="text-sm text-gray-500 mt-2"></p>
            <div id="prestasi_kemenangan_lomba_pagination" class="mt-2 flex flex-wrap gap-2"></div>
        </div>

        {{-- Tabel Bobot Kriteria IPK --}}
        <div>
            <h1 class="text-lg font-bold mb-2">Bobot Kriteria IPK</h1>
            <!-- Tab Kriteria IPK-->
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">
                            Presentase
                        </th>
                        <th class="border border-black px-4 py-2 text-center">Bobot
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">≥ 3,5</td>
                        <td class="border border-black px-4 py-2 text-center">5</td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">3,5 &lt; IPK ≤ 2,5</td>
                        <td class="border border-black px-4 py-2 text-center">4</td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">2,5 &lt; IPK ≤ 1,5</td>
                        <td class="border border-black px-4 py-2 text-center">3</td>
                    </tr>

                    <!-- Row 4 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">&lt; 1,5</td>
                        <td class="border border-black px-4 py-2 text-center">2</td>
                    </tr>
                </tbody>
            </table>
            <p id="bobot_ipk_info" class="text-sm text-gray-500 mt-2"></p>
            <div id="bobot_ipk_pagination" class="mt-2 flex flex-wrap gap-2"></div>
        </div>
        {{-- Tabel Bobot Kriteria Skor Bahasa Inggris --}}
        <div>
            <h1 class="text-lg font-bold mb-2">Bobot Kriteria Bahasa Inggris</h1>
            <!-- Tab Kriteria Skor Bahasa Inggris-->
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">
                            Presentase</th>
                        <th class="border border-black px-4 py-2 text-center">Bobot
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">≥ 850</td>
                        <td class="border border-black px-4 py-2 text-center">5</td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">850 &lt; skor ≤ 650</td>
                        <td class="border border-black px-4 py-2 text-center">4</td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">650 &lt; skor ≤ 450</td>
                        <td class="border border-black px-4 py-2 text-center">3</td>
                    </tr>

                    <!-- Row 4 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">&lt; 450</td>
                        <td class="border border-black px-4 py-2 text-center">2</td>
                    </tr>
                </tbody>
            </table>
            <p id="skor_bahasa_inggris_info" class="text-sm text-gray-500 mt-2"></p>
            <div id="skor_bahasa_inggris_pagination" class="mt-2 flex flex-wrap gap-2"></div>
        </div>
        {{-- Tabel Bobot Pengalaman Organisasi --}}
        <div>
            <h1 class="text-lg font-bold mb-2">Bobot Pengalaman Organisasi</h1>
            <!-- Tab Kriteria Pengalaman Organisasi-->
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">
                            Presentase</th>
                        <th class="border border-black px-4 py-2 text-center">Bobot
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">&gt; 3</td>
                        <td class="border border-black px-4 py-2 text-center">5</td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">3 ≤ jml ≤ 1</td>
                        <td class="border border-black px-4 py-2 text-center">3</td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">&lt; 1</td>
                        <td class="border border-black px-4 py-2 text-center">1</td>
                    </tr>
                </tbody>
            </table>

            <p id="pengalaman_organisasi_info" class="text-sm text-gray-500 mt-2"></p>
            <div id="pengalaman_organisasi_pagination" class="mt-2 flex flex-wrap gap-2"></div>
        </div>
        {{-- Tabel Bobot Semester --}}
        <div>
            <h1 class="text-lg font-bold mb-2">Bobot Semester</h1>
            <!-- Tab Kriteria Semester-->
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th colspan="2"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Semester</th>
                    </tr>
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">
                            Presentase</th>
                        <th class="border border-black px-4 py-2 text-center">Bobot
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">7-8</td>
                        <td class="border border-black px-4 py-2 text-center">2</td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">5-6</td>
                        <td class="border border-black px-4 py-2 text-center">3</td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">3-4</td>
                        <td class="border border-black px-4 py-2 text-center">4</td>
                    </tr>

                    <!-- Row 4 -->
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">1-2</td>
                        <td class="border border-black px-4 py-2 text-center">5</td>
                    </tr>
                </tbody>
            </table>

            <p id="semester_info" class="text-sm text-gray-500 mt-2"></p>
            <div id="semester_pagination" class="mt-2 flex flex-wrap gap-2"></div>
        </div>

        {{-- Tabel Sampel Data --}}
        <h1 class="text-lg font-bold mb-2">Sample Data</h1>

        <div class="data-alternatif">
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                        <th class="border border-black px-4 py-2 text-center">Bobot IPK</th>
                        <th class="border border-black px-4 py-2 text-center">Jumlah Lomba Akademik (IA, NA, RE, PR)</th>
                        <th class="border border-black px-4 py-2 text-center">Jumlah Lomba Non-Akademik (IA, NA, RE, PR)
                        </th>
                        <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                        <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                        <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                        <th class="border border-black px-4 py-2 text-center">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                foreach ($getSampleData as $data): ?>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['alternatif']) ?>
                        </td>
                        <td class="border border-black px-4 py-2 text-center"><?= number_format($data['ipk'], 2) ?></td>
                        <td class="border border-black px-4 py-2 text-center">
                            <?= htmlspecialchars($data['lomba_akademik']) ?></td>
                        <td class="border border-black px-4 py-2 text-center">
                            <?= htmlspecialchars($data['lomba_nonakademik']) ?></td>
                        <td class="border border-black px-4 py-2 text-center">
                            <?= number_format($data['pengalaman_organisasi'], 2) ?></td>
                        <td class="border border-black px-4 py-2 text-center">
                            <?= number_format($data['skor_bahasa_inggris'], 2) ?></td>
                        <td class="border border-black px-4 py-2 text-center">
                            <?= htmlspecialchars($data['prestasi_kemenangan'], 2) ?></td>
                        <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['semester']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        {{-- Tabel Perhitungan Skor Lomba Mahasiswa --}}
        @foreach ($getScoreLomba as $item)
            <div class="mb-10">
                <h5 class="text-lg font-semibold text-gray-800 mb-3">Jumlah Lomba yang Diikuti ({{ $item['alternatif'] }})
                    </h1>
                    <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200">
                        <table class="table-auto w-full border border-black rounded shadow">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-black px-4 py-2 text-center font-bold ">
                                        Tingkat</th>
                                    <th class="border border-black px-4 py-2 text-center font-bold ">
                                        Akademik</th>
                                    <th class="border border-black px-4 py-2 text-center font-bold ">
                                        Non-Akademik</th>
                                    <th class="border border-black px-4 py-2 text-center font-bold ">
                                        Bobot Akademik</th>
                                    <th class="border border-black px-4 py-2 text-center font-bold ">
                                        Bobot Non-Akademik</th>
                                    <th class="border border-black px-4 py-2 text-center font-bold ">
                                        Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @php
                                    $rowTotal = function ($ak, $nak) {
                                        return number_format($ak * 0.1 + $nak * 0.05, 2);
                                    };
                                @endphp

                                <!-- Internasional Row -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="border border-black px-4 py-2 text-center font-bold ">Internasional</td>
                                    <td class="border border-black px-4 py-2 text-center">
                                        {{ $item['internasional_akademik'] }}</td>
                                    <td class="border border-black px-4 py-2 text-center">
                                        {{ $item['internasional_nonakademik'] }}</td>
                                    <td class="border border-black px-4 py-2 text-center text-blue-600">
                                        {{ number_format($item['internasional_akademik_bobot'], 2) }}</td>
                                    <td class="border border-black px-4 py-2 text-center text-blue-600">
                                        {{ number_format($item['internasional_nonakademik_bobot'], 2) }}</td>
                                    <td class="border border-black px-4 py-2 text-center font-semibold">
                                        {{ $rowTotal($item['internasional_akademik'], $item['internasional_nonakademik']) }}
                                    </td>
                                </tr>

                                <!-- Nasional Row -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="border border-black px-4 py-2 text-center font-bold">Nasional</td>
                                    <td class="border border-black px-4 py-2 text-center">{{ $item['nasional_akademik'] }}
                                    </td>
                                    <td class="border border-black px-4 py-2 text-center">
                                        {{ $item['nasional_nonakademik'] }}</td>
                                    <td class="border border-black px-4 py-2 text-center text-blue-600">
                                        {{ number_format($item['nasional_akademik_bobot'], 2) }}</td>
                                    <td class="border border-black px-4 py-2 text-center text-blue-600">
                                        {{ number_format($item['nasional_nonakademik_bobot'], 2) }}</td>
                                    <td class="border border-black px-4 py-2 text-center font-semibold">
                                        {{ $rowTotal($item['nasional_akademik'], $item['nasional_nonakademik']) }}</td>
                                </tr>

                                <!-- Regional Row -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="border border-black px-4 py-2 text-center font-bold">Regional</td>
                                    <td class="border border-black px-4 py-2 text-center">{{ $item['regional_akademik'] }}
                                    </td>
                                    <td class="border border-black px-4 py-2 text-center">
                                        {{ $item['regional_nonakademik'] }}</td>
                                    <td class="border border-black px-4 py-2 text-center text-blue-600">
                                        {{ number_format($item['regional_akademik_bobot'], 2) }}</td>
                                    <td class="border border-black px-4 py-2 text-center text-blue-600">
                                        {{ number_format($item['regional_nonakademik_bobot'], 2) }}</td>
                                    <td class="border border-black px-4 py-2 text-center font-semibold">
                                        {{ $rowTotal($item['regional_akademik'], $item['regional_nonakademik']) }}</td>
                                </tr>

                                <!-- Provinsi Row -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="border border-black px-4 py-2 text-center font-bold">Provinsi</td>
                                    <td class="border border-black px-4 py-2 text-center">{{ $item['provinsi_akademik'] }}
                                    </td>
                                    <td class="border border-black px-4 py-2 text-center">
                                        {{ $item['provinsi_nonakademik'] }}</td>
                                    <td class="border border-black px-4 py-2 text-center text-blue-600">
                                        {{ number_format($item['provinsi_akademik_bobot'], 2) }}</td>
                                    <td class="border border-black px-4 py-2 text-center text-blue-600">
                                        {{ number_format($item['provinsi_nonakademik_bobot'], 2) }}</td>
                                    <td class="border border-black px-4 py-2 text-center font-semibold">
                                        {{ $rowTotal($item['provinsi_akademik'], $item['provinsi_nonakademik']) }}</td>
                                </tr>

                                <!-- Total Row -->
                                <tr class="bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <td colspan="5" class="border border-black px-4 py-2 text-right font-bold">
                                        Total</td>
                                    <td class="border border-black px-4 py-2 text-center font-bold text-lg text-blue-700">
                                        {{ number_format($item['totalScore'], 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        @endforeach

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
                    <tr>
                        <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['alternatif']) ?>
                        </td>
                        <td class="border border-black px-4 py-2 text-center"><?= number_format($data['ipk'], 2) ?></td>
                        <td class="border border-black px-4 py-2 text-center">
                            <?= htmlspecialchars($data['jumlah_lomba']) ?></td>
                        <td class="border border-black px-4 py-2 text-center">
                            <?= number_format($data['pengalaman_organisasi'], 2) ?></td>
                        <td class="border border-black px-4 py-2 text-center">
                            <?= number_format($data['skor_bahasa_inggris'], 2) ?></td>
                        <td class="border border-black px-4 py-2 text-center">
                            <?= number_format($data['prestasi_kemenangan'], 2) ?></td>
                        <td class="border border-black px-4 py-2 text-center"><?= number_format($data['semester'], 2) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        {{-- Tabel Nilai Maksimal dan Minimal --}}
        <div class="data-nilai-max-min">
            <h1 class="text-lg font-bold mb-2">Nilai Maksimal dan Minimal</h1>
            <div class="container">
                <table class="table-auto w-full border border-black rounded shadow">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-black px-4 py-2 text-center"></th>
                            @foreach ($getMaxMin['max'] as $kriteria => $nilaiMax)
                                <th class="border border-black px-4 py-2 text-center">
                                    {{ ucfirst(str_replace('_', ' ', $kriteria)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-black px-4 py-2 text-center"><strong>Maksimum</strong></td>
                            @foreach ($getMaxMin['max'] as $nilaiMax)
                                <td class="border border-black px-4 py-2 text-center">{{ number_format($nilaiMax, 2) }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="border border-black px-4 py-2 text-center"><strong>Minimum</strong></td>
                            @foreach ($getMaxMin['min'] as $nilaiMin)
                                <td class="border border-black px-4 py-2 text-center">{{ number_format($nilaiMin, 2) }}
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabel Normalisasi --}}
        <div class="data-normalisasi">
            <h1 class="text-lg font-bold mb-2">Data Normalisasi</h1>
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                        <th class="border border-black px-4 py-2 text-center">IPK</th>
                        <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                        <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                        <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                        <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                        <th class="border border-black px-4 py-2 text-center">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getNormalisasi as $data)
                        <tr>
                            <td class="border border-black px-4 py-2 text-center">{{ $data['alternatif'] }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ number_format($data['ipk'], 2) }}
                            </td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['jumlah_lomba'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['pengalaman_organisasi'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['skor_bahasa_inggris'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['prestasi_kemenangan'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['semester'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Total Nilai Kriteria dari Matrix Keputusan --}}
        <div class="data-total-nilai-kriteria">
            <h1 class="text-lg font-bold mb-2">Total Nilai Kriteria dari Matrix Keputusan</h1>
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
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Total</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ number_format($getTotalKriteria['ipk'], 2) }}</td>
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

        {{-- Tabel Nilai Proporsi --}}
        <div class="data-nilai-proporsi">
            <h1 class="text-lg font-bold mb-2">Nilai Proporsi</h1>
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                        <th class="border border-black px-4 py-2 text-center">IPK</th>
                        <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                        <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                        <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                        <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                        <th class="border border-black px-4 py-2 text-center">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getNilaiProporsional as $data)
                        <tr>
                            <td class="border border-black px-4 py-2 text-center">{{ $data['alternatif'] }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ number_format($data['ipk'], 2) }}
                            </td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['jumlah_lomba'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['pengalaman_organisasi'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['skor_bahasa_inggris'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['prestasi_kemenangan'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['semester'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Mencari Nilai ln --}}
        <div class="data-ln">
            <h1 class="text-lg font-bold mb-2">Nilai ln</h1>
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                        <th class="border border-black px-4 py-2 text-center">IPK</th>
                        <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                        <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                        <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                        <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                        <th class="border border-black px-4 py-2 text-center">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getNilaiLn as $data)
                        <tr>
                            <td class="border border-black px-4 py-2 text-center">{{ $data['alternatif'] }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ number_format($data['ipk'], 2) }}
                            </td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['jumlah_lomba'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['pengalaman_organisasi'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['skor_bahasa_inggris'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['prestasi_kemenangan'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['semester'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Tabel Perhitungan P * ln --}}
        <div class="data-perhitungan-p-ln">
            <h1 class="text-lg font-bold mb-2">Perhitungan P * ln</h1>
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                        <th class="border border-black px-4 py-2 text-center">IPK</th>
                        <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                        <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                        <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                        <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                        <th class="border border-black px-4 py-2 text-center">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getNilaiProporsionalKaliLn as $data)
                        <tr>
                            <td class="border border-black px-4 py-2 text-center">{{ $data['alternatif'] }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ number_format($data['ipk'], 2) }}
                            </td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['jumlah_lomba'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['pengalaman_organisasi'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['skor_bahasa_inggris'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['prestasi_kemenangan'], 2) }}</td>
                            <td class="border border-black px-4 py-2 text-center">
                                {{ number_format($data['semester'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Tabel Total Nilai P * ln --}}
        <div class="data-total-nilai-p-ln">
            <h1 class="text-lg font-bold mb-2">Total Nilai P * Ln</h1>
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
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Total</td>
                        <td class="border border-black px-4 py-2 text-center">{{ number_format($getTotalPLn['ipk'], 2) }}
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ number_format($getTotalPLn['jumlah_lomba'], 2) }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ number_format($getTotalPLn['pengalaman_organisasi'], 2) }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ number_format($getTotalPLn['skor_bahasa_inggris'], 2) }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ number_format($getTotalPLn['prestasi_kemenangan'], 2) }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ number_format($getTotalPLn['semester'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Nilai Ej --}}
        <div class="nilai_ej">
            <h1 class="text-lg font-bold mb-2">Nilai Ej</h1>
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Nilai Ej</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiEj }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tabel Nilai Entrophy --}}
        <div class="nilai_entrophy">
            <h1 class="text-lg font-bold mb-2">Nilai Entrophy</h1>
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center"></th>
                        <th class="border border-black px-4 py-2 text-center">E1</th>
                        <th class="border border-black px-4 py-2 text-center">E2</th>
                        <th class="border border-black px-4 py-2 text-center">E3</th>
                        <th class="border border-black px-4 py-2 text-center">E4</th>
                        <th class="border border-black px-4 py-2 text-center">E5</th>
                        <th class="border border-black px-4 py-2 text-center">E6</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Nilai Entrophy</th>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiEntrophy['E1'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiEntrophy['E2'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiEntrophy['E3'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiEntrophy['E4'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiEntrophy['E5'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiEntrophy['E6'] }}</td>

                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tabel Nilai Dispersi --}}
        <div class="nilai_dispersi">
            <h1 class="text-lg font-bold mb-2">Nilai Dispersi</h1>
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center"></th>
                        <th class="border border-black px-4 py-2 text-center">D1</th>
                        <th class="border border-black px-4 py-2 text-center">D2</th>
                        <th class="border border-black px-4 py-2 text-center">D3</th>
                        <th class="border border-black px-4 py-2 text-center">D4</th>
                        <th class="border border-black px-4 py-2 text-center">D5</th>
                        <th class="border border-black px-4 py-2 text-center">D6</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Nilai Dispersi</th>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiDispersi['D1'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiDispersi['D2'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiDispersi['D3'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiDispersi['D4'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiDispersi['D5'] }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $getNilaiDispersi['D6'] }}</td>

                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Total Nilai Dispersi --}}
        <div class="total_dispersi">
            <h1 class="text-lg font-bold mb-2">Total Nilai Dispersi</h1>
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Total Nilai Dispersi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">{{ $getTotalNilaiDispersi }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Bobot Kriteria --}}
        <div class="bobot_kriteria">
            <h1 class="text-lg font-bold mb-2">Bobot Kriteria</h1>
            <table class="table-auto w-full border border-black rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-black px-4 py-2 text-center"></th>
                        <th class="border border-black px-4 py-2 text-center">W1</th>
                        <th class="border border-black px-4 py-2 text-center">W2</th>
                        <th class="border border-black px-4 py-2 text-center">W3</th>
                        <th class="border border-black px-4 py-2 text-center">W4</th>
                        <th class="border border-black px-4 py-2 text-center">W5</th>
                        <th class="border border-black px-4 py-2 text-center">W6</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="border border-black px-4 py-2 text-center">Nilai Dispersi</th>
                        @foreach ($getBobotKriteria['bobot_kriteria'] as $item)
                            <td class="border border-black px-4 py-2 text-center">{{ $item }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

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
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">IPK</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                        <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['ipk'], 4, ',', ''); ?></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Jumlah Lomba yang Diikuti</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                        <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['jumlah_lomba'], 4, ',', ''); ?></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                        <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['pengalaman_organisasi'], 4, ',', ''); ?></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                        <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['skor_bahasa_inggris'], 4, ',', ''); ?></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Prestasi Kemenangan Lomba</td>
                        <td class="border border-black px-4 py-2 text-center">Benefit</td>
                        <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['prestasi_kemenangan'], 4, ',', ''); ?></td>
                    </tr>
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">Semester</td>
                        <td class="border border-black px-4 py-2 text-center">Cost</td>
                        <td class="border border-black px-4 py-2 text-center"><?php echo number_format($getBobotKriteria['data_bobot']['semester'], 4, ',', ''); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            function updateChart(metode) {
                const ctx = document.getElementById('chartPrestasi').getContext('2d');
                const data = {
                    labels: ['Jan', 'Feb', 'Mar'],
                    datasets: [{
                        label: 'Jumlah Prestasi',
                        data: metode === 'entropy' ? [5, 8, 4] : [3, 6, 9],
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

            document.getElementById('metode').addEventListener('change', function() {
                updateChart(this.value);
            });

            updateChart('entropy');
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
