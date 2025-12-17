<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttaqueSynchro extends Model
{
    use HasFactory;
    protected $table = 'attaque_synchro';

    protected $fillable = [
        'nom',
        'description',
        'partenaire',
        'personnage_id',
        'type',
    ];

    // Relation inverse : une Attaque appartient à un Personnage// Fichier : app/Models/AttaqueSynchro.php

// ...
public function personnage()
{
    // L'attaque appartient au personnage identifié par personnage_id
    return $this->belongsTo(Personnage::class, 'personnage_id');
}
}
