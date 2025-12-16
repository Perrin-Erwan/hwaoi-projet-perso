<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personnage;
use App\Models\TechniqueIndividuelle; // Assurez-vous d'importer le bon modèle
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Fichier : database/seeders/TechniqueSeeder.php

public function run(): void
{
    // Nettoyer la table avant de reseeder
   Schema::disableForeignKeyConstraints();

        // 2. NETTOYER LES DEUX TABLES (PIVOT ET PRINCIPALE)
        
        // Nettoyer la table pivot en premier pour éviter l'erreur 1701
        DB::table('personnage_technique_individuelle')->truncate(); 
        
        // Nettoyer la table TechniqueIndividuelle (nécessite que le modèle soit corrigé pour le nom au pluriel)
        TechniqueIndividuelle::truncate(); 

        // 3. RÉACTIVER LES CLÉS ÉTRANGÈRES
        Schema::enableForeignKeyConstraints();

    // Définition des techniques individuelles par nom de personnage
    $techniquesData = [
        'Zelda' => [
            ['nom' => 'Arc de lumière', 'description' => 'Faites pleuvoir des flèches de lumière sur vos ennemis.','dégâts' => 75],
            ['nom' => 'Lumière transperçante', 'description' => 'Faites jaillir un rayon de lumière de la pointe de votre épée.','dégâts' => 60],
            ['nom' => 'Double frappe temporelle', 'description' => 'Imprégnée votre épée de lumière, puis lancez-la sur l\'ennemi avant de remonter le temps pour assener une seconde attaque.', 'dégâts' => 90],
            ['nom' => 'Riposte temporelle', 'description' => 'Renvoyez une attaque ennemie grâce à votre pouvoir du temps.', 'dégâts' => 50],
        ],
        'Rauru' => [
            ['nom' => 'Lance de lumière-Choc céleste', 
            'description' => 'Une technique du style de combat à la lance de lumière de Rauru. 
            Faites jaillir de terre des décharges de lumière pure jusqu\'au ciel pour frapper l\'ennemi.','dégâts' => 95],
            ['nom' => 'Lance de lumière-forteresse', 
            'description' => 'Une technique du style de combat à la lance de lumière de Rauru. 
            Créez d\'innombrables javelots de lumière devant devant vous et lancez-les tous d\'un coup.','dégâts' => 75],
            ['nom' => 'Lance de lumière-Impact zéro', 
            'description' => 'Une technique du style de combat à la lance de lumière de Rauru. 
            Faites pleuvoir des javelots de lumière qui provoquent une onde de choc.','dégâts' => 90],
            ['nom' => 'emprise', 'description' => 'Renvoyez une attaque grâce au pouvoir de l\'emprise.','dégâts' => 60],
            ['nom' => 'Onde royale', 'description' => 'Concentrez le pouvoir de lumière au creux de votre main, puis libérez-le en projetant une puissante onde de choc.','dégâts' => 130],
        ],
        'Mineru' => [
            ['nom' => 'Lancement de golem', 'description' => 'Lancez un golem soldat tournant à grande vitesse vers l\'avant en diagonale. Le golem s\'envole en tranchant le ciel.','dégâts'=> 45],
            ['nom' => 'Tir sphérique', 'description' => 'Faites rouler une énorme boule de fer droit devant.','dégâts'=> 90],
            ['nom' => 'Batterie inépuisable', 'description' => 'Augmente le rendement de votre batterie qui ne se vide pas pendant un moment.','dégâts'=> 0],
            ['nom' => 'Riposte venteuse', 'description' => 'Déclenchez un vent puissant avec une turbine pour renvoyer les attaques ennemies.','dégâts'=> 55],
        ],
        'Agraston' => [
            ['nom' => 'éruption colossale', 'description' => 'Frappez le sol avec vos deux mains, 
            puis portez un puissant coup vers le haut pendant que la lave jaillit du sol dévasté dans une vaste zone.', 'dégâts' => 90],
            ['nom' => 'Violente collision', 'description' => 'Roulez puissament vers l\'avant en emportant tout sur votre passage.', 'dégâts' => 70],
            ['nom' => 'Grande éruption', 'description' => 'Bondissez, couvert de flammes, puis assénez un coup de poing explosif en retombant.', 'dégâts' => 95],
            ['nom' => 'Pyrosphère', 'description' => 'Lancez une boule enflammée qui explose à l\'impact.', 'dégâts' => 50],
        ],
        'Qia' => [
            ['nom' => 'Torrents débordants', 
            'description' => 'Frappez le sol avec avec le talon de votre lance afin de projeter de violentes trombes d\'eau qui frapperont les ennemis face à vous.', 
            'dégâts' => 75
        ],
            [
                'nom' => 'Aqualance transperçante', 'description' => 'Portez un coup qui repousse vos ennemis et crée un tourbillon portez des coups supplémentaires.
                Maintenez le bouton pour charger une attaque plus puissante.', 
                'dégâts' => 50
            ],
            ['nom' => 'écume féroce', 'description' => 'Faites jaillir un puissant jet d\'eau devant vous.', 'dégâts' => 55],
            [   
                'nom' => 'Tourbillon tournoyant', 
                'description' => 'Effectuez une chargevers l\'avant tout en frappant les ennemis de toutes parts puis faites déferler une grande vague qui les emporte.', 
                'dégâts' => 50],
        ],
        'Raphica' => [
            ['nom' => 'Chute céleste', 'description' => 'Bandez votre arc, puis visez avant de tirer en générant une puissante tornade.', 'dégâts' => 75],
            ['nom' => 'Botte de vent', 'description' => 'Prenez votre envol, puis retombez vers le sol d\'un coup de serres acérées.', 'dégâts' => 50],
            [   
                'nom' => 'Flèche à déflagration', 
                'description' => 'Tirez une pluie de flèches explosives aux ennemis en face de vous.Les explosions déclenchent des lames de vent', 
                'dégâts' => 90
            ],
            ['nom' => 'Ouragan', 'description' => 'Chevauchez le vent pour frapper l\'ennemi et déclenchez un puissant tourbillon vers l\'avant.', 'dégâts' => 50],
        ],
        'Ardi' => [
            [
                'nom' => 'Coup de pied foudroyant', 
                'description' => 'Bondissez en donnant un puissant coup de pied vers le haut puis faites tomber la foudre en atterrissant.', 
                'dégâts' => 55
            ],
            [
                'nom' => 'Charge tonitruante', 'description' => 'Foncez en avant pour transpercer les ennemis qui vous font face.
                Appuyez de façon répétée pour déclencher de puissantes décharges électriques.', 
                'dégâts' => 90
            ],
            ['nom' => 'Choc conducteur', 'description' => 'Frappez le sol avec votre bouclier pour faire tomber la foudre devant vous.', 'dégâts' => 70],
            [
                'nom' => 'Frappe fulgurante', 
                'description' => 
                'Plongez en avant à la vitesse de l\'éclair tout en infligeant une puissante série de coups de taille 
                et en faisant abattre un violent éclaire devant vous.', 
                'dégâts' => 50],
        ],
        'Chevalier Golem' => [
            [
                'nom' => 'Attaque tournoyante (épée à une main)', 
                'description' => 'élevez-vous dans les airs en faisant tournoyer votre arme puis portez un coup vers le ciel.', 
                'dégâts' => 70
            ],
            [
                'nom' => 'Pleine puissance', 
                'description' => 'Augmente l\'alimentation en énergie soneau, cequi empêche la batterie de se vider pendant un instant.', 
                'dégâts' => 0
            ],
            [
                'nom' => 'Plongeon golem (épée à une main)', 
                'description' => 'Bondissez vers l\'avant et allongez vos bras planter votre arme dans le sol. 
                Rétractez ensuite vos bras pour vous écraser au sol en déclenchant une onde de choc.', 
                'dégâts' => 75],
            [
                'nom' => 'Coup de pied riposte (épée à deux mains)', 
                'description' => 'Plantez votre arme dans le sol puis reculez rapidement en tendant vos bras, 
                avant de les rétracter pour foncer en avant et donner un puissant coup de pied.', 
                'dégâts' => 95
            ],
            [
                'nom' => 'Fouet aérien (épée à deux mains)', 
                'description' => 'décrivez de grands arcs de cercle avec votre arme pour prendre de l\'élan, puis donnez un puissant coup vers le haut.', 
                'dégâts' => 90
            ],
            [
                'nom' => 'Coup riposte (lance)', 
                'description' => 'Tendez vos bras pour votre lance, puis déclenchez un puissant coup droit devant.', 
                'dégâts' => 55
            ],
            [
                'nom' => 'Rafale tourbillonnante (lance)', 
                'description' => 'Faites tournez votre lance rapidement pour créer une grande tornade devant vous.', 
                'dégâts' => 40
            ],
        ],
        'Calamo' => [
            [
                'nom' => 'Rebond fongique', 
                'description' => 'Rebondissez sur un champignon pour vous propulser dans les airs, puis déclenchez une attaque circulaire tout en planant.',
                'dégâts' => 55
            ],
            [
                'nom' => 'Charge de clarté', 
                'description' => 'Tranchez des fruits de clarté afin de projeter un éclat de lumière aveuglante devant vous.',
                'dégâts' => 50
            ],
            [
                'nom' => 'Fleur bombe', 
                'description' => 'Lancez des fleurs bombes sur une cible afin de déclencher une énorme explosion.',
                'dégâts' => 90
            ],
        ],
        'Typhan' => [
            [
                'nom' => 'Frénésie volante', 
                'description' => 'Bondissez puis tailladez l\'ennemi de deux frappes agiles.' , 
                'dégâts' => 55
            ],
            // CORRECTION DE L'ERREUR SYNTAXIQUE : Déplacement de cette technique sous Typhan
            [
                'nom' => 'Assaut bouclier', 
                'description' => 'Levez votre bouclier puis chargez rapidement vers l\'avant.',
                'dégâts' => 80
            ],
        ],
        'Quino' => [
            [
                'nom' => 'Lacération projetée', 'description' => 
                'Frappez le sol d\'un coup d\'épée projetant une onde de choc vers l\'avant.', 
                'dégâts' => 80
            ],
            [
                'nom' => 'Assaut défensif', 
                'description' => 'Adoptez une posture défensive, puis foncez en avant. Maintenez le bouton afin de charger une attaque plus puissante.',
                'dégâts' => 95
            ],
        ],
        'Cadlan' => [
            [
                'nom' => 'Déluge au sommet', 
                'description' => 'Portez de puissants coups vers le haut. Le dernier projette une onde de choc aquatique.',
                'dégâts' => 80
            ],
            [
                'nom' => 'Roue aquatique écrasante', 
                'description' => 'Chargez vers l\'avant en tournoyant avec votre lance à la main.',
                'dégâts' => 75
            ],
        ],
        'Lago' => [
            [
                'nom' => 'Typhon affuté', 
                'description' =>'Bondissez dans les airs avec grâce, puis attaquez en tournoyant. 
                Appuyez à nouveau sur le bouton pour effectuer une attaque supplémentaire.', 
                'dégâts' => 55
            ],
            [
                'nom' => 'Ressac', 
                'description' => 'Foncez vers l\'avant et donnez un puissant coup de taille. L\'attaque sera beaucoup plus puissante si vous la déclenchez en même temps que celle de l\'ennemi',
                'dégâts' => 35
            ],
        ],
        'Pastos' => [
            [
                'nom' => 'Arrache-terre', 
                'description' => 'Arrachez un morceau et lancez-le violemment sur les ennemis dans le ciel. Maintenez le bouton pour charger une attaque plus puissante.', 
                'dégâts' => 100
            ],
            [
                'nom' => 'Coup d\'estoc chargé', 
                'description' => 'Concentrez une puissante attaque, puis foncez vers l\'avant avec votre épée à deux mains.',
                'dégâts' => 95
            ],
        ],
        'Braton' => [
            [
                'nom' => 'Coup de boule volant', 
                'description' => 'Bondissez dans les airs et assénez un coup de tête.'
                , 'dégâts' => 80
            ],
            [
                'nom' => 'Coup d\'estoc poussiéreux', 
                'description' => 'Aveuglez un adversaire avec un nuage de poussière, puis portez un puissant coup d\'estoc.',
                'dégâts' => 75
            ],
        ],
        'Vence' => [
            [
                'nom' => 'Moulin à vent tranchant', 
                'description' => 'Faites un saut périlleux dans les airs, puis élevez-vous en frappanrt les ennemis au passage.', 
                'dégâts' => 60    
            ],
            [
                'nom' => 'choc en spirale', 
                'description' => 'Foncez droit devant à tire-d\'aile, frappant les ennemis proches.',
                'dégâts' => 30
            ],
        ],
        'Masba' => [
            [
                'nom' => 'Tranche azur', 
                'description' => 'Jetez votre lance dans les airs, puis bondissez et attrapez-là au vol.', 
                'dégâts' => 75
            ],
            [
                'nom' => 'élan aérien', 
                'description' => 'Envolez-vous pour prendre de l\'élan, puis chargez.',
                'dégâts' => 100
            ],
        ],
        'Sholani' => [
            [
                'nom' => 'Valse à l\'épée', 
                'description' => 'Bondissez haut dans le ciel en donnant un coup d\'épée.', 
                'dégâts' => 30
            ],
            [
                'nom' => 'Bourrasque tournoyante', 
                'description' => 'Foncez en effectuant une attaque circulaire à grande vitesse.',
                'dégâts' => 80
            ],
        ],
        'Ronza' => [
            [
                'nom' => 'Têmpête bondissante', 
            'description' => 'Bondissez dans les airs et lancez une attaque tourbillonnante, créant une tornade qui s\'abat sur les ennemis proches.'
            , 'dégâts' => 100
            ],
            [
                'nom' => 'Grande représailles', 
                'description' => 'Donnez un puissant coup d\'épée vers l\'avant.',
                'dégâts' => 95
            ],
        ]
    ];

    // 2. Parcourir les données et les insérer
    foreach ($techniquesData as $personnageNom => $techniquesList) {
            
            $personnage = Personnage::where('nom', $personnageNom)->first();

            if ($personnage) {
                $this->command->info("Ajout des techniques pour : {$personnageNom}");
                
                foreach ($techniquesList as $data) {
                    TechniqueIndividuelle::firstOrCreate(
                        [
                            'nom' => $data['nom'],
                            'personnage_id' => $personnage->id, 
                        ],
                        [
                            'description' => $data['description'],
                            'dégâts' => $data['dégâts'] ?? null,
                        ]
                    );
                }
            } else {
                $this->command->error("Personnage '{$personnageNom}' non trouvé. Techniques non insérées. (Avez-vous exécuté votre PersonnageSeeder ?)");
            }
        }
        
        $this->command->info('Seed Techniques Individuelles terminé !');
    }
}