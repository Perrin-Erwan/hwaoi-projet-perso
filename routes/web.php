<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonnageController;
use App\Http\Controllers\TechniqueIndividuelleController;
use App\Http\Controllers\CombatStyleController;
use App\Http\Controllers\EnnemiController;
use App\Http\Controllers\AttaqueAmalgameeController;
use Illuminate\Support\Facades\Route;
use App\Models\Personnage;
use App\Models\Ennemi;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIQUES
|--------------------------------------------------------------------------
*/
Route::get('/', [PersonnageController::class, 'accueil'])->name('personnage.accueil');
Route::get('/personnages/list', [PersonnageController::class, 'index'])->name('personnage.list');
Route::get('/personnage/{personnage}', [PersonnageController::class, 'show'])->name('personnage.show');
Route::get('/systeme-jeu', [PersonnageController::class, 'systemeJeu'])->name('systeme-jeu');
Route::get('/techniques-individuelles', [TechniqueIndividuelleController::class, 'index'])->name('technique-individuelles.index');
Route::get('/bestiaire', [EnnemiController::class, 'index'])->name('ennemis.index');
Route::get('/amalgames', [AttaqueAmalgameeController::class, 'index'])->name('amalgames.index');

Route::resource('styles-de-combat', CombatStyleController::class)->only(['index', 'show'])
    ->names(['index' => 'combat-styles.index', 'show' => 'combat-styles.show']);
Route::get('/styles-combat', [CombatStyleController::class, 'index'])->name('styles-combat.index');


/*
|--------------------------------------------------------------------------
| ROUTES CONNECTÉES (Utilisateurs enregistrés)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Accès au Dashboard et au Profil pour tous les membres
   Route::get('/dashboard', function () {
    $stats = [
        'count_guerriers' => Personnage::count(),
        'count_ennemis'   => Ennemi::count(),
        'count_users'     => User::count(),
        'last_warrior'    => Personnage::latest()->first(),
    ];

    return view('dashboard', compact('stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | ROUTES ADMIN (Seuls les Sages avec is_admin = 1)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin'])->group(function () {
        
        // Modification des Personnages
        Route::get('/personnage/{personnage}/edit', [PersonnageController::class, 'edit'])->name('personnage.edit');
        Route::put('/personnage/{personnage}', [PersonnageController::class, 'update'])->name('personnage.update');
        Route::get('/personnages/create', [PersonnageController::class, 'create'])->name('personnage.create');
        Route::post('/personnages', [PersonnageController::class, 'store'])->name('personnage.store');
        
        // Gestion des Techniques
        Route::get('/personnage/{personnage}/techniques/manage', [PersonnageController::class, 'manageTechniques'])
            ->name('personnage.manage_techniques');
        Route::put('/personnage/{personnage}/techniques/sync', [PersonnageController::class, 'syncTechniques'])
            ->name('personnage.sync_techniques');
            
        // Tu pourras ajouter ici les futurs 'create', 'store' et 'delete'
    });
});

require __DIR__.'/auth.php';