<?php

namespace App\Services;

use App\Services\Entrophy;

class Aras
{
    protected $entrophy;

    public function __construct(Entrophy $entrophy)
    {
        $this->entrophy = $entrophy;
    }

    public function getAllFunction()
    {
        return [
            'getAlternatif' => $this->getAlternatif(),
            'getDataBaru' => $this->getDataBaru(),
            'getTotalKriteria' => $this->getTotalKriteria(),
            'getNormalisasi' => $this->getNormalisasi(),
            'getNilaiUtilitas' => $this->getNilaiUtilitas(),
            'getRanking' => $this->getRanking(),

        ];
    }

    public function getAlternatif()
    {
        $dataAlternatif = $this->entrophy->getDataAlternatif();
        $data = $dataAlternatif;

        if (count($dataAlternatif) > 0) {
            $kriteriaList = array_keys($dataAlternatif[0]);
            $exclude = ['alternatif', 'nama', 'nim'];
            $kriteria = array_diff($kriteriaList, $exclude);

            $alternatif0 = ['alternatif' => 'A0', 'nama' => 'Nilai Ideal', 'nim' => '0000000000'];

            foreach ($kriteria as $k) {
                if ($k === 'semester') {
                    $alternatif0[$k] = min(array_column($dataAlternatif, $k));
                } else {
                    $alternatif0[$k] = max(array_column($dataAlternatif, $k));
                }
            }

            array_unshift($data, $alternatif0);
        }

        return $data;
    }

    public function getDataBaru()
    {
        $data = $this->getAlternatif();

        if (count($data) > 0) {
            $kriteriaList = array_keys($data[0]);
            $exclude = ['alternatif', 'nama', 'nim'];
            $kriteria = array_diff($kriteriaList, $exclude);

            foreach ($data as &$alternatif) {
                foreach ($kriteria as $k) {
                    if ($k === 'semester') {
                        $alternatif[$k] = 1 / $alternatif[$k];
                    }
                }
            }
        }

        return $data;
    }

    public function getTotalKriteria()
    {
        $data = $this->getAlternatif();

        if (count($data) > 0) {
            $kriteriaList = array_keys($data[0]);
            $exclude = ['alternatif', 'nama', 'nim'];
            $kriteria = array_diff($kriteriaList, $exclude);

            $total = [];
            foreach ($kriteria as $k) {
                $total[$k] = 0;
                foreach ($data as $alternatif) {
                    // Pastikan nilai numerik
                    if (isset($alternatif[$k]) && is_numeric($alternatif[$k])) {
                        $total[$k] += $alternatif[$k];
                    }
                }
            }
            return $total;
        }

        return [];
    }

    public function getNormalisasi()
    {
        $data = $this->getAlternatif();
        $totalKriteria = $this->getTotalKriteria();
        $normalisasiBaru = [];
        $bobotKriteria = $this->entrophy->getBobotKriteria()['data_bobot'];
        foreach ($data as $alternatif) {
            $normalisasi = [];
            foreach ($totalKriteria as $k => $total) {
                if ($total != 0) {
                    $normalisasi[$k] = ($alternatif[$k] / $total);
                } else {
                    $normalisasi[$k] = 0; // Atau bisa diatur sesuai kebutuhan
                }
            }
            foreach ($bobotKriteria as $b => $bobot) {
                $normalisasi[$b] = $normalisasi[$b] * $bobot;
            }
            $normalisasiBaru[] = array_merge(['alternatif' => $alternatif['alternatif'], 'nama' => $alternatif['nama'], 'nim' => $alternatif['nim']], $normalisasi);
        }

        return $normalisasiBaru;
    }

    public function getNilaiUtilitas()
    {
        $dataNormallisasi = $this->getNormalisasi();
        $data = [];

        $nilaiSiA0 = null;
        foreach ($dataNormallisasi as $alternatif) {
            if ($alternatif['alternatif'] === 'A0') {
                $nilaiSiA0 = 0;
                foreach ($alternatif as $k => $v) {
                    if ($k === 'alternatif' || $k === 'nama' || $k === 'nim') {
                        continue;
                    }

                    if (is_numeric($v)) {
                        $nilaiSiA0 += $v;
                    }

                }
                break;
            }
        }

        foreach ($dataNormallisasi as $alternatif) {
            $nilaiSi = 0;
            foreach ($alternatif as $k => $v) {
                if ($k === 'alternatif' || $k === 'nama' || $k === 'nim') {
                    continue;
                }

                if (is_numeric($v)) {
                    $nilaiSi += $v;
                }

            }

            $row = [
                'alternatif' => $alternatif['alternatif'],
                'nama' => $alternatif['nama'],
                'nim' => $alternatif['nim'],
                'nilaiSi' => $nilaiSi,
            ];

            if ($alternatif['alternatif'] !== 'A0' && $nilaiSiA0 != 0) {
                $row['nilaiKi'] = $nilaiSi / $nilaiSiA0;
            } else {
                $row['nilaiKi'] = null;
            }

            $data[] = $row;
        }

        return $data;
    }

    public function getRanking()
    {
        $nilaiUtilitas = $this->getNilaiUtilitas();
        // dd($nilaiUtilitas);

        // Hapus data dengan alternatif == 0
        $nilaiUtilitas = array_filter($nilaiUtilitas, function ($item) {
            return $item['alternatif'] != 'A0';
        });

        // Urutkan berdasarkan nilaiKi descending
        usort($nilaiUtilitas, function ($a, $b) {
            return $b['nilaiKi'] <=> $a['nilaiKi'];
        });

        // Beri peringkat
        foreach ($nilaiUtilitas as $index => &$alternatif) {
            $alternatif['ranking'] = $index + 1;
        }

        return array_values($nilaiUtilitas); // Reset index agar rapi
    }
}
