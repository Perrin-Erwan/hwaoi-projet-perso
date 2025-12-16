<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class attaqueSynchroseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        [
            // Ajoutez ici les données de seed pour les attaques synchro

            'nom' => 'Descendance Sacrée',
            'personnage_id' => 1, // ID du personnage principal
            'partenaire_id' => 2, // ID du partenaire pour l'attaque synchro
            'description' => 'Rauru et Zelda attaque main contre main un rayon de lumière surpuissant.',
            'type' => 'Spéciale', // ou 'Spéciale'
        ];
    }
}
