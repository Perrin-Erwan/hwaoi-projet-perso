<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttaqueAmalgamees extends Model
{
    protected $table = 'attaquesAmalgamees';
     protected $fillable = [
        'nom',
        'description',
        'type',
        'degats',
        'arme_requise',
        'personnage_id',
    ];

    public function personnage()
{
    return $this->belongsTo(Personnage::class, 'personnage_id');
}
}
