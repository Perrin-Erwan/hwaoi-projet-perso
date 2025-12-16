<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CombatStyle;
use App\Models\TechniqueIndividuelle;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CombatStyleSeeder extends Seeder
{
    public function run(): void
    {
        // Désactivation temporaire des contraintes de clé étrangère pour le nettoyage
        Schema::disableForeignKeyConstraints();
        
        // Nettoyage des tables pour éviter les doublons lors des exécutions répétées
        DB::table('style_technique')->truncate();
        CombatStyle::truncate();
        
        Schema::enableForeignKeyConstraints();

        // 1. Création des Styles de Combat
        $styleMaitriseEpee = CombatStyle::create([
            'nom' => 'Maîtrise de l\'Épée', 
            // 🚨 CORRECTION CRITIQUE : Aligné sur le type des armes génériques dans ArmeSeeder.php
            'type' => 'Arme à une main', 
            'description' => 'Style équilibré favorisant l\'attaque et la défense.',
        ]);
        
        $styleMageCeleste = CombatStyle::create([
            'nom' => 'Mage Céleste', 
            // 🚨 CORRECTION CRITIQUE : Aligné sur le type des bâtons/sceptres génériques
            'type' => 'Arme à une main', 
            'description' => 'Concentration sur les sorts de zone et le support magique.',
        ]);

        // 2. Liaison des Styles aux Techniques (Table Pivot : style_technique)
        
        // Récupération des techniques créées par votre TechniqueSeeder (Nous supposons ces noms)
        $arcLumiere = TechniqueIndividuelle::where('nom', 'Arc de Lumière')->first();
        $frappeEtheree = TechniqueIndividuelle::where('nom', 'Frappe Éthérée')->first();
        
        // Lier des techniques à 'Maîtrise de l\'Épée'
        if ($styleMaitriseEpee && $frappeEtheree) {
            $styleMaitriseEpee->skills()->sync([
                $frappeEtheree->id => ['mastery_level' => 1],
                // Ajoutez d'autres techniques si nécessaire
            ]);
        }
        
        // Lier des techniques à 'Mage Céleste'
        if ($styleMageCeleste && $arcLumiere) {
            $styleMageCeleste->skills()->sync([
                $arcLumiere->id => ['mastery_level' => 1],
            ]);
        }
    }
}