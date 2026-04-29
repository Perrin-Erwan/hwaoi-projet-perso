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
                'description' => 'Derrière sa carrure imposante, le robuste chef des Gorons renferme une passion silencieuse. 
                Il roule sur le champ de bataille, envoyant voler les ennemis à chaque moulinet de son énorme épée.
                Ses attaques sont enveloppées par le pouvoir du feu et lui permettent de détruire de gros rochers.',
                'techniques' => ['éruption collossale'] 
            ],
            [
                'nom' => 'Sage de l\'eau',
                'type' => 'Action de Qia',
                'description' => 'La reine des Zoras est une guerrière intrépide qui manie la lance et utilise sa maîtrise des courants pour manipuler l\'eau 
                et attaquer violemment ses ennemis.
                Appuyez sur YYYYX pour créer un tourbillon qui attire les ennemis alentours.',
                'techniques' => ['Torrents débordants'] 
            ],
            [
                'nom' => 'Sage du vent',
                'type' => 'Action de Raphica',
                'description' => 'Alors qu\'il parcourt avec les cieux au-dessus du champ de bataille, 
                le chef des Piafs combat en tirant des flèches depuis le ciel et en donnant de puissant coups de serres. 
                Appuyez sur YYYX pour manipuler des sphères de vent qui attaquent sur un large périmètre. 
                Lorsque duvent touche les ennemis enflammés, gelées ou électrocutés, ou certains artéfacts soneaux posés au sol, une combinaison d\'actions se produit,
                créant des tourbillons de flammes, de glace ou de foudre.',
                'techniques' => ['Chute céleste'] 
            ],
            [
                'nom' => 'Sage de la foudre',
                'type' => 'Action d\'Ardi',
                'description' => 'Cette guerrière gerudo manipule son cimeterre avec habileté et élégance, 
                lui insufflant le pouvoir de la foudre pour terrasser ses ennemis. Lorsque vous vous protégez avec ZL, 
                appuyez sur Y au bon moment pour effectuer une garde optimale avec votre bouclier.',
                'techniques' => ['Coup de pied foudroyant'] 
            ],
            [
                'nom' => 'Guerrier vétéran d\'hyrule',
                'type' => 'Action de Typhan',
                'description' => 'Un guerrier d\'hyrule expérimenté qui combat à l\'aide d\'une épée à une main et un bouclier.
                Ses puissantes attaques lui pemettent de dominer ses ennemis. Lorsque vous vous protégez avec ZL, 
                appuyez sur Y au bon moment pour effectuer une garde optimale avec votre bouclier.',
                'techniques' => ['Frénésie volante'] 
            ],
            [
                'nom' => ' Jeune Guerrier d\'hyrule',
                'type' => 'Action de Quino',
                'description' => 'Un jeune guerrier d\'élite hylien qui manie avec brio une énorme épée à deux mains 
                et ferait tout pour protéger le royaume d\'Hyrule qu\'il aimes tant. 
                Certaines de ses attaques fortes envoient une onde tranchante qui peut frapper les ennemis éloignés.',
                'techniques' => ['Lacération projetée'] 
            ],
            [
                'nom' => 'Guerrier vétéran Zora',
                'type' => 'Action de Lago',
                'description' => 'Un vétéran qui servait le précédent roi zora. 
                épée en main, il attaque avec une virtuosité exceptionnelle et une vitesse incroyable. 
                Utilisée au bon moment, sa technique individuelle "Ressac" peut repousser les attaques ennemis.',
                'techniques' => ['Ressac'] 
            ],
            [
                'nom' => 'Admirateur zora',
                'type' => 'Action de Cadlan',
                'description' => 'Un jeune soldat zora entièrement dévoué à Qia. Bien qu\'encore un peu brut, 
                il est très agile et manie sa lance avec une grande dextérité sur le champ de bataille. 
                Pendant les attaques fortes, maintenez X enfoncer pour que les lames d\'eau attaquent sur un plus large périmètre.',
                'techniques' => ['Déluge au sommet'] 
            ],
            
        ];

        
        foreach ($stylesData as $data) {
            
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