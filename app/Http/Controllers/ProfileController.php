<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\faceit_lvlModel;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\faceit_lvlController;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function main(Request $request): View
    {
        $api_key = "e84f1841-2739-4758-8508-bb8ae980e8e5";
        $client = new \GuzzleHttp\Client();
        $headers = [
            'Authorization' => 'Bearer ' . $api_key,
            'Accept' => 'application/json',
        ];
        $user = $request->user();
        $errorNotGameCsgo = "";
        $faceitData = "";
        $faceitStats = "";
        $lvlImg = "";
        if (!empty($user->pseudo_faceit)) {
            $response = $client->request("GET", "https://open.faceit.com/data/v4/players?nickname=" . $user->pseudo_faceit . "", ["headers" => $headers, 'verify' => false]);
            $faceitData = json_decode($response->getBody()->getContents());
            if (isset($faceitData->games->csgo)) {
                $responseStats = $client->request("GET", "https://open.faceit.com/data/v4/players/" . $faceitData->player_id . "/stats/csgo", ["headers" => $headers, 'verify' => false]);
                $faceitStats = json_decode($responseStats->getBody()->getContents());
                if (isset($faceitData->games->csgo)) {
                    switch ($faceitData->games->csgo->skill_level) {
                        case 1:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 1)->first();
                            $lvlImg = $lvl->label;
                            break;
                        case 2:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 2)->first();
                            $lvlImg = $lvl->label;
                            break;
                        case 3:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 3)->first();
                            $lvlImg = $lvl->label;
                            break;
                        case 4:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 4)->first();
                            $lvlImg = $lvl->label;
                            break;
                        case 5:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 5)->first();
                            $lvlImg = $lvl->label;
                            break;
                        case 6:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 6)->first();
                            $lvlImg = $lvl->label;
                            break;
                        case 7:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 7)->first();
                            $lvlImg = $lvl->label;
                            break;
                        case 8:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 8)->first();
                            $lvlImg = $lvl->label;
                            break;
                        case 9:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 9)->first();
                            $lvlImg = $lvl->label;
                            break;
                        case 10:
                            $lvl = DB::table('faceit_lvl')->where('id_faceit_lvl', 10)->first();
                            $lvlImg = $lvl->label;
                            break;
                    }
                } else {
                    $faceitData = "";
                    $lvlImg = "";
                }
            } else {
                $errorNotGameCsgo = "Vous n'avez pas de compte csgo associé à votre faceit ! Veuillez changer de compte ou ajoutez le jeu CS:GO à votre compte faceit.";
            }
        } else {
            $faceitData = "";
            $lvlImg = "";
        }
        return view('profile.profile', [
            'user' => $user,
            "faceit" => $faceitData,
            'lvlImg' => $lvlImg,
            'errorNotGameCsgo' => $errorNotGameCsgo,
            'faceitStats' => $faceitStats,
        ]);
    }

    public function callback()
    {
        return view("profile.callback");
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->validate([
            'name' => ['required', 'string', 'max:16'],
            'avatar' => ['image'],
        ]);

        // traitement de l'image
        $user = auth()->user();
        if ($request->avatar) {
            if (file_exists($user->avatar)) {
                unlink($user->avatar);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/avatars/', $filename);
            $path_avatar = "uploads/avatars/" . $filename;
            $user->avatar = $path_avatar;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
