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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AttaqueAmalgamees::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $mappingArmes = [
            'Typhan'  => '1M',
            'Quino'   => '2M',
            'Cadlan'  => 'Lance',
            'Lago'    => '1M',
            'Pastos'  => '2M',
            'Braton'  => 'Lance',
            'Vence'   => '1M',
            'Masba'   => 'Lance',
            'Sholani' => '1M',
            'Ronza'   => '2M',
        ];

        $templates = [
            '1M' => [
                ['nom' => 'Rafales Tranchantes bokos', 'degats' => 156, 'type' => 'Physique', 'description' => "Utilisez des matériaux de Bokoblin les uns après les autres pour déclencher une série d'attaques rapides.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Rafales Tranchantes lézals', 'degats' => 168, 'type' => 'Physique', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour déclencher une série d'attaques rapides.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Rayons enflammés lézals', 'degats' => 60, 'type' => 'Feu', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour déclencher une série d'attaques rapides.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Rayons Glaciaux lézals', 'degats' => 60, 'type' => 'Glace', 'description' => "Utilisez des matériaux de bokoblin les uns après les autres pour déclencher une série d'attaques rapides.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Rayons électriques lézals', 'degats' => 60, 'type' => 'Électrique', 'description' => "Utilisez des matériaux de bokoblin les uns après les autres pour déclencher une série d'attaques rapides.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Pluie de coups gibdo', 'degats' => 88, 'type' => 'Physique', 'description' => "Utilisez des matériaux de Gibdo les uns après les autres pour déclencher une série d'attaques rapides.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Attaque Circulaire chef boko', 'degats' => 128, 'type' => 'Physique', 'description' => "Utilisez un matériau de Chef boko pour concentrer vos forces et lancer une attaque circulaire.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Lacération enflammée chef boko', 'degats' => 92, 'type' => 'Feu', 'description' => "Utilisez un matériau de Chef boko pour déclencher une attaque circulaire enflammée."],
                ['nom' => 'Lacération glaciale chef boko', 'degats' => 92, 'type' => 'Glace', 'description' => "Utilisez un matériau de Chef boko pour déclencher une attaque circulaire glaciale."],
                ['nom' => 'Lacération électrique chef boko', 'degats' => 92, 'type' => 'Électrique', 'description' => "Utilisez un matériau de Chef boko pour déclencher une attaque circulaire électrique."],
                ['nom' => 'Attaque Circulaire lynel', 'degats' => 154, 'type' => 'Physique', 'description' => "Utilisez un matériau de Lynel pour concentrer vos forces et lancer une attaque circulaire.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Lacération enflammée lynel', 'degats' => 104, 'type' => 'Feu', 'description' => "Utilisez un matériau de Lynel pour déclencher une attaque circulaire enflammée."],
                ['nom' => 'Lacération glaciale lynel', 'degats' => 104, 'type' => 'Glace', 'description' => "Utilisez un matériau de Lynel pour déclencher une attaque circulaire glaciale."],
                ['nom' => 'Lacération électrique lynel', 'degats' => 104, 'type' => 'Électrique', 'description' => "Utilisez un matériau de Lynel pour déclencher une attaque circulaire électrique."],
                ['nom' => 'Frappe moblin', 'degats' => 103, 'type' => 'Physique', 'description' => "Utilisez un matériau de Moblin pour concentrer vos forces et lancer une attaque circulaire.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Attaque enflammée moblin', 'degats' => 88, 'type' => 'Feu', 'description' => "Utilisez un matériau de Moblin pour déclencher une attaque circulaire enflammée."],
                ['nom' => 'Attaque glaciale moblin', 'degats' => 88, 'type' => 'Glace', 'description' => "Utilisez un matériau de Moblin pour déclencher une attaque circulaire glaciale."],
                ['nom' => 'Attaque électrique moblin', 'degats' => 88, 'type' => 'Électrique', 'description' => "Utilisez un matériau de Moblin pour déclencher une attaque circulaire électrique."],
                ['nom' => 'Broyage hinox', 'degats' => 135, 'type' => 'Physique', 'description' => "Utilisez un matériau d'Hinox pour concentrer vos forces et lancer une attaque circulaire.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Broyage enflammée hinox', 'degats' => 104, 'type' => 'Feu', 'description' => "Utilisez un matériau d'Hinox pour déclencher une attaque circulaire enflammée."],
                ['nom' => 'Broyage glacial hinox', 'degats' => 104, 'type' => 'Glace', 'description' => "Utilisez un matériau d'Hinox pour déclencher une attaque circulaire glaciale."],
                ['nom' => 'Broyage électrique hinox', 'degats' => 104, 'type' => 'Électrique', 'description' => "Utilisez un matériau d'Hinox pour déclencher une attaque circulaire électrique."],
                ['nom' => 'écrasement lithorok', 'degats' => 134, 'type' => 'Physique', 'description' => "Utilisez un matériau de Lithorok pour concentrer vos forces et lancer une attaque circulaire.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Attaque enflammée Magrok', 'degats' => 92, 'type' => 'Feu', 'description' => "Utilisez un matériau de Magrok pour déclencher une attaque circulaire enflammée."],
                ['nom' => 'Attaque glaciale givrok', 'degats' => 92, 'type' => 'Glace', 'description' => "Utilisez un matériau de Givrok pour déclencher une attaque circulaire glaciale."]
            ],

            '2M' => [
                ['nom' => 'Frénésie circulaire bokos', 'degats' => 156, 'type' => 'Physique', 'description' => "Utilisez des matériaux de Bokoblin les uns après les autres pour lancer une rapide attaque circulaire.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Frénésie circulaire lézals', 'degats' => 168, 'type' => 'Physique', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour lancer une rapide attaque circulaire.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Frénésie enflammés lézals', 'degats' => 60, 'type' => 'Feu', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour lancer une rapide attaque circulaire .\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Frénésie Glaciale lézals', 'degats' => 60, 'type' => 'Glace', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour lancer une rapide attaque circulaire.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Frénésie électrique lézals', 'degats' => 60, 'type' => 'Électrique', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour lancer une rapide attaque circulaire.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Pluie de coups gibdo', 'degats' => 88, 'type' => 'Physique', 'description' => "Utilisez des matériaux de Gibdo les uns après les autres pour lancer une rapide attaque circulaire.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Coup retombant chef boko', 'degats' => 128, 'type' => 'Physique', 'description' => "Utilisez un matériau de Chef boko pour concentrer vos forces et frapper un grand coup.\nPlus le matériau est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Lacération enflammée chef boko', 'degats' => 92, 'type' => 'Feu', 'description' => "Utilisez un matériau de Chef boko pour déclencher un grand coup enflammée."],
                ['nom' => 'Lacération glaciale chef boko', 'degats' => 92, 'type' => 'Glace', 'description' => "Utilisez un matériau de Chef boko pour déclencher un grand coup glacial."],
                ['nom' => 'Lacération électrique chef boko', 'degats' => 92, 'type' => 'Électrique', 'description' => "Utilisez un matériau de Chef boko pour déclencher un grand coup électrique."],
                ['nom' => 'Coup retombant lynel', 'degats' => 154, 'type' => 'Physique', 'description' => "Utilisez un matériau de Lynel pour concentrer vos forces et frapper un grand coup.\nPlus le matériau est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Lacération enflammée lynel', 'degats' => 104, 'type' => 'Feu', 'description' => "Utilisez un matériau de Lynel pour déclencher un grand coup enflammée."],
                ['nom' => 'Lacération glaciale lynel', 'degats' => 104, 'type' => 'Glace', 'description' => "Utilisez un matériau de Lynel pour déclencher un grand coup glacial."],
                ['nom' => 'Lacération électrique lynel', 'degats' => 104, 'type' => 'Électrique', 'description' => "Utilisez un matériau de Lynel pour déclencher un grand coup électrique."],
                ['nom' => 'Frappe moblin', 'degats' => 103, 'type' => 'Physique', 'description' => "Utilisez un matériau de Moblin pour concentrer vos forces et frapper un grand coup.\nPlus le matériau est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Attaque enflammée moblin', 'degats' => 88, 'type' => 'Feu', 'description' => "Utilisez un matériau de Moblin pour déclencher un grand coup enflammée."],
                ['nom' => 'Attaque glaciale moblin', 'degats' => 88, 'type' => 'Glace', 'description' => "Utilisez un matériau de Moblin pour déclencher un grand coup glacial."],
                ['nom' => 'Attaque électrique moblin', 'degats' => 88, 'type' => 'Électrique', 'description' => "Utilisez un matériau de Moblin pour déclencher un grand coup électrique."],
                ['nom' => 'Broyage hinox', 'degats' => 135, 'type' => 'Physique', 'description' => "Utilisez un matériau d'Hinox pour concentrer vos forces et frapper un grand coup.\nPlus le matériau est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Broyage enflammée hinox', 'degats' => 104, 'type' => 'Feu', 'description' => "Utilisez un matériau d'Hinox pour déclencher un grand coup enflammée."],
                ['nom' => 'Broyage glacial hinox', 'degats' => 104, 'type' => 'Glace', 'description' => "Utilisez un matériau d'Hinox pour déclencher un grand coup glacial."],
                ['nom' => 'Broyage électrique hinox', 'degats' => 104, 'type' => 'Électrique', 'description' => "Utilisez un matériau d'Hinox pour déclencher un grand coup électrique."],
                ['nom' => 'écrasement lithorok', 'degats' => 134, 'type' => 'Physique', 'description' => "Utilisez un matériau de Lithorok pour concentrer vos forces et frapper un grand coup.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Attaque enflammée Magrok', 'degats' => 92, 'type' => 'Feu', 'description' => "Utilisez un matériau de Magrok pour déclencher un grand coup enflammée."],
                ['nom' => 'Attaque glaciale givrok', 'degats' => 92, 'type' => 'Glace', 'description' => "Utilisez un matériau de Givrok pour déclencher un grand coup glacial."]
            ],

            'Lance' => [
                ['nom' => 'Enchainement d\'estoc boko', 'degats' => 156, 'type' => 'Physique', 'description' => "Utilisez des matériaux de Bokoblin les uns après les autres pour lancer de rapides coups d'estoc.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Echainement d\'estoc lézal', 'degats' => 168, 'type' => 'Physique', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour lancer de rapides coups d'estoc.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Enchainement enflammé lézal', 'degats' => 60, 'type' => 'Feu', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour lancer de rapides coups d'estoc.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Enchainement glacial lézal', 'degats' => 60, 'type' => 'Glace', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour lancer de rapides coups d'estoc.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Enchainement électrique lézal', 'degats' => 60, 'type' => 'Électrique', 'description' => "Utilisez des matériaux de lézalfos les uns après les autres pour lancer de rapides coups d'estoc.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Enchainement gibdo', 'degats' => 88, 'type' => 'Physique', 'description' => "Utilisez des matériaux de Gibdo les uns après les après les autres pour lancer de rapides coups d'estoc.\nPlus vous utilisez de matériaux, plus l'attaque dure longtemps"],
                ['nom' => 'Attaque étendue chef boko', 'degats' => 128, 'type' => 'Physique', 'description' => "Utilisez un matériau de Chef boko pour concentrer vos forces et balayer un grand coup.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Tranchage enflammée chef boko', 'degats' => 92, 'type' => 'Feu', 'description' => "Utilisez un matériau de Chef boko pour balayer un grand coup enflammée."],
                ['nom' => 'Tranchage glacial chef boko', 'degats' => 92, 'type' => 'Glace', 'description' => "Utilisez un matériau de Chef boko pour balayer un grand coup glaciale."],
                ['nom' => 'Tranchage électrique chef boko', 'degats' => 92, 'type' => 'Électrique', 'description' => "Utilisez un matériau de Chef boko pour balayer un grand coup électrique."],
                ['nom' => 'Attaque étendue lynel', 'degats' => 154, 'type' => 'Physique', 'description' => "Utilisez un matériau de Lynel pour concentrer vos forces et balayer un grand coup.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Tranchage enflammée lynel', 'degats' => 104, 'type' => 'Feu', 'description' => "Utilisez un matériau de Lynel pour balayer un grand coup enflammée."],
                ['nom' => 'Tranchage glacial lynel', 'degats' => 104, 'type' => 'Glace', 'description' => "Utilisez un matériau de Lynel pour balayer un grand coup   glaciale."],
                ['nom' => 'Tranchage électrique lynel', 'degats' => 104, 'type' => 'Électrique', 'description' => "Utilisez un matériau de Lynel pour balayer un grand coup électrique."],
                ['nom' => 'Frappe moblin', 'degats' => 103, 'type' => 'Physique', 'description' => "Utilisez un matériau de Moblin pour concentrer vos forces et balayer un grand coup.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Attaque enflammée moblin', 'degats' => 88, 'type' => 'Feu', 'description' => "Utilisez un matériau de Moblin pour balayer un grand coup enflammée."],
                ['nom' => 'Attaque glaciale moblin', 'degats' => 88, 'type' => 'Glace', 'description' => "Utilisez un matériau de Moblin pour balayer un grand coup glaciale."],
                ['nom' => 'Attaque électrique moblin', 'degats' => 88, 'type' => 'Électrique', 'description' => "Utilisez un matériau de Moblin pour balayer un grand coup électrique."],
                ['nom' => 'Broyage hinox', 'degats' => 135, 'type' => 'Physique', 'description' => "Utilisez un matériau d'Hinox pour concentrer vos forces et balayer un grand coup.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'éclat enflammée hinox', 'degats' => 104, 'type' => 'Feu', 'description' => "Utilisez un matériau d'Hinox pour balayer un grand coup enflammée."],
                ['nom' => 'éclat glacial hinox', 'degats' => 104, 'type' => 'Glace', 'description' => "Utilisez un matériau d'Hinox pour balayer un grand coup glaciale."],
                ['nom' => 'éclat électrique hinox', 'degats' => 104, 'type' => 'Électrique', 'description' => "Utilisez un matériau d'Hinox pour balayer un grand coup électrique."],
                ['nom' => 'écrasement lithorok', 'degats' => 134, 'type' => 'Physique', 'description' => "Utilisez un matériau de Lithorok pour concentrer vos forces et balayer un grand coup.\nPlus le matériaux est puissant, plus vous pourrez concentrer de forces"],
                ['nom' => 'Attaque enflammée Magrok', 'degats' => 104, 'type' => 'Feu', 'description' => "Utilisez un matériau de Magrok pour balayer un grand coup enflammée."],
                ['nom' => 'Attaque glaciale givrok', 'degats' => 104, 'type' => 'Glace', 'description' => "Utilisez un matériau de Givrok pour balayer un grand coup glaciale."]
            ],

            'Arc' => [
                ['nom' => 'Tir Soneau', 'degats' => 55, 'type' => 'Explosif', 'description' => "Décoche des flèches imprégnées d'énergie qui explosent au contact."]
            ]
        ];

        // 1. GESTION DU GOLEM CHEVALIER (TOUTES LES ATTAQUES)
        $golem = Personnage::where('nom', 'Chevalier Golem')->first();
        if ($golem) {
            foreach ($templates as $type => $attaques) {
                foreach ($attaques as $data) {
                    $this->saveAttaque($golem->id, $type, $data);
                }
            }
        }

        // 2. GESTION DES AUTRES PERSONNAGES
        foreach ($mappingArmes as $nom => $typeArme) {
            $p = Personnage::where('nom', $nom)->first();
            if ($p && isset($templates[$typeArme])) {
                foreach ($templates[$typeArme] as $data) {
                    $this->saveAttaque($p->id, $typeArme, $data);
                }
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