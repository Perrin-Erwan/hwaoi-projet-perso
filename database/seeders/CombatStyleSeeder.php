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
        Schema::disableForeignKeyConstraints();
        DB::table('style_technique')->truncate();
        CombatStyle::truncate();
        Schema::enableForeignKeyConstraints();

        // --- CONFIGURATION DES PERSONNAGES ---
        // Ajoute simplement tes 19 personnages ici au fur et à mesure
        $stylesData = [
            [
                'nom' => 'Force royale Soneau',
                'type' => 'Action de Rauru',
                'description' => 'Le roi fondateur d\'Hyrule est un descendant des Soneaux qui possède le pouvoir de la lumière.
                Armé du pouvoir emprise et d\'une lance de sonium, il combat majestueusement les forces du mal.',
                'techniques' => ['lance de lumière-Choc céleste'] // Nom exact de la technique
            ],
            [
                'nom' => 'Sagesse Royale',
                'type' => 'Action de Zelda',
                'description' => 'La princesse d\'hyrule a voyagé dans le temps et livre désormais bataille dans le passé. 
                Elle manie une épée de sonium que lui a confiée Rauru et qu\'elle a imprégnée du pouvoir de la lumière. 
                Elle peut également repousser les projectiles ennemis grâce au pouvoir du temps que Sonia lui a appris à dompter.',
                'techniques' => ['Arc de Lumière']
            ],
             [
                'nom' => 'Sagesse Soneau',
                'type' => 'Action de Mineru',
                'description' => 'La soeur ainée du roi d\'hyrule qui possède le pouvoir de l\'esprit ainsi qu\'une grande connaissance de la civilisation soneau.
                Elle combat avec grâce en reproduisant des combinaisons d\'artéfacts soneaux grâce à Duplicata et en invoquant des golems.',
                'techniques' => ['Lancement de golem'] 
            ],
            [
                'nom' => 'Héritage du Chevalier',
                'type' => 'Action du Golem Chevalier',
                'description' => 'Lorsqu\'il utilise une épée à une main dans sa main droite, 
                le Golem chevalier génère un bouclier d\'énergie soneau dans sa main gauche. 
                Lorsqu\'il sa techique individuelle "Pleine puissance", la batterie ne se vide pas pendant un court instant.',
                'techniques' => ['Pleine puissance'] 
            ],
            [
                'nom' => 'Korogu multi-fruits',
                'type' => 'Action de Calamo',
                'description' => 'Un Korogu pérégrin sans racines qui sort les divers fruits qu\'il a ramassés au cours de ses voyages pour déclencher autres des attaques de feu, de glace ou de foudre.',
                'techniques' => ['Rebond fongique'] 
            ],
            [
                'nom' => 'Sage du feu',
                'type' => 'Action d\'Agraston',
                'description' => '.',
                'techniques' => ['Rebond fongique'] 
            ],
            // AJOUTE LES 16 AUTRES ICI...
        ];

        // --- LOGIQUE D'INSERTION AUTOMATIQUE ---
        foreach ($stylesData as $data) {
            // Création du style
            $style = CombatStyle::create([
                'nom' => $data['nom'],
                'type' => $data['type'],
                'description' => $data['description'],
            ]);

            // Liaison automatique des techniques
            foreach ($data['techniques'] as $nomTechnique) {
                $technique = TechniqueIndividuelle::where('nom', $nomTechnique)->first();
                
                if ($technique) {
                    $style->techniques()->attach($technique->id, ['mastery_level' => 1]);
                }
            }
        }
    }
}