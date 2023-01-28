<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function publicView()
    {
        return view("home.publicHome");
    }

    public function privateView()
    {
        return view("home.privateHome");
    }
}
