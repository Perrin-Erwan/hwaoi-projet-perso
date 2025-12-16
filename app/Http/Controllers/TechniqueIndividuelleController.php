<?php

namespace App\Http\Controllers;

use App\Models\TechniqueIndividuelle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TechniqueIndividuelleController extends Controller
{
    /**
     * Affiche une liste de toutes les techniques individuelles.
     */
    public function index(): View
    {
        // Récupérer toutes les techniques, triées par nom, et précharger la relation
        // 'personnageSpecifique' pour optimiser les requêtes (éviter le N+1).
        $techniques = TechniqueIndividuelle::with('personnageSpecifique')
            ->orderBy('nom', 'asc')
            ->get();

        return view('techniques.index', compact('techniques'));
    }

    /**
     * Affiche les détails d'une technique individuelle spécifique.
     * (Nous pouvons ajouter cette méthode plus tard si nécessaire)
     */
    // public function show(TechniqueIndividuelle $technique): View
    // {
    //     return view('techniques.show', compact('technique'));
    // }
}