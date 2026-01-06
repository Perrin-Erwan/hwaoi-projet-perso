<?php

namespace App\Http\Controllers;

use App\Models\AttaqueAmalgamees;
use Illuminate\Http\Request;

class AttaqueAmalgameeController extends Controller
{
 public function index() {
    // On récupère tout, groupé par personnage pour l'organisation
    $amalgames = AttaqueAmalgamees::with('personnage')->get()->groupBy('personnage.nom');
    return view('amalgames.index', compact('amalgames'));
}
}