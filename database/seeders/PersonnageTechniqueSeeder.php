<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personnage;
use App\Models\TechniqueIndividuelle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PersonnageTechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Définition du mapping Personnage => Techniques
        // Basé sur les données de votre TechniqueSeeder
        $personnageTechniques = [
            'Zelda' => [
                'Arc de lumière', 'Lumière transperçante', 'Double frappe temporelle', 'Riposte temporelle'
            ],
            'Rauru' => [
                'Lance de lumière-Choc céleste', 'Lance de lumière-forteresse', 'Lance de lumière-Impact zéro', 'emprise', 'Onde royale'
            ],
            'Mineru' => [
                'Lancement de golem', 'Tir sphérique', 'Batterie inépuisable', 'Riposte venteuse'
            ],
            'Agraston' => [
                'éruption colossale', 'Violente collision', 'Grande éruption', 'Pyrosphère'
            ],
            'Qia' => [
                'Torrents débordants', 'Aqualance transperçante', 'écume féroce', 'Tourbillon tournoyant'
            ],
            'Raphica' => [
                'Chute céleste', 'Botte de vent', 'Flèche à déflagration', 'Ouragan'
            ],
            'Ardi' => [
                'Coup de pied foudroyant', 'Charge tonitruante', 'Choc conducteur', 'Frappe fulgurante'
            ],
            'Chevalier Golem' => [
                'Attaque tournoyante (épée à une main)', 'Pleine puissance', 'Plongeon golem (épée à une main)', 'Coup de pied riposte (épée à deux mains)', 'Fouet aérien (épée à deux mains)', 'Coup riposte (lance)', 'Rafale tourbillonnante (lance)'
            ],
            'Calamo' => [
                'Rebond fongique', 'Charge de clarté', 'Fleur bombe'
            ],
            'Typhan' => [
                'Frénésie volante', 'Assaut bouclier' // L'élément corrigé de Typhan
            ],
            'Quino' => [
                'Lacération projetée', 'Assaut défensif'
            ],
            'Cadlan' => [
                'Déluge au sommet', 'Roue aquatique écrasante'
            ],
            'Lago' => [
                'Typhon affuté', 'Ressac'
            ],
            'Pastos' => [
                'Arrache-terre', 'Coup d\'estoc chargé'
            ],
            'Braton' => [
                'Coup de boule volant', 'Coup d\'estoc poussiéreux'
            ],
            'Vence' => [
                'Moulin à vent tranchant', 'choc en spirale'
            ],
            'Masba' => [
                'Tranche azur', 'élan aérien'
            ],
            'Sholani' => [
                'Valse à l\'épée', 'Bourrasque tournoyante'
            ],
            'Ronza' => [
                'Têmpête bondissante', 'Grande représailles'
            ]
        ];

        $this->command->info('Début du seeder pour les techniques apprises par les personnages...');

        // Nettoyer la table pivot et désactiver/réactiver les FK pour éviter l'erreur 1701
        Schema::disableForeignKeyConstraints();
        DB::table('personnage_technique_individuelle')->truncate();
        Schema::enableForeignKeyConstraints();

        // Parcourir les données et lier les relations
        foreach ($personnageTechniques as $personnageNom => $techniquesNoms) {
            $personnage = Personnage::where('nom', $personnageNom)->first();

            if ($personnage) {
                // Récupérer les IDs des techniques correspondantes
                $techniqueIDs = TechniqueIndividuelle::whereIn('nom', $techniquesNoms)
                                                    ->pluck('id');

                // Lier les techniques au personnage via la relation belongsToMany
                $personnage->techniques()->sync($techniqueIDs);
                
                $this->command->info("Liaison de " . count($techniqueIDs) . " techniques pour {$personnageNom} réussie.");
            } else {
                $this->command->error("Personnage '{$personnageNom}' non trouvé. Ignoré.");
            }
        }
        $this->command->info('Seed PersonnageTechnique terminé !');
    }
}