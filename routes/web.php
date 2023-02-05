<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectedController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\FaceitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/profile/{name}', [ProfileController::class, 'main'])->name('profile.profile');
// Route accessible uniquement pour les utilisateurs non connectés
Route::middleware('guest')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/infoG/csgo', [ProfileController::class, 'editInfoCsgo'])->name('profile.infog.csgo');
});

require __DIR__ . '/auth.php';

Route::get("/home-disconnected", [ConnectedController::class, "publicView"]);
Route::get("/home-connected", [ConnectedController::class, "privateView"]);

// Faceit
Route::prefix('faceit')->name('faceit.')->group(function () {
    Route::get('login', [FaceitController::class, 'redirectToProvider'])->name('login');
    Route::any('callback', [FaceitController::class, 'handleProviderCallback'])->name('callback');
});
