<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\csgo_infos_g_maps_moins_jouees;
use App\Models\csgo_infos_g_maps_plus_jouees;
use App\Models\csgo_maps;
use App\Models\CsgoInfoGMapsPlusJouees;
use App\Models\csgoRoleT;
use App\Models\faceit_lvlModel;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\UserController;

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

    public function editInfoCsgo(Request $request)
    {
        // Récupération des données du formulaire
        $data = $request->all();
        $userId = Auth::user()->id;
        if (array_key_exists('mapsPlusJouees', $data)) {
            $mapsPlusJouees = $data['mapsPlusJouees'];
            DB::table('csgo_infos_g_maps_plus_jouees')->where('id_user', $userId)->delete();
            foreach ($mapsPlusJouees as $map) {
                $mapId = DB::table('csgo_maps')->where('label', $map)->first();
                csgo_infos_g_maps_plus_jouees::create([
                    'id_user' => $userId,
                    'id_map' => $mapId->id
                ]);
            }
        } else {
            DB::table('csgo_infos_g_maps_plus_jouees')->where('id_user', $userId)->delete();
        }
        if (array_key_exists('mapsMoinsJouees', $data)) {
            $mapsMoinsJouees = $data['mapsMoinsJouees'];
            DB::table('csgo_infos_g_maps_moins_jouees')->where('id_user', $userId)->delete();
            foreach ($mapsMoinsJouees as $map) {
                $mapId = DB::table('csgo_maps')->where('label', $map)->first();
                csgo_infos_g_maps_moins_jouees::create([
                    'id_user' => $userId,
                    'id_map' => $mapId->id
                ]);
            }
        } else {
            DB::table('csgo_infos_g_maps_moins_jouees')->where('id_user', $userId)->delete();
        }

        if (array_key_exists('rankmm', $data)) {
            $rankMm = $data['rankmm'];
            $ranksMm = DB::table('csgo_rankmm')->where('label', $rankMm)->first();
            DB::table('users')->where('id', $userId)->update(['rankMM' => $ranksMm->id_csgo_rankmm]);
        }
        if (array_key_exists('heurescsgo', $data)) {
            $heurescsgo = $data['heurescsgo'];
            DB::table('users')->where('id', $userId)->update(['heures_csgo' => $heurescsgo]);
        }
        // Redirection vers la page de profil
        return Redirect::route('profile.profile', ['name' => Auth::user()->name]);
    }

    public function main($name): View
    {
        $api_key = "e84f1841-2739-4758-8508-bb8ae980e8e5";
        $client = new \GuzzleHttp\Client();
        $headers = [
            'Authorization' => 'Bearer ' . $api_key,
            'Accept' => 'application/json',
        ];
        $userPublic = User::where('name', $name)->first();
        $user = User::where('name', Auth::user()->name)->first();
        if (!$userPublic) {
            return view('dashboard', [
                'user' => $userPublic,])->with('error', "L'utilisateur n'a pas été trouvé.");
        }
        $errorNotGameCsgo = "";
        $faceitData = "";
        $faceitStats = "";
        $lvlImg = "";
        if (!empty($userPublic->pseudo_faceit)) {
            $response = $client->request("GET", "https://open.faceit.com/data/v4/players?nickname=" . $userPublic->pseudo_faceit . "", ["headers" => $headers, 'verify' => false]);
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
                $errorNotGameCsgo = "Vous n'avez pas de compte csgo associé à votre compte faceit ! Veuillez changer de compte ou ajoutez le jeu CS:GO à votre compte faceit.";
            }
        } else {
            $faceitData = "";
            $lvlImg = "";
        }
        $styleDeJeu = new CsgoRoleStyleDeJeuController();
        $styleDeJeu = $styleDeJeu->index();
        $roleFavT = new CsgoRoleTController();
        $roleFavT = $roleFavT->index();
        $roleFavCt = new CsgoRoleCtController();
        $roleFavCt = $roleFavCt->index();
        $maps = new CsgoMapsController();
        $maps = $maps->index();
        $rankmm = new CsgoRankMmController();
        $rankmm = $rankmm->index();

        $mapsPreferees = new CsgoMapsPlusJoueesController();
        $mapsPreferees = $mapsPreferees->index($userPublic->id);

        $mapsMoinsJouees = new CsgoMapsMoinsJoueesController();
        $mapsMoinsJouees = $mapsMoinsJouees->index($userPublic->id);

        $mapsController = new CsgoMapsController();

        $mapsUserFav = [];
        $labelMapsUserFav = [];

        $mapsUserMoinsJouees = [];
        $labelMapsUserMoinsJouees = [];

        foreach ($mapsPreferees as $mapPreferee) {
            $valueMap = $mapsController->search($mapPreferee->id_map);
            $mapsUserFav[] = $valueMap;
            $labelMapsUserFav[] = $valueMap->label;
        }

        foreach ($mapsMoinsJouees as $mapMoinsJouees) {
            $valueMap = $mapsController->search($mapMoinsJouees->id_map);
            $mapsUserMoinsJouees[] = $valueMap;
            $labelMapsUserMoinsJouees[] = $valueMap->label;
        }

        $rankmmUser = new CsgoRankMmController();
        $rankmmUser = $rankmmUser->fetchById($userPublic->rankMM);
        return view('profile.profile', [
            'user' => $user,
            'userPublic' => $userPublic,
            "faceit" => $faceitData,
            'lvlImg' => $lvlImg,
            'errorNotGameCsgo' => $errorNotGameCsgo,
            'faceitStats' => $faceitStats,
            'styleDeJeu' => $styleDeJeu,
            'roleFavT' => $roleFavT,
            'roleFavCt' => $roleFavCt,
            'maps' => $maps,
            'rankmm' => $rankmm,
            'mapsPreferees' => $mapsUserFav,
            'labelMapsPreferees' => $labelMapsUserFav,
            'mapsMoinsJouees' => $mapsUserMoinsJouees,
            'labelMapsMoinsJouees' => $labelMapsUserMoinsJouees,
            'rankMmUser' => $rankmmUser,
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
