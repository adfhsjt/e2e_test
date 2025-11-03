<?php

namespace App\Http\Controllers;

use App\Services\Aras;
use App\Services\Electre;
use App\Services\Entrophy;

class LandingController extends Controller
{
    protected $aras, $electre, $entrophy;

    public function __construct(Aras $aras, Electre $electre, Entrophy $entrophy)
    {
        $this->aras = $aras;
        $this->electre = $electre;
        $this->entrophy = $entrophy;
    }

    public function index()
    {
        $mahasiswa = \App\Models\Mahasiswa::all();

        $rankElectre = $this->aras->getRanking();
        // dd($rankElectre); 

        return view('landing.index', compact('rankElectre', 'mahasiswa'));
    }
}
