<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\csgo_rankmm;
use Illuminate\Http\Request;

class CsgoRankMmController extends Controller
{
    public function index()
    {
        $csgo_rankmm = csgo_rankmm::all();
        return $csgo_rankmm;
    }
    public function fetchById($id_csgo_rankmm)
    {
        $rankMm = csgo_rankmm::where('id_csgo_rankmm', $id_csgo_rankmm)->first();
        return $rankMm;
    }
}
