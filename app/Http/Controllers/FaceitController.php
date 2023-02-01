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
        try {
            $userFaceit = Socialite::driver('faceit')->user();
        } catch (\Throwable $th){
            throw $th;
        }
        $user = auth()->user();
        $user->pseudo_faceit = $userFaceit->getNickname();
        $user->save();
        return redirect()->to('/profile');
    }
}
