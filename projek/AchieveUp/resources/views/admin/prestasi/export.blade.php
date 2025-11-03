<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DAFTAR PRESTASI MAHASISWA (SETUJUI)</title>
    <style>
        body {
            font-family: sans-serif;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }
        th, td {
            padding: 6px;
            border: 1px solid #000;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #eee;
            font-weight: bold;
        }
        .center {
            text-align: center;
        }
        .mahasiswa-row {
            margin-bottom: 3px;
            display: block;
        }
    </style>
</head>
<body>
    <h2>DAFTAR PRESTASI MAHASISWA (DISETUJUI)</h2>
    <table>
        <thead>
            <tr>
                <th class="center">NO</th>
                <th class="center">NAMA KEJUARAAN</th>
                <th class="center">TINGKAT</th>
                <th class="center">NIM</th>
                <th class="center">NAMA MAHASISWA</th>
                <th class="center">PRODI</th>
                <th class="center">NAMA DOSEN PEMBIMBING</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestasis as $index => $prestasi)
                <tr>
                    <td class="center">{{ $index + 1 }}</td>
                    <td>
                        @php
                            $namaLomba = '-';
                            if($prestasi->bidangs->isNotEmpty()) {
                                $bidang = $prestasi->bidangs->first();
                                if($bidang->lomba->isNotEmpty()) {
                                    $namaLomba = $bidang->lomba->first()->judul;
                                }
                            }
                        @endphp
                        {{ $namaLomba }}
                    </td>
                    <td>
                        @php
                            $tingkatLomba = '-';
                            if($prestasi->bidangs->isNotEmpty()) {
                                $bidang = $prestasi->bidangs->first();
                                if($bidang->lomba->isNotEmpty()) {
                                    $tingkatLomba = $bidang->lomba->first()->tingkat;
                                }
                            }
                        @endphp
                        {{ ucfirst(strtolower($tingkatLomba)) }}
                    </td>
                    <td class="center">
                        @foreach($prestasi->mahasiswas as $mahasiswa)
                            <div class="mahasiswa-row">{{ $mahasiswa->nim }}</div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($prestasi->mahasiswas as $mahasiswa)
                            <div class="mahasiswa-row">{{ $mahasiswa->nama }}</div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($prestasi->mahasiswas as $mahasiswa)
                            <div class="mahasiswa-row">{{ $mahasiswa->programStudi->nama ?? '-' }}</div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($prestasi->dosens as $dosen)
                            <div class="mahasiswa-row">{{ $dosen->nama }}</div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>