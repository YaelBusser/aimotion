<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userByName($name)
    {
        $user = User::where('name', $name)->first();
        return $user;
    }
}
