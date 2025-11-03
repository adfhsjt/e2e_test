<?php

namespace App\Http\Controllers;

use App\Services\Aras;
use App\Services\Electre;
use App\Services\Entrophy;

class DashboardAdmin extends Controller
{
    protected $entrophy;
    protected $electre;
    protected $aras;
    public function __construct(Entrophy $entrophy, Electre $electre, Aras $aras)
    {
        $this->entrophy = $entrophy;
        $this->electre = $electre;
        $this->aras = $aras;
    }

    public function index()
    {
        $breadcrumb = (object)
            [
            'title' => 'Dashboard',
            'list' => ['Home', 'Dashboard'],
        ];

        $page = (object)
            [
            'title' => 'Selamat datang di Dashboard',
        ];

        $activeMenu = 'dashboard';
        $rankingElectre = $this->electre->getRanking();
        $rankingAras = $this->aras->getRanking();

        return view('admin.dashboard.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rankingElectre' => $rankingElectre,
            'rankingAras' => $rankingAras,
        ]);
    }

    public function entropy()
    {
        $breadcrumb = (object)
            [
            'title' => 'Entropy',
            'list' => ['Home', 'Dashboard', 'Entropy'],
        ];

        $page = (object)
            [
            'title' => 'Entropy',
        ];

        $activeMenu = 'dashboard';

        return view('admin.dashboard.entropy', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'getSampleData' => $this->entrophy->getSampleData(),
            'getScoreLomba' => $this->entrophy->getScoreLomba(),
            'getDataAlternatif' => $this->entrophy->getDataAlternatif(),
            'getNormalisasi' => $this->entrophy->getNormalisasi(),
            'getMaxMin' => $this->entrophy->getMaxMin(),
            'getTotalKriteria' => $this->entrophy->getTotalKriteria(),
            'getNilaiProporsional' => $this->entrophy->getNilaiProporsional(),
            'getNilaiLn' => $this->entrophy->getNilaiLn(),
            'getNilaiProporsionalKaliLn' => $this->entrophy->getNilaiProporsionalKaliLn(),
            'getTotalPLn' => $this->entrophy->getTotalPLn(),
            'getNilaiEj' => $this->entrophy->getNilaiEj(),
            'getNilaiEntrophy' => $this->entrophy->getNilaiEntrophy(),
            'getNilaiDispersi' => $this->entrophy->getNilaiDispersi(),
            'getTotalNilaiDispersi' => $this->entrophy->getTotalNilaiDispersi(),
            'getBobotKriteria' => $this->entrophy->getBobotKriteria(),
        ]);
    }

    public function electre()
    {
        $breadcrumb = (object)
            [
            'title' => 'Electre',
            'list' => ['Home', 'Dashboard', 'Electre'],
        ];

        $page = (object)
            [
            'title' => 'Electre',
        ];

        $activeMenu = 'dashboard';

        return view('admin.dashboard.electre', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'getDataAlternatif' => $this->entrophy->getDataAlternatif(),
            'getPenyebut' => $this->electre->getPenyebut(),
            'getMatriksNormalisasiTerbobot' => $this->electre->getMatriksNormalisasiTerbobot(),
            'getBobotKriteria' => $this->entrophy->getBobotKriteria(),
            'getHasilPembobotanMatriks' => $this->electre->getHasilPembobotanMatriks(),
            'getNilaiCorcondace' => $this->electre->getNilaiCorcondace(),
            'getCorcondace' => $this->electre->getCorcondace(),
            'getNilaiC' => $this->electre->getNilaiC(),
            'getTresholdC' => $this->electre->getTresholdC(),
            'getMatriksDominanC' => $this->electre->getMatriksDominanC(),
            'getNilaiDiscordance' => $this->electre->getNilaiDiscordance(),
            'getDiscordance' => $this->electre->getDiscordance(),
            'getNilaiD' => $this->electre->getNilaiD(),
            'getTresholdD' => $this->electre->getTresholdD(),
            'getMatriksDominanD' => $this->electre->getMatriksDominanD(),
            'getAgregatDominanMatriks' => $this->electre->getAgregatDominanMatriks(),
            'getRanking' => $this->electre->getRanking(),
        ]);
    }

    public function aras()
    {
        $breadcrumb = (object)
            [
            'title' => 'Aras',
            'list' => ['Home', 'Dashboard', 'Aras'],
        ];

        $page = (object)
            [
            'title' => 'Aras',
        ];

        $activeMenu = 'dashboard';

        return view('admin.dashboard.aras', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'getBobotKriteria' => $this->entrophy->getBobotKriteria(),
            'getDataAlternatif' => $this->entrophy->getDataAlternatif(),
            'getAlternatif' => $this->aras->getAlternatif(),
            'getDataBaru' => $this->aras->getDataBaru(),
            'getTotalKriteria' => $this->aras->getTotalKriteria(),
            'getNormalisasi' => $this->aras->getNormalisasi(),
            'getNilaiUtilitas' => $this->aras->getNilaiUtilitas(),
            'getRanking' => $this->aras->getRanking(),
        ]);
    }

    public function test()
    {
        $entrophy = $this->entrophy;
        $electre = $this->electre;
        $aras = $this->aras;
        $data = 
        [
            // 'getAllFungsiEntrophy' => $entrophy->getAllFunction(),
            // 'getAllFungsiElectre' => $electre->getAllFunction(),
            // 'matriksNormalisasiTerbobot' => $electre->getMatriksNormalisasiTerbobot(),
            // 'getAllFungsiAras' =>     $aras->getAllFunction(),
            // 'getRankingElectre' => $electre->getRanking(),
            // 'getNilaiCorcondace' => $electre->getNilaiCorcondace(),
            // 'getCorcondace' => $electre->getCorcondace(),
        ];
        dd($data);

        return $data;
    }
}
