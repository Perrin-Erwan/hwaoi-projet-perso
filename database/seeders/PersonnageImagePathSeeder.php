<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personnage;

class PersonnageImagePathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tableau de tous les personnages pour s'assurer d'avoir l'ordre correct et les noms exacts
        $personnages = [
            'Zelda', 'Rauru', 'Mineru', 'Agraston', 'Qia', 'Raphica', 
            'Ardi', 'Chevalier Golem', 'Calamo', 'Typhan', 'Quino', 
            'Cadlan', 'Lago', 'Pastos', 'Braton', 'Vence', 'Masba', 
            'Sholani', 'Ronza'
        ];

        foreach ($personnages as $nom) {
            
            // 1. Déduire le nom du fichier image à partir du nom du personnage
            // Exemples : 
            // - "Zelda" devient "zelda.jpg"
            // - "Golem chevalier" devient "golem_chevalier.jpg"
            $imageFileName = strtolower(str_replace(' ', '_', $nom)) . '.jpg';
            
            // 2. Trouver le personnage et mettre à jour le chemin
            $personnage = Personnage::where('nom', $nom)->first();
            
            if ($personnage) {
                $personnage->image_path = $imageFileName;
                $personnage->save();
                $this->command->info("Image pour '{$nom}' mise à jour : {$imageFileName}");
            } else {
                $this->command->warn("Personnage non trouvé : '{$nom}'. Sauter la mise à jour.");
            }
        }

        $this->command->info('Mise à jour des chemins d\'image terminée !');
    }
}