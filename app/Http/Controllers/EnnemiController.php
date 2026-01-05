<?php

namespace App\Http\Controllers;

use App\Models\Ennemi;
use Illuminate\Http\Request;

class EnnemiController extends Controller
{
    public function index()
    {
        // On récupère tous les ennemis groupés par catégorie
        $ennemis = Ennemi::all()->groupBy('categorie');
        
        return view('ennemis.index', compact('ennemis'));
    }
}