<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personnage;
use App\Models\AttaqueSynchro;

class AttaqueSynchroSeeder extends Seeder
{
    public function run(): void
{
    $attaques = [
        [
            'nom' => 'Descendance Sacrée',
            'meneur' => 'Zelda',
            'partenaire' => 'Rauru',
            'description' => 'Rauru et Zelda attaquent main contre main avec un rayon de lumière surpuissant.',
            'type' => 'special',
        ],
        [
            'nom' => 'Titan de Lumière',
            'meneur' => 'Zelda',
            'partenaire' => 'Mineru',
            'description' => 'Mineru contrôle un golem tandis que Zelda renforce celui-ci avec sa magie de lumière.',
            'type' => 'special',
        ],
    ];

    foreach ($attaques as $data) {
        $meneur = Personnage::where('nom', $data['meneur'])->first();
        $partenaire = Personnage::where('nom', $data['partenaire'])->first();

        if ($meneur && $partenaire) {
            // Utilisation de updateOrCreate pour éviter les doublons
            AttaqueSynchro::updateOrCreate(
                [
                    'nom' => $data['nom'],
                    'personnage_id' => $meneur->id,
                    'partenaire' => $partenaire->id, // On stocke l'ID ici
                ],
                [
                    'description' => $data['description'],
                    'type' => $data['type'],
                ]
            );
        }
    }
}
}