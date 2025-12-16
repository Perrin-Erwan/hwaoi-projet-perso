<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CombatStyleController extends Controller
{
    public function index()
    {
        return view('coming-soon', ['pageTitle' => 'Styles de Combat']);
    }
    
    // Ajoutez également la méthode show() pour éviter une erreur
    public function show($id)
    {
        return view('coming-soon', ['pageTitle' => 'Détails du Style de Combat']);
    }
}
