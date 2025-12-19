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
        [
            'nom' => 'éruption de lumière',
            'meneur' => 'Zelda',
            'partenaire' => 'Agraston',
            'description' => 'Agraston canalise son énergie dans son arme tandis que Zelda attaque avec sa magie de lumière pour une éruption colossale.',
            'type' => 'special',
        ],
        [
            'nom' => 'Pluie de lumière',
            'meneur' => 'Zelda',
            'partenaire' => 'Qia',
            'description' => 'Qia utilise sa magie pour faire pleuvoir des bulles d\'eau pour que Zelda les explose avec un arc de lumière.',
            'type' => 'special',
        ],
        [
            'nom' => 'Tempête de lumière',
            'meneur' => 'Zelda',
            'partenaire' => 'Raphica',
            'description' => 'Raphica tournoie dans les airs en attaquant avec ses flèches tandis que zelda tournoie en dessous avec ses épées de lumière.',
            'type' => 'special',
        ],
        [
            'nom' => 'Orage de lumière',
            'meneur' => 'Zelda',
            'partenaire' => 'Ardi',
            'description' => 'Ardi utilise son pouvoir de foudre tandis que Zelda attaque avec sa magie de lumière pour créer un orage colossale.',
            'type' => 'special',
        ],
        [
            'nom' => 'Renvoie-Boomerang',
            'meneur' => 'Zelda',
            'partenaire' => 'Calamo',
            'description' => 'Calamo lance un boomerang magique tandis que Zelda le renvoie avec sa magie du temps.',
            'type' => 'special',
        ],
        [
            'nom' => 'Essence Soneaux',
            'meneur' => 'Rauru',
            'partenaire' => 'Mineru',
            'description' => 'Mineru duplique la lance de lumière tandis que Rauru les projette avec emprise.',
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