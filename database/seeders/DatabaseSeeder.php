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
            CombatStyleSeeder::class, 
            PersonnageSeeder::class,
            ArmeSeeder::class, 
            TechniqueSeeder::class,
            ArtefactsSoneauxSeeder::class,
            PersonnageTechniqueSeeder::class, 
            PersonnageImagePathSeeder::class,
            AttaqueSynchroSeeder::class,
            AttaqueAmalgameesSeeder::class, 
            EnnemisSeeder::class,
        ]);
    }
}