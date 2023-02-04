<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\csgo_infos_g_maps_plus_jouees;
use Illuminate\Http\Request;

class CsgoMapsPlusJoueesController extends Controller
{
    public function index($id)
    {
        $mapsPreferees = csgo_infos_g_maps_plus_jouees::where('id_user', $id)->get();
        return $mapsPreferees;
    }
}
