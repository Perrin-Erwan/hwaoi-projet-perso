<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtefactSoneaux extends Model
{
    protected $table = 'artefact_soneaux';

    protected $fillable = [
        'nom',
        'type',
        'personnage_id',
    ];
}
