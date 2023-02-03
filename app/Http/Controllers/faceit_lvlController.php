<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class faceit_lvlController extends Controller
{
    function detail($id)
    {
        return response()->json(Produit::find($id));
    }
}
