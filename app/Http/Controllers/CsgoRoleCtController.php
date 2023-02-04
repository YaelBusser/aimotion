<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\csgo_rolect;
use Illuminate\Http\Request;

class CsgoRoleCtController extends Controller
{
    public function index()
    {
        $csgo_rolect = csgo_rolect::all();
        return $csgo_rolect;
    }
}
