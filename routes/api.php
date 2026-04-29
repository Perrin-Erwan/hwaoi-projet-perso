<?php

use App\Http\Controllers\Api\PersonnageApiController;
use Illuminate\Support\Facades\Route;

Route::get('/personnages', [PersonnageApiController::class, 'index']);
