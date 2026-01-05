<?php

namespace Database\Seeders;

use App\Models\AttaqueAmalgamees;
use Illuminate\Database\Seeder;
use App\Models\Personnage;
use Illuminate\Support\Facades\DB;

class AttaqueAmalgameesSeeder extends Seeder
{
    public function run(): void
    {
        // On vide la table pour repartir sur du propre
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AttaqueAmalgamees::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // CONFIGURATION : Associe chaque nom à son type d'arme unique
        // (Le Golem Chevalier est géré à part car il a tout)
        $mappingArmes = [
            'Typhan'  => '1M',
            'Quino'   => 'Lance',
            'Cadlan'  => '2M',
            'Lago'    => '1M',
            'Pastos'  => '2M',
            'Braton'  => 'Lance',
            'Vence'   => '1M',
            'Masba'   => 'Arc',
            'Sholani' => '1M',
            'Ronza'   => '2M',
        ];

        // Dictionnaire des attaques templates
        $templates = [
            '1M'    => [
                'nom' => 'Rafales Tranchantes bokos', 
                'description' => 'Utilisez des matériaux de Bokoblin les uns après les autres pour déclencher une série d\'attaques rapides.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 156, 
                'type' => 'Physique'
                
        ],
        [
                'nom' => 'Rafales Tranchantes lézals', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour déclencher une série d\'attaques rapides.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 168, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Rayons enflammés lézals', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour déclencher une série d\'attaques rapides.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 60, 
                'type' => 'Feu',
                
        ],
        [
                'nom' => 'Rayons Glaciaux lézals', 
                'description' => 'Utilisez des matériaux de bokoblin les uns après les autres pour déclencher une série d\'attaques rapides.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 60, 
                'type' => 'Glace',
                
        ],
        [
                'nom' => 'Rayons électriques lézals', 
                'description' => 'Utilisez des matériaux de bokoblin les uns après les autres pour déclencher une série d\'attaques rapides.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 60, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Pluie de coups gibdo', 
                'description' => 'Utilisez des matériaux de Gibdo les uns après les autres pour déclencher une série d\'attaques rapides.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 88, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Attaque Circulaire chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour concentrer vos forces et lancer une attaque circulaire.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces', 
                'degats' => 128, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Lacération enflammée chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour déclencher une attaque circulaire enflammée.',
                'degats' => 92, 
                'type' => 'Feu',
                
        ],
        [
                 'nom' => 'Lacération glaciale chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour déclencher une attaque circulaire glaciale.',
                'degats' => 92, 
                'type' => 'Glace',
                
        ],
        [
                'nom' => 'Lacération électrique chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour déclencher une attaque circulaire électrique.',
                'degats' => 92, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Attaque Circulaire lynel', 
                'description' => 'Utilisez un matériau de Lynel pour concentrer vos forces et lancer une attaque circulaire.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces',
                'degats' => 154, 
                'type' => 'Physique',
                
        ],
        [
               'nom' => 'Lacération enflammée lynel', 
                'description' => 'Utilisez un matériau de Lynel pour déclencher une attaque circulaire enflammée.',
                'degats' => 104, 
                'type' => 'Feu',
                
        ],
        [
               'nom' => 'Lacération glaciale lynel', 
                'description' => 'Utilisez un matériau de Lynel pour déclencher une attaque circulaire glaciale.',
                'degats' => 104, 
                'type' => 'Glace',
                
        ],
        [
               'nom' => 'Lacération électrique lynel', 
                'description' => 'Utilisez un matériau de Lynel pour déclencher une attaque circulaire électrique.',
                'degats' => 104, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Frappe moblin', 
                'description' => 'Utilisez un matériau de Moblin pour concentrer vos forces et lancer une attaque circulaire.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces', 
                'degats' => 103, 
                'type' => 'Physique',
                
        ],
       [
               'nom' => 'Attaque enflammée moblin', 
                'description' => 'Utilisez un matériau de Moblin pour déclencher une attaque circulaire enflammée.',
                'degats' => 88, 
                'type' => 'Feu',
                
        ],
        [
               'nom' => 'Attaque glaciale moblin', 
                'description' => 'Utilisez un matériau de Moblin pour déclencher une attaque circulaire glaciale.',
                'degats' => 88, 
                'type' => 'Glace',
                
        ],
        [
               'nom' => 'Attaque électrique moblin', 
                'description' => 'Utilisez un matériau de Moblin pour déclencher une attaque circulaire électrique.',
                'degats' => 88, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Broyage hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour concentrer vos forces et lancer une attaque circulaire.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces', 
                'degats' => 135, 
                'type' => 'Physique',
                
        ],
       [
               'nom' => 'Broyage enflammée hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour déclencher une attaque circulaire enflammée.',
                'degats' => 104, 
                'type' => 'Feu',
                
        ],
        [
               'nom' => 'Broyage glacial hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour déclencher une attaque circulaire glaciale.',
                'degats' => 104, 
                'type' => 'Glace',
                
        ],
        [
               'nom' => 'Broyage électrique hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour déclencher une attaque circulaire électrique.',
                'degats' => 104, 
                'type' => 'Électrique',
                
        ], 
        [
                'nom' => 'écrasement lithorok', 
                'description' => 'Utilisez un matériau de Lithorok pour concentrer vos forces et lancer une attaque circulaire.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces',
                'degats' => 134, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Attaque enflammée Magrok', 
                'description' => 'Utilisez un matériau de Magrok pour déclencher une attaque circulaire enflammée.',
                'degats' => 92, 
                'type' => 'Feu',
                
        ],
        [
                'nom' => 'Attaque glaciale givrok', 
                'description' => 'Utilisez un matériau de Givrok pour déclencher une attaque circulaire glaciale.',
                'degats' => 92, 
                'type' => 'Glace',
                
        ],
            '2M'    => [
                'nom' => 'Frénésie circulaire bokos', 
                'description' => 'Utilisez des matériaux de Bokoblin les uns après les autres pour lancer une rapide attaque circulaire.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 156, 
                'type' => 'Physique'
                
        ],
        [
                'nom' => 'Frénésie circulaire lézals', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour lancer une rapide attaque circulaire.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 168, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Frénésie enflammés lézals', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour lancer une rapide attaque circulaire .
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 60, 
                'type' => 'Feu',
                
        ],
        [
                'nom' => 'Frénésie Glaciale lézals', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour lancer une rapide attaque circulaire.
                Plus vous utilisez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 60, 
                'type' => 'Glace',
                
        ],
        [
                'nom' => 'Frénésie électrique lézals', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour lancer une rapide attaque circulaire.
                Plus vous utilisez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 60, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Pluie de coups gibdo', 
                'description' => 'Utilisez des matériaux de Gibdo les uns après les autres pour lancer une rapide attaque circulaire.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 88, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Coup retombant chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour concentrer vos forces et frapper un grand coup.
                Plus le matériau est puissant, plus vous pourrez concentrer de forces', 
                'degats' => 128, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Lacération enflammée chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour déclencher un grand coup enflammée.',
                'degats' => 92, 
                'type' => 'Feu',
                
        ],
        [
                 'nom' => 'Lacération glaciale chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour déclencher un grand coup glacial.',
                'degats' => 92, 
                'type' => 'Glace',
                
        ],
        [
                'nom' => 'Lacération électrique chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour déclencher un grand coup électrique.',
                'degats' => 92, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Coup retombant lynel', 
                'description' => 'Utilisez un matériau de Lynel pour concentrer vos forces et frapper un grand coup.
                Plus le matériau est puissant, plus vous pourrez concentrer de forces',
                'degats' => 154, 
                'type' => 'Physique',
                
        ],
        [
               'nom' => 'Lacération enflammée lynel', 
                'description' => 'Utilisez un matériau de Lynel pour déclencher un grand coup enflammée.',
                'degats' => 104, 
                'type' => 'Feu',
                
        ],
        [
               'nom' => 'Lacération glaciale lynel', 
                'description' => 'Utilisez un matériau de Lynel pour déclencher un grand coup glacial.',
                'degats' => 104, 
                'type' => 'Glace',
                
        ],
        [
               'nom' => 'Lacération électrique lynel', 
                'description' => 'Utilisez un matériau de Lynel pour déclencher un grand coup électrique.',
                'degats' => 104, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Frappe moblin', 
                'description' => 'Utilisez un matériau de Moblin pour concentrer vos forces et frapper un grand coup.
                Plus le matériau est puissant, plus vous pourrez concentrer de forces', 
                'degats' => 103, 
                'type' => 'Physique',
                
        ],
       [
               'nom' => 'Attaque enflammée moblin', 
                'description' => 'Utilisez un matériau de Moblin pour déclencher un grand coup enflammée.',
                'degats' => 88, 
                'type' => 'Feu',
                
        ],
        [
               'nom' => 'Attaque glaciale moblin', 
                'description' => 'Utilisez un matériau de Moblin pour déclencher un grand coup glacial.',
                'degats' => 88, 
                'type' => 'Glace',
                
        ],
        [
               'nom' => 'Attaque électrique moblin', 
                'description' => 'Utilisez un matériau de Moblin pour déclencher un grand coup électrique.',
                'degats' => 88, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Broyage hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour concentrer vos forces et frapper un grand coup.
                Plus le matériau est puissant, plus vous pourrez concentrer de forces', 
                'degats' => 135, 
                'type' => 'Physique',
                
        ],
       [
               'nom' => 'Broyage enflammée hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour déclencher un grand coup enflammée.',
                'degats' => 104, 
                'type' => 'Feu',
                
        ],
        [
               'nom' => 'Broyage glacial hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour déclencher un grand coup glacial.',
                'degats' => 104, 
                'type' => 'Glace',
                
        ],
        [
               'nom' => 'Broyage électrique hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour déclencher un grand coup électrique.',
                'degats' => 104, 
                'type' => 'Électrique',
                
        ], 
        [
                'nom' => 'écrasement lithorok', 
                'description' => 'Utilisez un matériau de Lithorok pour concentrer vos forces et frapper un grand coup.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces',
                'degats' => 134, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Attaque enflammée Magrok', 
                'description' => 'Utilisez un matériau de Magrok pour déclencher un grand coup enflammée.',
                'degats' => 92, 
                'type' => 'Feu',
                
        ],
        [
                'nom' => 'Attaque glaciale givrok', 
                'description' => 'Utilisez un matériau de Givrok pour déclencher un grand coup glacial.',
                'degats' => 92, 
                'type' => 'Glace',
                
        ],
            'Lance' => [
                'nom' =>'Enchainement d\'estoc boko', 
                'description' => 'Utilisez des matériaux de Bokoblin les uns après les autres pour lancer de rapides coups d\'estoc.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 156, 
                'type' => 'Physique'
                
        ],
        [
                'nom' => 'Echainement d\'estoc lézal', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour lancer de rapides coups d\'estoc.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 168, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Enchainement enflammé lézal', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour lancer de rapides coups d\'estoc.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 60, 
                'type' => 'Feu',
                
        ],
        [
                'nom' => 'Enchainement glacial lézal', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour lancer de rapides coups d\'estoc.
                Plus vous utilisez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 60, 
                'type' => 'Glace',
                
        ],
        [
                'nom' => 'Enchainement électrique lézal', 
                'description' => 'Utilisez des matériaux de lézalfos les uns après les autres pour lancer de rapides coups d\'estoc.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 60, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Enchainement gibdo', 
                'description' => 'Utilisez des matériaux de Gibdo les uns après les autres pour lancer de rapides coups d\'estoc.
                Plus vous utiliseez de matériaux, plus l\'attaque dure longtemps', 
                'degats' => 88, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Attaque étendue chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour concentrer vos forces et balayer un grand coup.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces', 
                'degats' => 128, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Tranchage enflammée chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour balayer un grand coup enflammée.',
                'degats' => 92, 
                'type' => 'Feu',
                
        ],
        [
                'nom' => 'Tranchage glacial chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour balayer un grand coup glaciale.',
                'degats' => 92, 
                'type' => 'Glace',
                
        ],
        [
                'nom' => 'Tranchage électrique chef boko', 
                'description' => 'Utilisez un matériau de Chef boko pour balayer un grand coup électrique.',
                'degats' => 92, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Attaque étendue lynel', 
                'description' => 'Utilisez un matériau de Lynel pour concentrer vos forces et balayer un grand coup.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces',
                'degats' => 154, 
                'type' => 'Physique',
                
        ],
        [
               'nom' => 'Tranchage enflammée lynel', 
                'description' => 'Utilisez un matériau de Lynel pour balayer un grand coup enflammée.',
                'degats' => 104, 
                'type' => 'Feu',
                
        ],
        [
               'nom' => 'Tranchage glacial lynel', 
                'description' => 'Utilisez un matériau de Lynel pour balayer un grand coup   glaciale.',
                'degats' => 104, 
                'type' => 'Glace',
                
        ],
        [
               'nom' => 'Tranchage électrique lynel', 
                'description' => 'Utilisez un matériau de Lynel pour balayer un grand coup électrique.',
                'degats' => 104, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Frappe moblin', 
                'description' => 'Utilisez un matériau de Moblin pour concentrer vos forces et balayer un grand coup.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces', 
                'degats' => 103, 
                'type' => 'Physique',
                
        ],
       [
               'nom' => 'Attaque enflammée moblin', 
                'description' => 'Utilisez un matériau de Moblin pour balayer un grand coup enflammée.',
                'degats' => 88, 
                'type' => 'Feu',
                
        ],
        [
               'nom' => 'Attaque glaciale moblin', 
                'description' => 'Utilisez un matériau de Moblin pour balayer un grand coup glaciale.',
                'degats' => 88, 
                'type' => 'Glace',
                
        ],
        [
               'nom' => 'Attaque électrique moblin', 
                'description' => 'Utilisez un matériau de Moblin pour balayer un grand coup électrique.',
                'degats' => 88, 
                'type' => 'Électrique',
                
        ],
        [
                'nom' => 'Broyage hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour concentrer vos forces et balayer un grand coup.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces', 
                'degats' => 135, 
                'type' => 'Physique',
                
        ],
       [
               'nom' => 'éclat enflammée hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour balayer un grand coup enflammée.',
                'degats' => 104, 
                'type' => 'Feu',
                
        ],
        [
               'nom' => 'éclat glacial hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour balayer un grand coup glaciale.',
                'degats' => 104, 
                'type' => 'Glace',
                
        ],
        [
               'nom' => 'éclat électrique hinox', 
                'description' => 'Utilisez un matériau d\'Hinox pour balayer un grand coup électrique.',
                'degats' => 104, 
                'type' => 'Électrique',
                
        ], 
        [
                'nom' => 'écrasement lithorok', 
                'description' => 'Utilisez un matériau de Lithorok pour concentrer vos forces et balayer un grand coup.
                Plus le matériaux est puissant, plus vous pourrez concentrer de forces',
                'degats' => 134, 
                'type' => 'Physique',
                
        ],
        [
                'nom' => 'Attaque enflammée Magrok', 
                'description' => 'Utilisez un matériau de Magrok pour balayer un grand coup enflammée.',
                'degats' => 104, 
                'type' => 'Feu',
                
        ],
        [
                'nom' => 'Attaque glaciale givrok', 
                'description' => 'Utilisez un matériau de Givrok pour balayer un grand coup glaciale.',
                'degats' => 104, 
                'type' => 'Glace',
                
        ],
            'Arc'   => [    
                'nom' => 'Tir Soneau', 
                'description' => 'Décoche des flèches imprégnées d\'énergie qui explosent au contact.', 
                'degats' => 55, 
                'type' => 'Explosif'],
        ];

        // 1. GESTION DU GOLEM CHEVALIER (TOUS LES TYPES)
        $golem = Personnage::where('nom', 'Chevalier Golem')->first();
        if ($golem) {
            foreach ($templates as $type => $data) {
                $this->saveAttaque($golem->id, $type, $data);
            }
            $this->command->info("Attaques créées pour : Golem Chevalier (Toutes)");
        }

        // 2. GESTION DES AUTRES PERSONNAGES (TYPE UNIQUE)
        foreach ($mappingArmes as $nom => $typeArme) {
            $p = Personnage::where('nom', $nom)->first();
            
            if ($p && isset($templates[$typeArme])) {
                $this->saveAttaque($p->id, $typeArme, $templates[$typeArme]);
                $this->command->info("Attaque {$typeArme} créée pour : {$nom}");
            } else {
                $this->command->warn("Personnage non trouvé ou type invalide pour : {$nom}");
            }
        }
    }

    private function saveAttaque($personnageId, $type, $data) {
        AttaqueAmalgamees::create([
            'nom'           => $data['nom'],
            'description'   => $data['description'],
            'degats'        => $data['degats'],
            'type'          => $data['type'],
            'arme_requise'  => $type,
            'personnage_id' => $personnageId
        ]);
    }
}