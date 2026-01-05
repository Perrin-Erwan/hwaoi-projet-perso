<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Collection; // Importé pour clarifier le type de retour

class Personnage extends Model
{
    use HasFactory;
    
    // Le nom de la table est bien 'personnage' (singulier)
    protected $table = 'personnage'; 
    
    protected $fillable = [
        'nom', 
        'alias', 
        'description',
        'description_courte',
        'role',
        'coeurs_base', 
        'arme_principale', 
        'element', 
        'classe_id',
        'bonus_permanents',
        'image_path',
    ];

    protected $casts = [
        'bonus_permanents' => 'array',
    ];

    // ========================================================
    // ROUTE MODEL BINDING
    // ========================================================
    
    public function getRouteKeyName(): string
    {
        return 'nom'; 
    }

    // ========================================================
    // RELATIONS
    // ========================================================

    public function combatStyle(): BelongsTo
    {
        return $this->belongsTo(CombatStyle::class, 'classe_id'); 
    }
    
    public function techniques(): BelongsToMany
    {
        return $this->belongsToMany(TechniqueIndividuelle::class, 'personnage_technique_individuelle')
                    ->withTimestamps();
    }
    
    public function techniquesIndividuelles(): BelongsToMany
    {
        return $this->techniques();
    }
    
    public function armes(): HasMany
    {
        return $this->hasMany(Arme::class, 'personnage_id');
    }
    
    public function attaqueSynchro(): HasMany
    {
        return $this->hasMany(AttaqueSynchro::class, 'personnage_id');
    }
    
    public function attaquesEnTantQuePartenaire(): HasMany
    {
        // 🚨 Assurez-vous que la colonne 'partner_personnage_id' existe dans votre table 'attaque_synchro'
        return $this->hasMany(AttaqueSynchro::class, 'partenaire'); 
    }

    public function artefactsSoneaux(): HasMany
    {
        return $this->hasMany(ArtefactSoneaux::class, 'personnage_id');
    }

    public function attaquesAmalgamees()
{
    return $this->hasMany(AttaqueAmalgamees::class, 'personnage_id');
}
    
    // ========================================================
    // ACCESSEURS (Attributes)
    // ========================================================

    /**
     * Calcule les PV Totaux (Base + Bonus). Utilisation : $personnage->pvTotaux
     */
    protected function pvTotaux(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => 
                ($attributes['coeurs_base'] ?? 0) 
                + ($attributes['bonus_permanents']['coeurs'] ?? 0),
        );
    }
    
    /**
     * Calcule l'Attaque Totale. Utilisation : $personnage->attaqueTotale
     */
    protected function attaqueTotale(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => 10
                + ($attributes['bonus_permanents']['attaque'] ?? 0),
        );
    }

    /**
     * 🚨 CORRECTION CRITIQUE : Renommée en getArmesUtilisablesAttribute
     * Accesseur qui retourne la collection d'armes uniques + armes génériques utilisables.
     * Utilisation : $personnage->armesUtilisables
     */
    public function armesUtilisables(): Collection
    {
        // --- LOGIQUE DE MAPPING BASÉE SUR LE NOM (Conservée car elle était dans votre code) ---
        $typeMappings = [
            'Chevalier Golem' => ['Arme à une main', 'Arme à deux mains', 'Lance'],
            'Typhan'          => ['Arme à une main'],
            'Lago'            => ['Arme à une main'],
            'Cadlan'         => ['Lance'],
            'Quino'           => ['Arme à deux mains'],
            'Pastos'         => ['Arme à deux mains'],
            'Braton'         => ['Lance'],
            'Vence'          => ['Arme à une main'],
            'Masba'          => ['Lance'],
            'Sholani'        => ['Arme à une main'],
            'Ronza'          => ['Arme à deux mains'],
            // ... (Vos autres mappings)
            'Raphica'         => ['Arc'],
            // etc.
        ];
        
        // --- 1. Déterminer les types d'armes génériques que ce personnage peut utiliser ---
        
        // Option A (Utilise votre logique de mapping par nom)
        $typesPermis = $typeMappings[$this->nom] ?? [];
        
        /* // Option B (Utilise la relation CombatStyle que nous avons corrigée)
        // Ceci est la meilleure approche si votre CombatStyleSeeder est bien aligné maintenant.
        // if ($this->combatStyle) {
        //     $typesPermis = [$this->combatStyle->type];
        // } else {
        //     $typesPermis = [];
        // }
        */

        // 2. Récupérer les armes spécifiques (uniques)
        $armesSpecifiques = $this->armes;
        
        // 3. Récupérer les armes génériques correspondantes
        $armesGeneriques = collect();

        if (!empty($typesPermis)) {
             $armesGeneriques = Arme::whereIn('type', $typesPermis)
                                    ->whereNull('personnage_id') 
                                    ->get();
        }
        
        // 4. Combiner les armes spécifiques et les armes génériques (sans doublons sur le nom)
        return $armesSpecifiques->merge($armesGeneriques)->unique('nom');
    }
}