<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // ==========================================================
            // ORDRE LOGIQUE ET SANS DOUBLONS
            // ==========================================================
            
            // 1. TECHNIQUES : Doivent exister pour pouvoir être liées aux styles et aux personnages.
            TechniqueSeeder::class, 

            // 2. STYLES DE COMBAT : Doivent exister pour être liés aux Personnages. 
            // Ils lient aussi les Techniques (via style_technique).
            CombatStyleSeeder::class, 

            // 3. PERSONNAGES : Doivent être créés. 
            // Ils référencent CombatStyle (via classe_id).
            PersonnageSeeder::class, 

            // 4. LIAISON PERSONNAGE <-> TECHNIQUE : Les pivots doivent exister.
            PersonnageTechniqueSeeder::class, 

            // (Ajouter ici les seeders pour Arme, AttaqueSynchro, etc., si vous en avez)
        ]);
    }
}