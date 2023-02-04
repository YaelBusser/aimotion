<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\csgo_rolet;
use Illuminate\Http\Request;

class CsgoRoleTController extends Controller
{
    public function index()
    {
        $csgo_rolet = csgo_rolet::all();
        return $csgo_rolet;
    }
}
