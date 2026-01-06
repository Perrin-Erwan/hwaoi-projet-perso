<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personnage; // Ajout de l'import pour la relation
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechniqueIndividuelle extends Model
{
    use HasFactory;
    
    // CORRECTION : Utiliser le pluriel conventionnel
    protected $table = 'technique_individuelle'; 

    protected $fillable = [
        'nom',
        'description',
        'dégâts',
        'personnage_id',
    ];
public function personnageSpecifique(): BelongsTo
    {
        return $this->belongsTo(Personnage::class, 'personnage_id');
    }
   public function personnages(): BelongsToMany
    {
        // On utilise belongsToMany() et on spécifie :
        // 1. Le modèle ciblé (Personnage::class)
        // 2. Le nom de la table pivot (personnage_technique_individuelle)
        return $this->belongsToMany(Personnage::class, 'personnage_technique_individuelle');
    }

    public function styles()
{
    return $this->belongsToMany(CombatStyle::class, 'style_technique', 'technique_id', 'style_id');
}
}