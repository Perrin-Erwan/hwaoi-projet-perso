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
    public function skills(): BelongsToMany
    {
        // REMPLACER 'style_skill' par le nom de votre table pivot.
        // C'est la table qui lie CombatStyle et TechniqueIndividuelle.
       return $this->belongsToMany(TechniqueIndividuelle::class, 'style_technique')
                // Nous incluons withPivot car le seeder et la migration l'utilisent
                ->withPivot('mastery_level');
    }

    /**
     * Relation One-to-Many inverse avec les personnages qui utilisent ce style.
     */
    public function personnages(): HasMany
    {
        return $this->hasMany(Personnage::class, 'combat_style_id');
    }
}