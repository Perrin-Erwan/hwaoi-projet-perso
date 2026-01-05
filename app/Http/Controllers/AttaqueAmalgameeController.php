<?php

namespace App\Http\Controllers;

use App\Models\AttaqueAmalgamees;
use Illuminate\Http\Request;

class AttaqueAmalgameeController extends Controller
{
  public function index() {
    $amalgames = AttaqueAmalgamees::all();
    return view('amalgames.index', compact('amalgames'));
}
}