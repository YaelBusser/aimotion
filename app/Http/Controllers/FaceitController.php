<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FaceitController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('faceit')->redirect();
    }

    public function handleProviderCallback()
    {
        $userFaceit = Socialite::driver('faceit')->user();
        dd($userFaceit);
        $user = auth()->user();
        dd($user);
        $user->pseudo_faceit = $userFaceit->getNickname();
        $user->save();
        return redirect()->to('/profile');
    }
}
