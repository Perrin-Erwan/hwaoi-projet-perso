<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arme extends Model
{
    protected $fillable = [
        'nom',
        'puissance_base',
        'type',
        'personnage_id',
    ];
}
