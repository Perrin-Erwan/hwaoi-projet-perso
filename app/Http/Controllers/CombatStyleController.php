<?php

namespace App\Http\Controllers;


use App\Models\CombatStyle;

class CombatStyleController extends Controller
{
    public function index() {
    // On charge la relation corrigée
    $styles = CombatStyle::with('techniques')->get();
    return view('styles.index', compact('styles'));
}
    // Ajoutez également la méthode show() pour éviter une erreur
    public function show($id)
    {
        return view('coming-soon', ['pageTitle' => 'Détails du Style de Combat']);
    }
}
