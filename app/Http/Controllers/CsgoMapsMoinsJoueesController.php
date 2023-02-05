<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\csgo_infos_g_maps_moins_jouees;
use Illuminate\Http\Request;

class CsgoMapsMoinsJoueesController extends Controller
{
    public function index($id)
    {
        $mapsMoinsJouees = csgo_infos_g_maps_moins_jouees::where('id_user', $id)->get();
        return $mapsMoinsJouees;
    }
}
