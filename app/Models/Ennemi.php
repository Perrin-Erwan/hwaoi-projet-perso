<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ennemi extends Model
{
    protected $table = 'ennemis';

    protected $fillable = [
        'nom',
        'categorie',
        'points_de_vie',
        'description',
    ];
}
