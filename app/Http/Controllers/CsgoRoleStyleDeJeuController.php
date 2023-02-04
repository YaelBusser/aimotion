<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\csgo_styledejeu;
use Illuminate\Http\Request;

class CsgoRoleStyleDeJeuController extends Controller
{
    public function index()
    {
        $style_de_jeu = csgo_styledejeu::all();
        return $style_de_jeu;
    }
}
