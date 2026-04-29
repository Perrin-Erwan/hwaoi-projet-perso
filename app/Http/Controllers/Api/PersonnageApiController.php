<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personnage;

class PersonnageApiController extends Controller
{
    public function index()
    {
        // On récupère tous les guerriers
        $personnages = Personnage::all();

        // On retourne les données en format JSON
        return response()->json($personnages);
    }
}