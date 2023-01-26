<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnectedController extends Controller
{
    public function publicView(){
        return view("home.publicView");
    }
    public function privateView(){

    }
}
