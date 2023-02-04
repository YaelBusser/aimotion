<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\csgo_maps;
use Illuminate\Http\Request;

class CsgoMapsController extends Controller
{
    public function index()
    {
        $maps = csgo_maps::all();
        return $maps;
    }
    public function search($id){
        $map = csgo_maps::where('id', $id)->first();
        return $map;
    }
}
