@extends('admin.layouts.app')

@section('title', 'Electre')

@section('content')
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

    {{-- Mencari Penyebut --}}
    <div class="nilai_penyebut">
        <h1 class="text-lg font-bold mb-2">Nilai Penyebut</h1>
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
                    <td class="border border-black px-4 py-2 text-center">Nilai</td>
                    <td class="border border-black px-4 py-2 text-center">{{ number_format($getPenyebut['ipk'], 2) }}</td>
                    <td class="border border-black px-4 py-2 text-center">
                        {{ number_format($getPenyebut['jumlah_lomba'], 2) }}</td>
                    <td class="border border-black px-4 py-2 text-center">
                        {{ number_format($getPenyebut['pengalaman_organisasi'], 2) }}</td>
                    <td class="border border-black px-4 py-2 text-center">
                        {{ number_format($getPenyebut['skor_bahasa_inggris'], 2) }}</td>
                    <td class="border border-black px-4 py-2 text-center">
                        {{ number_format($getPenyebut['prestasi_kemenangan'], 2) }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ number_format($getPenyebut['semester'], 2) }}
                    </td>

                </tr>
            </tbody>
        </table>
    </div>

    {{-- Matriks Normalisasi Terbobot --}}
    <h1 class="text-lg font-bold mb-2">Matriks Normalisasi Terbobot</h1>

    <div class="data-matriks-normalisasi-terbobot">
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
                <?php 
                foreach ($getMatriksNormalisasiTerbobot as $data): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['alternatif']) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['ipk'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['jumlah_lomba']) ?>
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
                <tr class="hover:bg-gray-50">
                    <th class="border border-black px-4 py-2 text-center">Nilai Dispersi</th>
                    @foreach ($getBobotKriteria['bobot_kriteria'] as $item)
                        <td class="border border-black px-4 py-2 text-center">{{ $item }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Hasil Pembobotan Matriks --}}
    <h1 class="text-lg font-bold mb-2">Hasil Pembobotan Matriks</h1>

    <div class="data-matriks-normalisasi-terbobot">
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
                foreach ($getHasilPembobotanMatriks as $data): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['alternatif']) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= number_format($data['ipk'], 2) ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= htmlspecialchars($data['jumlah_lomba']) ?>
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

    {{-- Nilai Corcondace --}}
    <div class="nilai-corcondace">
        <h1 class="text-lg font-bold mb-2">Nilai Corcondace</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Pasangan</th>
                    <th class="border border-black px-4 py-2 text-center">IPK</th>
                    <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                    <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                    <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                    <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                    <th class="border border-black px-4 py-2 text-center">Semester</th>
                    <th class="border border-black px-4 py-2 text-center">Nilai Concordance</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        foreach ($getNilaiCorcondace as $item) {
            $key = key($item); 
            $values = $item[$key];
            $altPair = str_replace('-', '', $key); 
        ?>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center"><?= $altPair ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['ipk'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['jumlah_lomba'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['pengalaman_organisasi'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['skor_bahasa_inggris'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['prestasi_kemenangan'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['semester'] ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($values['total'], 4, ',', '') ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    {{-- Matriks Corcondace --}}
    <div>
        <h1 class="text-lg font-bold mb-2">Matriks Corcondace</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center"></th>
                    <?php
                    $concordanceMatrix = $getCorcondace;
                    $jumlahAlternatif = count($getDataAlternatif);
                    
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        echo '<th class="border border-black px-4 py-2 text-center">A' . $j . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                    echo '<tr class="hover:bg-gray-50">';
                    echo '<th class="border border-black px-4 py-2 text-center">A' . $i . '</th>'; // Row header
                
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        $key = 'A-' . $i . '-' . $j;
                        $value = $concordanceMatrix[$key] ?? '-';
                
                        if ($value !== '-') {
                            // Format number with 4 decimal places and comma as decimal separator
                            $formattedValue = number_format($value, 4, ',', '');
                            echo '<td class="border border-black px-4 py-2 text-center">' . $formattedValue . '</td>';
                        } else {
                            echo '<td class="border border-black px-4 py-2 text-center">-</td>';
                        }
                    }
                
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    {{-- Menghitng Nilai Treshold C --}}
    <div class="treshold_c">
        <h1 class="text-lg font-bold mb-2">Nilai Treshold C</h1>
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Total Nilai C</th>
                    <th class="border border-black px-4 py-2 text-center">Treshold</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center">{{ $getNilaiC }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $getTresholdC }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Matriks Dominan C --}}
    <div>
        <h1 class="text-lg font-bold mb-2">Matriks Dominan C</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">F</th>
                    <?php
                    $concordanceMatrix = $getMatriksDominanC;
                    $jumlahAlternatif = count($getDataAlternatif);
                    
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        echo '<th class="border border-black px-4 py-2 text-center">A' . $j . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                    echo '<tr class="hover:bg-gray-50">';
                    echo '<th class="border border-black px-4 py-2 text-center">A' . $i . '</th>'; // Row header
                
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        $key = 'A-' . $i . '-' . $j;
                        $value = $concordanceMatrix[$key] ?? '-';
                
                        if ($value !== '-') {
                            // Format number with 4 decimal places and comma as decimal separator
                            $formattedValue = number_format($value, 0, ',', '');
                            echo '<td class="border border-black px-4 py-2 text-center">' . $formattedValue . '</td>';
                        } else {
                            echo '<td class="border border-black px-4 py-2 text-center">-</td>';
                        }
                    }
                
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    {{-- Discordance --}}

    {{-- Nilai Discordance --}}
    <div class="nilai-discordance">
        <h1 class="text-lg font-bold mb-2">Nilai Discordance</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Pasangan</th>
                    <th class="border border-black px-4 py-2 text-center">IPK</th>
                    <th class="border border-black px-4 py-2 text-center">Jumlah Lomba</th>
                    <th class="border border-black px-4 py-2 text-center">Pengalaman Organisasi</th>
                    <th class="border border-black px-4 py-2 text-center">Skor Bahasa Inggris</th>
                    <th class="border border-black px-4 py-2 text-center">Prestasi Kemenangan</th>
                    <th class="border border-black px-4 py-2 text-center">Semester</th>
                    <th class="border border-black px-4 py-2 text-center">Nilai Discordance</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $discordanceData = $getNilaiDiscordance;
            foreach ($discordanceData as $key => $values) {
                $altPair = str_replace('-', '', $key); // Convert 'A-i-j' to 'Aij'
            ?>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center"><?= $altPair ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['ipk'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['jumlah_lomba'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['pengalaman_organisasi'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['skor_bahasa_inggris'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['prestasi_kemenangan'] ?></td>
                    <td class="border border-black px-4 py-2 text-center"><?= $values['semester'] ?></td>
                    <td class="border border-black px-4 py-2 text-center">
                        <?= number_format($values['total'], 4, ',', '') ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    {{-- Matriks Discordance --}}
    <div>
        <h1 class="text-lg font-bold mb-2">Matriks Discordance</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center"></th>
                    <?php
                    $concordanceMatrix = $getDiscordance;
                    $jumlahAlternatif = count($getDataAlternatif);
                    
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        echo '<th class="border border-black px-4 py-2 text-center">A' . $j . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                    echo '<tr class="hover:bg-gray-50">';
                    echo '<th class="border border-black px-4 py-2 text-center">A' . $i . '</th>'; // Row header
                
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        $key = 'A-' . $i . '-' . $j;
                        $value = $concordanceMatrix[$key] ?? '-';
                
                        if ($value !== '-') {
                            // Format number with 4 decimal places and comma as decimal separator
                            $formattedValue = number_format($value, 4, ',', '');
                            echo '<td class="border border-black px-4 py-2 text-center">' . $formattedValue . '</td>';
                        } else {
                            echo '<td class="border border-black px-4 py-2 text-center">-</td>';
                        }
                    }
                
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    {{-- Menghitng Nilai Treshold D --}}
    <div class="treshold_c">
        <h1 class="text-lg font-bold mb-2">Nilai Treshold D</h1>
        <table class="table-auto w-full border border-black rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Total Nilai D</th>
                    <th class="border border-black px-4 py-2 text-center">Treshold</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="border border-black px-4 py-2 text-center">{{ $getNilaiD }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $getTresholdD }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Matriks Dominan D --}}
    <div>
        <h1 class="text-lg font-bold mb-2">Matriks Dominan D</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">G</th>
                    <?php
                    $concordanceMatrix = $getMatriksDominanD;
                    $jumlahAlternatif = count($getDataAlternatif);
                    
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        echo '<th class="border border-black px-4 py-2 text-center">A' . $j . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                    echo '<tr class="hover:bg-gray-50">';
                    echo '<th class="border border-black px-4 py-2 text-center">A' . $i . '</th>'; // Row header
                
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        $key = 'A-' . $i . '-' . $j;
                        $value = $concordanceMatrix[$key] ?? '-';
                
                        if ($value !== '-') {
                            // Format number with 4 decimal places and comma as decimal separator
                            $formattedValue = number_format($value, 0, ',', '');
                            echo '<td class="border border-black px-4 py-2 text-center">' . $formattedValue . '</td>';
                        } else {
                            echo '<td class="border border-black px-4 py-2 text-center">-</td>';
                        }
                    }
                
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    {{-- Matriks Agregat E --}}
    <div>
        <h1 class="text-lg font-bold mb-2">Matriks Agregat E</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">E</th>
                    <?php
                    $concordanceMatrix = $getAgregatDominanMatriks;
                    $jumlahAlternatif = count($getDataAlternatif);
                    
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        echo '<th class="border border-black px-4 py-2 text-center">A' . $j . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                    echo '<tr class="hover:bg-gray-50">';
                    echo '<th class="border border-black px-4 py-2 text-center">A' . $i . '</th>'; // Row header
                
                    for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                        $key = 'A-' . $i . '-' . $j;
                        $value = $concordanceMatrix[$key] ?? '-';
                
                        if ($value !== '-') {
                            // Format number with 4 decimal places and comma as decimal separator
                            $formattedValue = number_format($value, 0, ',', '');
                            echo '<td class="border border-black px-4 py-2 text-center">' . $formattedValue . '</td>';
                        } else {
                            echo '<td class="border border-black px-4 py-2 text-center">-</td>';
                        }
                    }
                
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    {{-- Tabel Ranking --}}
    <div class="table-ranking">
        <h1 class="text-lg font-bold mb-2">Tabel Ranking</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-black px-4 py-2 text-center">Alternatif</th>
                    <th class="border border-black px-4 py-2 text-center">C</th>
                    <th class="border border-black px-4 py-2 text-center">D</th>
                    <th class="border border-black px-4 py-2 text-center">E</th>
                    <th class="border border-black px-4 py-2 text-center">Rank</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rankingData = $getRanking;
                foreach ($rankingData as $index => $item) {
                    $altLabel = 'Alternatif ' . ($index + 1);
                    $cDetails = $item['concordance']['details'] ?? [];
                    $dDetails = $item['discordance']['details'] ?? [];
                
                    // Ambil nilai C dan D total (baris pertama)
                    $cTotal = number_format($item['concordance']['total'] ?? 0, 4, ',', '');
                    $dTotal = number_format($item['discordance']['total'] ?? 0, 4, ',', '');
                    $netFlow = number_format($item['net_flow'] ?? 0, 4, ',', '');
                    $rank = $item['rank'];
                
                    // Hitung jumlah baris detail berdasarkan jumlah pasangan comparison
                    $rowCount = max(count($cDetails), count($dDetails));
                    $keys = array_keys($cDetails + $dDetails);
                
                    for ($i = 0; $i < $rowCount; $i++) {
                        echo '<tr class="hover:bg-gray-50">';
                        if ($i === 0) {
                            echo '<td class="border border-black px-4 py-2 text-center" rowspan="' . $rowCount . '">' . $altLabel . '</td>';
                            echo '<td class="border border-black px-4 py-2 text-center">' . $cTotal . '</td>';
                            echo '<td class="border border-black px-4 py-2 text-center">' . $dTotal . '</td>';
                            echo '<td class="border border-black px-4 py-2 text-center" rowspan="' . $rowCount . '">' . $netFlow . '</td>';
                            echo '<td class="border border-black px-4 py-2 text-center" rowspan="' . $rowCount . '">' . $rank . '</td>';
                        } else {
                            // Ambil nilai dari masing-masing detail jika tersedia
                            $cKey = $keys[$i] ?? null;
                            $dKey = $keys[$i] ?? null;
                
                            $cVal = $cKey && isset($cDetails[$cKey]['total']) ? number_format($cDetails[$cKey]['total'], 4, ',', '') : '';
                            $dVal = $dKey && isset($dDetails[$dKey]['total']) ? number_format($dDetails[$dKey]['total'], 4, ',', '') : '';
                
                            echo '<td class="border border-black px-4 py-2 text-center">' . $cVal . '</td>';
                            echo '<td class="border border-black px-4 py-2 text-center">' . $dVal . '</td>';
                            // echo '<td class="border border-black px-4 py-2 text-center"></td>';
                        }
                        echo '</tr>';
                    }
                }
                ?>
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
                    data: metode === 'electre' ? [5, 8, 4] : [3, 6, 9],
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
        updateChart('electre');
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
