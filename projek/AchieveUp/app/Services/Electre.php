<?php

namespace App\Services;

use app\Services\Entrophy;

class Electre
{
    protected $entrophy;

    public function __construct(Entrophy $entropy)
    {
        $this->entrophy = $entropy;
    }

    public function getAllFunction()
    {
        return [
            'getPenyebut' => $this->getPenyebut(),
            'getMatriksNormalisasiTerbobot' => $this->getMatriksNormalisasiTerbobot(),
            'getHasilPembobotanMatriks' => $this->getHasilPembobotanMatriks(),
            'getNilaiCorcondace' => $this->getNilaiCorcondace(),
            'getCorcondace' => $this->getCorcondace(),
            'getNilaiC' => $this->getNilaiC(),
            'getTresholdC' => $this->getTresholdC(),
            'getMatriksDominanC' => $this->getMatriksDominanC(),
            'getNilaiDiscordance' => $this->getNilaiDiscordance(),
            'getDiscordance' => $this->getDiscordance(),
            'getNilaiD' => $this->getNilaiD(),
            'getTresholdD' => $this->getTresholdD(),
            'getMatriksDominanD' => $this->getMatriksDominanD(),
            'getAgregatDominanMatriks' => $this->getAgregatDominanMatriks(),
            'getRanking' => $this->getRanking(),
        ];
    }

    public function getPenyebut()
    {
        $matriksNormalisasi = $this->entrophy->getNormalisasi();

        $data = [
            'ipk' => 0,
            'jumlah_lomba' => 0,
            'pengalaman_organisasi' => 0,
            'skor_bahasa_inggris' => 0,
            'prestasi_kemenangan' => 0,
            'semester' => 0,
        ];

        foreach ($matriksNormalisasi as $row) {
            $data['ipk'] += pow($row['ipk'], 2);
            $data['jumlah_lomba'] += pow($row['jumlah_lomba'], 2);
            $data['pengalaman_organisasi'] += pow($row['pengalaman_organisasi'], 2);
            $data['skor_bahasa_inggris'] += pow($row['skor_bahasa_inggris'], 2);
            $data['prestasi_kemenangan'] += pow($row['prestasi_kemenangan'], 2);
            $data['semester'] += pow($row['semester'], 2);
        }
        foreach ($data as $key => $value) {
            $data[$key] = round(sqrt($value), 4);
        }
        return $data;
    }

    public function getMatriksNormalisasiTerbobot()
    {
        $matriksNormalisasi = $this->entrophy->getNormalisasi();
        $penyebut = $this->getPenyebut();

        $hasil = [];
        foreach ($matriksNormalisasi as $row) {
            $hasil[] = [
                'alternatif' => $row['alternatif'],
                'nama' => $row['nama'],
                'ipk' => round($row['ipk'] / $penyebut['ipk'], 4),
                'jumlah_lomba' => round($row['jumlah_lomba'] / $penyebut['jumlah_lomba'], 4),
                'pengalaman_organisasi' => round($row['pengalaman_organisasi'] / $penyebut['pengalaman_organisasi'], 4),
                'skor_bahasa_inggris' => round($row['skor_bahasa_inggris'] / $penyebut['skor_bahasa_inggris'], 4),
                'prestasi_kemenangan' => round($row['prestasi_kemenangan'] / $penyebut['prestasi_kemenangan'], 4),
                'semester' => round($row['semester'] / $penyebut['semester'], 4),
            ];
        }
        return $hasil;
    }

    public function getHasilPembobotanMatriks()
    {
        $matriksNormalisasiTerbobot = $this->getMatriksNormalisasiTerbobot();
        $bobotKriteria = $this->entrophy->getBobotKriteria()['bobot_kriteria'];

        $hasil = [];
        foreach ($matriksNormalisasiTerbobot as $row) {
            $hasil[] = [
                'alternatif' => $row['alternatif'],
                'nama' => $row['nama'],
                'ipk' => round($row['ipk'] * $bobotKriteria['W1'], 4),
                'jumlah_lomba' => round($row['jumlah_lomba'] * $bobotKriteria['W2'], 4),
                'pengalaman_organisasi' => round($row['pengalaman_organisasi'] * $bobotKriteria['W3'], 4),
                'skor_bahasa_inggris' => round($row['skor_bahasa_inggris'] * $bobotKriteria['W4'], 4),
                'prestasi_kemenangan' => round($row['prestasi_kemenangan'] * $bobotKriteria['W5'], 4),
                'semester' => round($row['semester'] * $bobotKriteria['W6'], 4),
            ];
        }
        return $hasil;
    }

    public function getNilaiCorcondace()
    {
        $jumlahAlternatif = count($this->entrophy->getDataAlternatif());
        $hasilPembobotan = $this->getHasilPembobotanMatriks();
        $bobot = $this->entrophy->getBobotKriteria()['bobot_kriteria'];
        $data = [];

        // Generate all alternative pairs with new key format A-i-j
        for ($i = 1; $i <= $jumlahAlternatif; $i++) {
            for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                if ($i != $j) {
                    $data[] = [
                        'A-' . $i . '-' . $j => [ // Format key: A-i-j (contoh: A-1-2, A-12-13)
                            'ipk' => 0,
                            'jumlah_lomba' => 0,
                            'pengalaman_organisasi' => 0,
                            'skor_bahasa_inggris' => 0,
                            'prestasi_kemenangan' => 0,
                            'semester' => 0,
                            'total' => 0,
                        ],
                    ];
                }
            }
        }

        foreach ($data as $index => $item) {
            $keys = array_keys($item);
            $key = $keys[0]; // Contoh: 'A-12-13'

            // Ekstrak i dan j dengan mudah menggunakan explode
            $parts = explode('-', $key);
            $i = (int) $parts[1];
            $j = (int) $parts[2];

            // Validasi indeks
            if ($i < 1 || $i > $jumlahAlternatif || $j < 1 || $j > $jumlahAlternatif) {
                continue;
            }

            $altI = $hasilPembobotan[$i - 1] ?? null;
            $altJ = $hasilPembobotan[$j - 1] ?? null;

            if ($altI && $altJ) {
                // Hitung nilai concordance
                $data[$index][$key]['ipk'] = ($altI['ipk'] >= $altJ['ipk']) ? 1 : 0;
                $data[$index][$key]['jumlah_lomba'] = ($altI['jumlah_lomba'] >= $altJ['jumlah_lomba']) ? 1 : 0;
                $data[$index][$key]['pengalaman_organisasi'] = ($altI['pengalaman_organisasi'] >= $altJ['pengalaman_organisasi']) ? 1 : 0;
                $data[$index][$key]['skor_bahasa_inggris'] = ($altI['skor_bahasa_inggris'] >= $altJ['skor_bahasa_inggris']) ? 1 : 0;
                $data[$index][$key]['prestasi_kemenangan'] = ($altI['prestasi_kemenangan'] >= $altJ['prestasi_kemenangan']) ? 1 : 0;
                $data[$index][$key]['semester'] = ($altI['semester'] >= $altJ['semester']) ? 1 : 0;

                // Hitung total concordance
                $data[$index][$key]['total'] = (
                    $data[$index][$key]['ipk'] * $bobot['W1'] +
                    $data[$index][$key]['jumlah_lomba'] * $bobot['W2'] +
                    $data[$index][$key]['pengalaman_organisasi'] * $bobot['W3'] +
                    $data[$index][$key]['skor_bahasa_inggris'] * $bobot['W4'] +
                    $data[$index][$key]['prestasi_kemenangan'] * $bobot['W5'] +
                    $data[$index][$key]['semester'] * $bobot['W6']
                );
            }
        }

        return $data;
    }

    public function getCorcondace()
    {
        $nilaiConcordance = $this->getNilaiCorcondace();
        $jumlahAlternatif = count($this->entrophy->getDataAlternatif());
        $matriks = [];

        for ($i = 1; $i <= $jumlahAlternatif; $i++) {
            for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                $key = 'A-' . $i . '-' . $j;
                if ($i == $j) {
                    $matriks[$key] = '-';
                } else {
                    $found = '-';
                    foreach ($nilaiConcordance as $item) {
                        if (isset($item[$key])) {
                            $found = $item[$key]['total'];
                            break;
                        }
                    }
                    $matriks[$key] = $found;
                }
            }
        }

        return $matriks;
    }

    public function getNilaiC()
    {
        $matriksConcordance = $this->getCorcondace();
        $total = 0;

        foreach ($matriksConcordance as $value) {
            if ($value !== '-') {
                $total += $value;
            }
        }

        return $total;
    }

    public function getTresholdC()
    {
        $nilaiC = $this->getNilaiC();
        $jumlahAlternatif = count($this->entrophy->getDataAlternatif());
        $nilaiTreshold = round($nilaiC / ($jumlahAlternatif * ($jumlahAlternatif - 1)), 4);
        return $nilaiTreshold;
    }

    public function getMatriksDominanC()
    {
        $nilaiTreshold = $this->getTresholdC();
        $matriksConcordance = $this->getCorcondace();
        $matriksDominan = [];

        foreach ($matriksConcordance as $key => $value) {
            if ($value === '-') {
                $matriksDominan[$key] = '-';
            } else {
                $matriksDominan[$key] = ($value >= $nilaiTreshold) ? 1 : 0;
            }
        }

        return $matriksDominan;
    }

    public function getNilaiDiscordance()
    {
        $dataConcordance = $this->getNilaiCorcondace();
        $hasilPembobotan = $this->getHasilPembobotanMatriks();
        $dataDiscordance = [];

        // Ubah format hasilPembobotan ke [alternatifIndex => data]
        $pembobotanByIndex = [];
        foreach ($hasilPembobotan as $index => $item) {
            $pembobotanByIndex[$index + 1] = $item; // +1 karena alternatif dimulai dari 1
        }

        foreach ($dataConcordance as $pairData) {
            foreach ($pairData as $key => $concordanceValues) {
                // Ekstrak indeks i dan j dari key (format: A-i-j)
                $parts = explode('-', $key);
                $i = (int) $parts[1];
                $j = (int) $parts[2];

                // Validasi indeks
                if (!isset($pembobotanByIndex[$i]) || !isset($pembobotanByIndex[$j])) {
                    continue;
                }

                $altI = $pembobotanByIndex[$i];
                $altJ = $pembobotanByIndex[$j];

                $dataDiscordance[$key] = [
                    'ipk' => null,
                    'jumlah_lomba' => null,
                    'pengalaman_organisasi' => null,
                    'skor_bahasa_inggris' => null,
                    'prestasi_kemenangan' => null,
                    'semester' => null,
                    'total' => 0,
                ];

                // Hitung discordance untuk setiap kriteria (kebalikan concordance)
                foreach (['ipk', 'jumlah_lomba', 'pengalaman_organisasi', 'skor_bahasa_inggris', 'prestasi_kemenangan', 'semester'] as $kriteria) {
                    $dataDiscordance[$key][$kriteria] = ($concordanceValues[$kriteria] === 1) ? 0 : 1;
                }

                // Hitung total discordance (dkl)
                $maxDifferenceInDiscordantSet = 0;
                $maxOverallDifference = 0;

                foreach (['ipk', 'jumlah_lomba', 'pengalaman_organisasi', 'skor_bahasa_inggris', 'prestasi_kemenangan', 'semester'] as $kriteria) {
                    $v_i = $altI[$kriteria] ?? 0;
                    $v_j = $altJ[$kriteria] ?? 0;
                    $difference = abs($v_i - $v_j);

                    $maxOverallDifference = max($maxOverallDifference, $difference);

                    if ($dataDiscordance[$key][$kriteria] == 1) { // Jika termasuk discordance set
                        $maxDifferenceInDiscordantSet = max($maxDifferenceInDiscordantSet, $difference);
                    }
                }

                $dataDiscordance[$key]['total'] = $maxOverallDifference > 0 ? $maxDifferenceInDiscordantSet / $maxOverallDifference : 0;
            }
        }

        return $dataDiscordance;
    }

    public function getDiscordance()
    {
        $nilaiDiscordance = $this->getNilaiDiscordance();
        $jumlahAlternatif = count($this->entrophy->getDataAlternatif());
        $matriks = [];

        for ($i = 1; $i <= $jumlahAlternatif; $i++) {
            for ($j = 1; $j <= $jumlahAlternatif; $j++) {
                $key = 'A-' . $i . '-' . $j;
                if ($i == $j) {
                    $matriks[$key] = '-';
                } else {
                    $matriks[$key] = $nilaiDiscordance[$key]['total'] ?? '-';
                }
            }
        }

        return $matriks;
    }

    public function getNilaiD()
    {
        $getDiscordance = $this->getDiscordance();
        $total = 0;

        foreach ($getDiscordance as $value) {
            if ($value !== '-') {
                $total += $value;
            }
        }

        return $total;
    }

    public function getTresholdD()
    {
        $nilaiD = $this->getNilaiD();
        $jumlahAlternatif = count($this->entrophy->getDataAlternatif());
        $nilaiTresholdD = round($nilaiD / ($jumlahAlternatif * ($jumlahAlternatif - 1)), 4);
        return $nilaiTresholdD;
    }

    public function getMatriksDominanD()
    {
        $nilaiTresholdD = $this->getTresholdD();
        $getDiscordance = $this->getDiscordance();
        $matriksDominanDiscordance = [];

        foreach ($getDiscordance as $key => $value) {
            if ($value === '-') {
                $matriksDominanDiscordance[$key] = '-';
            } else {
                $matriksDominanDiscordance[$key] = ($value >= $nilaiTresholdD) ? 1 : 0;
            }
        }

        return $matriksDominanDiscordance;
    }

    public function getAgregatDominanMatriks()
    {
        $matriksDominanCorcondace = $this->getMatriksDominanC();
        $matriksDominanDiscordance = $this->getMatriksDominanD();
        $hasil = [];
        foreach ($matriksDominanCorcondace as $key => $value) {
            if ($value === '-') {
                $hasil[$key] = '-';
            } else {
                $hasil[$key] = $value * $matriksDominanDiscordance[$key];
            }
        }
        return $hasil;
    }

        public function getRanking()
        {
            $alternatif = $this->entrophy->getDataAlternatif();
            $nilaiConcordance = $this->getNilaiCorcondace();
            $nilaiDiscordance = $this->getNilaiDiscordance();

            // Proses data concordance dan discordance per alternatif
            $concordanceData = $this->kelompokkanData($nilaiConcordance, count($alternatif));
            $discordanceData = $this->kelompokkanData($nilaiDiscordance, count($alternatif));

            $ranking = [];

            foreach ($alternatif as $index => $alt) {
                $key = 'A-' . ($index + 1);
                $altNumber = $index + 1;

                $ranking[] = [
                    'alternatif' => $key,
                    'nama' => $alt['nama'],
                    'nim' => $alt['nim'],
                    'concordance' => $concordanceData[$altNumber] ?? ['total' => 0, 'details' => []],
                    'discordance' => $discordanceData[$altNumber] ?? ['total' => 0, 'details' => []],
                    'net_flow' => ($concordanceData[$altNumber]['total'] ?? 0) - ($discordanceData[$altNumber]['total'] ?? 0),
                ];
            }

            // Urutkan berdasarkan net_flow DESC
            usort($ranking, function ($a, $b) {
                return $b['net_flow'] <=> $a['net_flow'];
            });

            // Beri peringkat setelah sorting
            foreach ($ranking as $i => &$item) {
                $item['rank'] = $i + 1;
            }


            return $ranking;
        }

    private function kelompokkanData($dataPasangan, $jumlahAlternatif)
    {
        $result = [];

        // Inisialisasi untuk semua alternatif
        for ($i = 1; $i <= $jumlahAlternatif; $i++) {
            $result[$i] = [
                'total' => 0,
                'details' => [],
            ];
        }

        foreach ($dataPasangan as $pair) {
            foreach ($pair as $key => $nilai) {
                $parts = explode('-', $key);
                if (count($parts) === 3) {
                    $i = (int) $parts[1]; // Ambil index alternatif pertama

                    if ($i >= 1 && $i <= $jumlahAlternatif) {
                        $result[$i]['details'][$key] = $nilai;
                        $result[$i]['total'] += $nilai['total'];
                    }
                }
            }
        }

        return $result;
    }
}
