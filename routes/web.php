<?php
// Route pour la prise de rendez-vous



use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\VehiculesController;
use Illuminate\Support\Facades\Route;

Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// route pour afficher le formulaire de création d'un véhicule
Route::get('/vehicule/create', [VehiculesController::class, "create"])->name("vehicules.create");

// route pour stocker un nouveau véhicule
Route::post('/vehicule', [VehiculesController::class, 'store'])->name('vehicules.store');

// route pour la page de connexion
Route::get('/connexion', [ConnexionController::class, "connexion"])->name("connexion");

// route pour la page d'inscription
Route::get('/inscription', [InscriptionController::class, "inscription"])->name("inscription");
Route::post('/connexion', [ConnexionController::class, "login"])->name("login");
Route::post('/inscription', [InscriptionController::class, "register"])->name("register");

// route pour afficher la liste des véhicules
Route::get('/vehicule/list', [VehiculesController::class, "show"])->name("vehicules.show");

// route pour afficher le formulaire de modification d'un véhicule
Route::get('/vehicule/update/{vehicule}', [VehiculesController::class, "edit"])->name("vehicules.edit");

// route pour enregistrer les modifications d'un véhicule
Route::put('/vehicule/update/{vehicule}', [VehiculesController::class, "update"])->name("vehicules.update");

// route pour supprimer un véhicule
Route::delete('/vehicule/delete/{vehicule}', [VehiculesController::class, "destroy"])->name("vehicules.delete");

// route pour afficher les détails d'un véhicule
Route::get('/vehicule/detail/{vehicule}', [VehiculesController::class, "detail"])->name("vehicules.detail");

// route pour afficher le formulaire d'ajout d'un technicien
Route::get('/technicien/create', [TechnicienController::class, "create"])->name("techniciens.create");

// route pour afficher la liste des techniciens
Route::get('/technicien/list', [TechnicienController::class, "index"])->name("techniciens.show");

// route pour stocker les données d'un technicien
Route::post('/technicien/store', [TechnicienController::class, "store"])->name("techniciens.store");

Route::get('/technicien/edit/{technicien}', [TechnicienController::class, "edit"])->name("techniciens.edit");

Route::put('/technicien/update/{technicien}', [TechnicienController::class, "update"])->name("techniciens.update");

Route::delete('/technicien/delete/{technicien}', [TechnicienController::class, "destroy"])->name("techniciens.delete");

Route::get('/technicien/details/{technicien}', [TechnicienController::class, "details"])->name("techniciens.details");

Route::get('/reparation/create', [ReparationController::class, "create"])->name("reparations.create");

Route::post('/reparation/store', [ReparationController::class, "store"])->name("reparations.store");

Route::get('/reparation/list', [ReparationController::class, "show"])->name("reparations.show");

Route::get('/reparation/edit/{reparation}', [ReparationController::class, "edit"])->name("reparations.edit");

Route::put('/reparation/update/{reparation}', [ReparationController::class, "update"])->name("reparations.update");

Route::delete('/reparation/delete/{reparation}', [ReparationController::class, "destroy"])->name("reparations.delete");

Route::get('/reparation/details/{reparation}', [ReparationController::class, "details"])->name("reparations.details");

// Route pour le tableau de bord
Route::get('/dashboard', function () {
    $vehicules = \App\Models\Vehicules::count();
    $techniciens = \App\Models\Technicien::count();
    $reparations = \App\Models\Reparation::count();

    $latestReparations = \App\Models\Reparation::with(['vehicule', 'technicien'])
        ->orderByDesc('created_at')
        ->limit(10)
        ->get();

    return view('dashboard', compact('vehicules', 'techniciens', 'reparations', 'latestReparations'));
})->name('dashboard');


// Route pour la déconnexion
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('welcome');
})->name('logout');



