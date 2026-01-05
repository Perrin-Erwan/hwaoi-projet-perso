<?php

namespace Database\Seeders;

use App\Models\ArtefactSoneaux;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personnage;

class ArtefactsSoneauxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ArtefactSoneaux::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // On récupère par exemple Zelda ou le premier perso pour leur donner les objets
    $tousLesPersonnages = Personnage::all();

        $artefacts = [
            [
                'nom' => 'Turbine',
                'description' => 
                'Cet artéfact soneau est pourvu d\'une hélice rapide produisant 
                un fort souffle de vent qui renvoie les projectiles adverses et projette l\'ennemi dans les airs.',
                'effet' => 10,
            ],
            [
                'nom' => 'Montgolfière',
                'description' => 'Cet artéfact soneau s\'élève dans les airs sous l\'effet de la chaleur. 
                Il vous permet de vous rendre dans un avant-poste allié.',
                'effet' => 0,
            ],
            [
                'nom' => 'Propulseur',
                'description' => 'Cet artéfact soneau fournit une grande énergie de propulsion. 
                Il vous permet de charger à travers les groupes d\'ennemis tant que votre batterie n\'est pas vide.',
                'effet' => 25,
            ],
            [
                'nom' => 'Bombe à retardement',
                'description' => 'Cet artéfact soneau déclenche une explosion après un certain temps, 
                dont la déflagration souffle tout ce qui se trouve à proximité.',
                'effet' => 25,
            ],
            [
                'nom' => 'lance-flamme',
                'description' => 'Cet artéfact soneau crache une longue flamme droit devant lui, permettant de mettre le feu aux ennemis.',
                'effet' => 55,
            ],
            [
                'nom' => 'Lance-glace',
                'description' => 'Cet artéfact soneau souffle de l\'air glacial droit devant lui, ce qui a pour effet de geler les ennemis.',
                'effet' => 40,
            ],
            [
                'nom' => 'Lance-foudre',
                'description' => 'Cet artéfact soneau projette un éclair droit devant lui, électrifiant les ennemis sur son passage.',
                'effet' => 65,
            ],
            [
                'nom' => 'Lance-laser',
                'description' => 'Cet artéfact soneau émet par sa corne un rayon de lumière qui frappe tous les ennemis sur son passage.',
                'effet' => 65,
            ],
            [
                'nom' => 'Déverseur',
                'description' => 'Cet artéfact soneau fait couler de l\'eau fraiche, trempant les ennemis à proximité et nettoyant la vase.',
                'effet' => 45,
            ],
            [
                'nom' => 'Canon',
                'description' => 'Cet artéfact soneau envoie des projectiles enflammés dans la direction dans laquelle il a tourné.',
                'effet' => 40,
            ],
        ];
        foreach ($tousLesPersonnages as $personnage) {
        
        // 4. Pour CE personnage précis, on crée les artéfacts
        foreach ($artefacts as $data) {
            // Ici, on utilise $personnage->id car on est à l'intérieur de la boucle
            $data['personnage_id'] = $personnage->id;
            
            ArtefactSoneaux::create($data);
        }
        
        $this->command->info("Données créées pour : " . $personnage->nom);
    }
    }
}
