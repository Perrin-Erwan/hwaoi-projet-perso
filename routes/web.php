<?php

use App\Http\Controllers\PersonnageController;
use App\Http\Controllers\TechniqueIndividuelleController;
use App\Http\Controllers\CombatStyleController;
use App\Http\Controllers\EnnemiController;
use App\Http\Controllers\AttaqueAmalgameeController;

use Illuminate\Support\Facades\Route;

// 1. Nouvelle Route Racinc pour l'Accueil (avec personnages aléatoires)
Route::get('/', [PersonnageController::class, 'accueil'])->name('personnage.accueil');

// 2. Ancienne route index renommée en 'list' pour afficher TOUS les personnages
Route::get('/personnages/list', action: [PersonnageController::class, 'index'])->name('personnage.list');

// 3. Routes existantes (show, edit, update) utilisant le nom du personnage
Route::get('/personnage/{personnage}', [PersonnageController::class, 'show'])->name('personnage.show');
Route::get('/personnage/{personnage}/edit', [PersonnageController::class, 'edit'])->name('personnage.edit');
Route::put('/personnage/{personnage}', [PersonnageController::class, 'update'])->name('personnage.update');

// 4. Route pour le Système de Jeu
Route::get('/systeme-jeu', [PersonnageController::class, 'systemeJeu'])->name('systeme-jeu');
// ... (vos autres routes personnages.index, .show, .edit, .update)
Route::get('/personnage/{personnage}/techniques/manage', [PersonnageController::class, 'manageTechniques'])
    ->name('personnage.manage_techniques');

// Soumettre le formulaire et synchroniser les techniques apprises
Route::put('/personnage/{personnage}/techniques/sync', [PersonnageController::class, 'syncTechniques'])
    ->name('personnage.sync_techniques');
Route::get('/techniques-individuelles', [TechniqueIndividuelleController::class, 'index'])
    ->name('technique-individuelles.index');
Route::resource('styles-de-combat', CombatStyleController::class)->only(['index', 'show'])
    ->names(['index' => 'combat-styles.index', 'show' => 'combat-styles.show']);
// ... autres routes ...
Route::get('/bestiaire', [EnnemiController::class, 'index'])->name('ennemis.index');
Route::get('/amalgames', [AttaqueAmalgameeController::class, 'index'])->name('amalgames.index');
Route::get('/styles-combat', [CombatStyleController::class, 'index'])->name('styles-combat.index');