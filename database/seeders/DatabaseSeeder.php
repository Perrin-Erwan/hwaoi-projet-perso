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
            // 1. DATA INDÉPENDANTES (Techniques, Styles, Armes, Artefacts)
            CombatStyleSeeder::class, 
            // 2. PERSONNAGES (Dépendent de CombatStyle)
            PersonnageSeeder::class,
            ArmeSeeder::class, 
            TechniqueSeeder::class,
            ArtefactsSoneauxSeeder::class,
            // 3. LIAISONS ET DÉTAILS (Dépendent des Personnages existants)
            PersonnageTechniqueSeeder::class, 
            PersonnageImagePathSeeder::class,
            
            // 4. ATTAQUES SPÉCIALES (Dépendent des Personnages)
            AttaqueSynchroSeeder::class,
            AttaqueAmalgameesSeeder::class, // Ajout de ton nouveau Seeder ici
            EnnemisSeeder::class,
        ]);
    }
}