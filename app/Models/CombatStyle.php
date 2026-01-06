<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TechniqueIndividuelle;
use App\Models\Personnage;

class CombatStyle extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type', 'description'];

    /**
     * Relation Many-to-Many avec les techniques (skills) débloquées par ce style.
     * La table pivot doit contenir le champ 'mastery_level'.
     */
    public function techniques()
{
    return $this->belongsToMany(
        TechniqueIndividuelle::class, 
        'style_technique',           // Nom de ta table pivot
        'combat_style_id',           // Clé étrangère vers CombatStyle (selon ta migration)
        'technique_individuelle_id'  // Clé étrangère vers Technique (selon ta migration)
    )->withPivot('mastery_level');
}

    /**
     * Relation One-to-Many inverse avec les personnages qui utilisent ce style.
     */
    public function personnages(): HasMany
    {
        return $this->hasMany(Personnage::class, 'combat_style_id');
    }
}