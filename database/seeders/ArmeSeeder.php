<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Arme;
use App\Models\Personnage;

class ArmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vider la table avant d'insérer les nouvelles données
        Arme::truncate();

        // 1. Récupération des personnages pour les liaisons (Mapping)
        $personnages = Personnage::all()->keyBy('nom');

        // Fonction utilitaire pour obtenir l'ID si le personnage existe
        $getId = function (string $nom) use ($personnages) {
            return $personnages->get($nom)->id ?? null;
        };
        
        // --- 2. DÉFINITION DE TOUTES LES ARMES ---
        
        $armes = [
            
            // --- ARMES UNIQUES (1:1) ---
            [
                'nom' => 'Épée de lumière', 
                'type' => 'Arme à une main', 
                'personnage_nom' => 'Zelda',
                'puissance_base' => 98, // Valeur par défaut
                'element' => 'Lumière', // Élément donné
            ],
            [
                'nom' => 'Lance de lumière', 
                'type' => 'Lance', 
                'personnage_nom' => 'Rauru',
                'puissance_base' => 88,
                'element' => 'Lumière', // Élément donné
            ],
            [
                'nom' => 'Sceptre royal', 
                'type' => 'Arme à une main', 
                'personnage_nom' => 'Mineru',
                'puissance_base' => 98,
            ],
            [
                'nom' => 'Brise-montagne', 
                'type' => 'Arme à deux mains', 
                'personnage_nom' => 'Agraston',
                'puissance_base' => 40,
            ],
            [
                'nom' => 'Lance d\'écailles radieuse', 
                'type' => 'Lance', 
                'personnage_nom' => 'Qia',
                'puissance_base' => 30,
            ],
            [
                'nom' => 'Arc de l\'aigle', 
                'type' => 'Arc', 
                'personnage_nom' => 'Raphica',
                'puissance_base' => 30,
            ],
            [
                'nom' => 'Cimeterre des sept joyaux', 
                'type' => 'Arme à une main', 
                'personnage_nom' => 'Ardi',
                'puissance_base' => 30,
            ],
            [
                'nom' => 'Épée de vagabond', 
                'type' => 'Arme à une main', 
                'personnage_nom' => 'Calamo',
                'puissance_base' => 25,
            ],
            
            // --- ARMES UNIQUES PARTAGÉES (Traitées comme des entrées multiples) ---
            
            // Épée de garde d'élite (1M) - Chevalier Golem, Typhan, Lago, Vence, Sholani
            'Épée de garde d\'élite' => [
                'type' => 'Arme à une main',
                'puissance_base' => 45,
                'personnages' => ['Chevalier Golem', 'Typhan', 'Lago', 'Vence', 'Sholani'],
            ],

            'Épée maudite' => [
                'type' => 'Arme à une main',
                'puissance_base' => 78,
                'personnages' => ['Chevalier Golem', 'Typhan', 'Lago', 'Vence', 'Sholani'],
            ],

            // Espadon de garde d'élite (2M) - Chevalier Golem, Quino, Pastos, Ronza
            'Espadon de garde d\'élite' => [
                'type' => 'Arme à deux mains',
                'puissance_base' => 50,
                'personnages' => ['Chevalier Golem', 'Quino', 'Pastos', 'Ronza'],
            ],
            'Espadon de lumière' => [
                'type' => 'Arme à deux mains',
                'puissance_base' => 108,
                'personnages' => ['Chevalier Golem', 'Quino', 'Pastos', 'Ronza'],
            ],

            'Lance de garde d\'élite' => [
                'type' => 'Lance',
                'puissance_base' => 22,
                'personnages' => ['Chevalier Golem', 'Cadlan', 'Masba', 'Braton'],
            ],

            // --- ARMES GÉNÉRIQUES (personnage_id = null) ---
            
            // Armes à une main (1M)
            ['nom' => 'Épée de soldat', 'type' => 'Arme à une main'],
            ['nom' => 'Épée zora', 'type' => 'Arme à une main'],
            ['nom' => 'Épée remige', 'type' => 'Arme à une main'],
            ['nom' => 'Cimeterre gerudo', 'type' => 'Arme à une main'],
            ['nom' => 'Épée de sonium', 'type' => 'Arme à une main'],
            ['nom' => 'Louche', 'type' => 'Arme à une main'],
            ['nom' => 'Bâton', 'type' => 'Arme à une main'],
            ['nom' => 'Bâton solide', 'type' => 'Arme à une main'],
            ['nom' => 'Os de bokoblin', 'type' => 'Arme à une main'],
            ['nom' => 'Épée de sonium robuste', 'type' => 'Arme à une main'],
            ['nom' => 'Épée des sylvains', 'type' => 'Arme à une main'],
            ['nom' => 'Bâton noueux', 'type' => 'Arme à une main'],
            ['nom' => 'Épée de garde', 'type' => 'Arme à une main'],
            ['nom' => 'Sabre des sylvains', 'type' => 'Arme à une main'],
            ['nom' => 'Cimeterre du clair de lune', 'type' => 'Arme à une main'],
            ['nom' => 'Épée de soldat émérite', 'type' => 'Arme à une main'],
            ['nom' => 'Épée de sonium surpuissante', 'type' => 'Arme à une main'],

            // Armes à deux mains (2M)
            ['nom' => 'Espadon de soldat', 'type' => 'Arme à deux mains'],
            ['nom' => 'Casse-pierre', 'type' => 'Arme à deux mains'],
            ['nom' => 'Espadon gerudo', 'type' => 'Arme à deux mains'],
            ['nom' => 'Longue épée zora', 'type' => 'Arme à deux mains'],
            ['nom' => 'Espadon de sonium', 'type' => 'Arme à deux mains'],
            ['nom' => 'Gourdin', 'type' => 'Arme à deux mains'],
            ['nom' => 'Gourdin solide', 'type' => 'Arme à deux mains'],
            ['nom' => 'Os de moblin', 'type' => 'Arme à deux mains'],
            ['nom' => 'Espadon de sonium robuste', 'type' => 'Arme à deux mains'],
            ['nom' => 'Espadon des sylvains', 'type' => 'Arme à deux mains'],
            ['nom' => 'Gourdin noueux', 'type' => 'Arme à deux mains'],
            ['nom' => 'Espadon de garde', 'type' => 'Arme à deux mains'],
            ['nom' => 'Brise-roc', 'type' => 'Arme à deux mains'],
            ['nom' => 'Espadon de soldat émérite', 'type' => 'Arme à deux mains'],
            ['nom' => 'Espadon de sonium surpuissant', 'type' => 'Arme à deux mains'],
            
            
            // Lances (L)
            ['nom' => 'Masse perforatrice', 'type' => 'Lance'],
            ['nom' => 'Lance zora', 'type' => 'Lance'],
            ['nom' => 'Lance de soldat', 'type' => 'Lance'],
            ['nom' => 'Lance rémige', 'type' => 'Lance'],
            ['nom' => 'Trident gerudo', 'type' => 'Lance'],
            ['nom' => 'Lance de sonium', 'type' => 'Lance'],
            ['nom' => 'Long Bâton', 'type' => 'Lance'],
            ['nom' => 'Long Bâton solide', 'type' => 'Lance'],
            ['nom' => 'Lance de sonium robuste', 'type' => 'Lance'],
            ['nom' => 'Lance des sylvains', 'type' => 'Lance'],
            ['nom' => 'Long bâton noueux', 'type' => 'Lance'],
            ['nom' => 'Lance de garde', 'type' => 'Lance'],
            ['nom' => 'Lance d\'écailles', 'type' => 'Lance'],
            ['nom' => 'Lance de soldat émérite', 'type' => 'Lance'],
            ['nom' => 'Lance de sonium surpuissante', 'type' => 'Lance'],
        ];

        // --- 3. LOGIQUE D'INSERTION ---
        
        foreach ($armes as $key => $data) {
            
            // Cas des armes partagées (elles ont une clé textuelle et un tableau 'personnages')
            if (is_string($key) && isset($data['personnages'])) {
                $nom_arme = $key;
                
                foreach ($data['personnages'] as $personnage_nom) {
                    // Crée une entrée d'arme pour chaque personnage
                    $personnage_id = $getId($personnage_nom);
                    if ($personnage_id) {
                        Arme::create([
                            'nom' => $nom_arme,
                            'type' => $data['type'],
                            'puissance_base' => $data['puissance_base'] ?? 10, // Puissance par défaut si non spécifiée
                            'element' => $data['element'] ?? null,
                            'personnage_id' => $personnage_id,
                        ]);
                    }
                }
            } 
            // Cas des armes uniques et génériques (elles ont un index numérique)
            else {
                $personnage_id = null;
                
                // Si c'est une arme unique 1:1, on trouve l'ID du personnage
                if (isset($data['personnage_nom'])) {
                    $personnage_id = $getId($data['personnage_nom']);
                }
                
                // Crée l'entrée d'arme
                Arme::create([
                    'nom' => $data['nom'],
                    'type' => $data['type'],
                    'puissance_base' => $data['puissance_base'] ?? 10, // Puissance par défaut
                    'element' => $data['element'] ?? null,
                    'personnage_id' => $personnage_id,
                ]);
            }
        }
    }
}