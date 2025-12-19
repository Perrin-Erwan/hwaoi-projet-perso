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
            'nom' => 'Éruption de lumière',
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
        [
            'nom' => 'Avatar de Lumière',
            'meneur' => 'Chevalier Golem',
            'partenaire' => 'Zelda',
            'description' => 'Zelda renforce le Golem avec sa magie de lumière pour un court instant, les combos sont dévastatrices.',
            'type' => 'special',
        ],
        [
            'nom' => 'Lame de Lumière',
            'meneur' => 'Zelda',
            'partenaire' => 'Chevalier Golem',
            'description' => 'Zelda envoie 5 lames de lumière avant de renforcer l\'arme du golem pour un choc lumineux.',
            'type' => 'special',
        ],
        [
            'nom' => 'Ruée enflammée',
            'meneur' => 'Chevalier Golem',
            'partenaire' => 'Rauru',
            'description' => 'Le golem chevalier charge sur les ennemis avec des lances-flammes tout en étant maintenu grâce à emprise de Rauru.',
            'type' => 'special',
        ],
        [
            'nom' => 'Explosion Soneaux',
            'meneur' => 'Chevalier Golem',
            'partenaire' => 'Mineru',
            'description' => 'Mineru duplique plusieurs armes explosives tout en le collant au golem chevalier avant une explosion en chaine.',
            'type' => 'special',
        ],
        [
            'nom' => 'Boulet vivant',
            'meneur' => 'Chevalier Golem',
            'partenaire' => 'Agraston',
            'description' => 'Le golem chevalier se met en mode vol pour lancer Agraston sur les ennemis.',
            'type' => 'special',
        ],
        [
            'nom' => 'Pluie glacial',
            'meneur' => 'Chevalier Golem',
            'partenaire' => 'Qia',
            'description' => 'Qia utilise sa magie aquatique pour faire tomber des gouttes d\'eau 
            pour que le golem chevalier les congèle avec les artéfacts glaciales.',
            'type' => 'special',
        ],
         [
            'nom' => 'Tornade infernale',
            'meneur' => 'Chevalier Golem',
            'partenaire' => 'Raphica',
            'description' => 'Raphica projette une grosse tornade avant que le golem utilise les artéfacts de vent pour propulser les ennemis.',
            'type' => 'special',
        ],
         [
            'nom' => 'Foudre divine',
            'meneur' => 'Chevalier Golem',
            'partenaire' => 'Ardi',
            'description' => 'Ardi emmagasine la foudre avant que le golem chevalier l\'utilise pour un coup de foudre surpuissant.',
            'type' => 'special',
        ],
        [
            'nom' => 'Projectiles élémentaires',
            'meneur' => 'Chevalier Golem',
            'partenaire' => 'Calamo',
            'description' =>    'Le golem chevalier change de forme 
                                pour attaquer dans les airs avec Calamo sur le dos pour envoyer plusieurs projectiles différents.',
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