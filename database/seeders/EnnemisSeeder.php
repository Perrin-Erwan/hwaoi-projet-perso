<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Ennemi;

class EnnemisSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Ennemi::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $soldats = [
            'Bokoblin', 'Lézalfos', 'Rakuda', 'Chauve-souris', 'Chauve-souris de feu', 
            'Chauve-souris de glace', 'Chauve-souris de foudre', 'Minitracien', 'Tronc-peur', 
            'Gibdo', 'Golem soldat', 'Golem Sergent', 'Golem caporal', 'Golem major', 
            'Affre', 'Chuchu', 'Chuchu de feu', 'Chuchu de Glace', 'Chuchu électrique', 
            'Octorok', 'Octoneige', 'Octopierre', 'Octoflot', 'Octofourré', 
            'Tilhorok', 'Givrok', 'Migrok', 'Trogloblin', 'Trogloblin bleu', 
            'Trogloblin noir', 'Trogloblin argent',
        ];

        $miniBoss = [
            'Rakuda de feu', 'Rakuda de glace', 'Rakuda de foudre', 'Moblin', 'Moblin bleu', 
            'Moblin noir', 'Moblin argent', 'Moblin de feu', 'Moblin de glace', 'Moblin de foudre', 
            'Moblin de vase', 'Like de vase', 'Chef Boko', 'Chef Boko bleu', 'Chef Boko noir', 
            'Chef Boko argent', 'Chef Boko de feu', 'Chef Boko de glace', 'Chef Boko de foudre', 
            'Golem capitaine', 'Golem lieutenant', 'Golem commandant', 'Golem colonel'
        ];

        $boss = [
            'Hinox', 'Hinox bleu', 'Hinox noir', 'Hinox de feu', 'Hinox de glace', 'Hinox de foudre', 
            'Lynel', 'Lynel bleu', 'Lynel noir', 'Lynel d’argent', 'Lynel de feu', 'Lynel de foudre', 
            'Lynel de glace', 'Lithorok', 'Magrok', 'Givrok', 'Golemax', 'Golemax amélioré', 
            'Golemax ultime', 'Gigatracien', 'Gigatracien anthracite', 'Gigatracien opalin', 
            'Griock de glace', 'Roi Griock','Moldarquor', 'Angania', 'Miasgohma', 'Miasocto', 'Miasgibdo', 
            'Miasgayla', 'Fantôme de Ganon', 'Ganondorf', 'Golem maudit'
        ];

        foreach ($soldats as $nom) {
            Ennemi::create([
                'nom' => $nom,
                'categorie' => 'Soldat',
                'points_de_vie' => 100,
                'butin' => $this->genererButin($nom),
                'description' => "Un soldat de base de l'armée ennemie."
            ]);
        }

        foreach ($miniBoss as $nom) {
            Ennemi::create([
                'nom' => $nom,
                'categorie' => 'Mini-boss',
                'points_de_vie' => 800,
                'butin' => $this->genererButin($nom),
                'description' => "Un officier ennemi puissant ou une créature imposante."
            ]);
        }

        foreach ($boss as $nom) {
            Ennemi::create([
                'nom' => $nom,
                'categorie' => 'Boss',
                'points_de_vie' => 5000,
                'butin' => $this->genererButin($nom),
                'description' => "Une menace colossale exigeant une stratégie particulière."
            ]);
        }

        $this->command->info('Le bestiaire a été rempli avec succès !');
    }

    private function genererButin($nom)
    {
        $n = strtolower($nom);
        $butin = [];

        // --- GESTION ÉLÉMENTAIRE ---
        $isFeu = str_contains($n, 'feu') || str_contains($n, 'magrok');
        $isGlace = str_contains($n, 'glace') || str_contains($n, 'givrok') || str_contains($n, 'neige');
        $isFoudre = str_contains($n, 'foudre') || str_contains($n, 'électrique');
        $isVase = str_contains($n, 'vase');

        // --- BUTINS PAR FAMILLE ---
        if (str_contains($n, 'chef boko')) {
            $butin = ["Corne de Chef Boko", "Croc de Chef Boko", "Viscère de Chef Boko"];
        } elseif (str_contains($n, 'bokoblin')) {
            $butin = ["Corne de Bokoblin", "Croc de bokoblin", "Viscère de bokoblin"];
        } elseif (str_contains($n, 'trogloblin')) {
            $butin = ["Corne de Trogloblin", "Ongle de monstre"];
        } elseif (str_contains($n, 'lézalfos')) {
            $typeLéz = $isFeu ? "de feu" : ($isGlace ? "de glace" : ($isFoudre ? "électrique" : ""));
            $butin = ["Corne de Lézalfos $typeLéz", "Queue de Lézalfos $typeLéz", "Griffe de Lézalfos"];
        } elseif (str_contains($n, 'moblin')) {
            $butin = ["Corne de Moblin", "Croc de Moblin", "Viscère de Moblin"];
        } elseif (str_contains($n, 'chauve-souris')) {
            $typeAile = $isFeu ? " de feu" : ($isGlace ? " de glace" : ($isFoudre ? " de foudre" : ""));
            $butin = ["Aile de chauve-souris$typeAile", "Œil de chauve-souris"];
        } elseif (str_contains($n, 'chuchu')) {
            $typeGelee = $isFeu ? "Rouge" : ($isGlace ? "Blanche" : ($isFoudre ? "Jaune" : "Bleue"));
            $butin = ["Gelée Chuchu $typeGelee"];
        } elseif (str_contains($n, 'octorok') || str_contains($n, 'octo')) {
            $butin = ["Baudruche Octorok", "Tentacule Octorok", "Œil d'Octorok"];
        } elseif (str_contains($n, 'golem')) {
            $butin = ["Corne de Golem"];
        } elseif (str_contains($n, 'hinox')) {
            $butin = ["Corne d'Hinox", "Ongle d'Hinox", "Dent d'Hinox", "Viscère d'Hinox"];
        } elseif (str_contains($n, 'lynel')) {
            $butin = ["Sabot de Lynel", "Corne de Lynel", "Viscère de Lynel"];
        } elseif (str_contains($n, 'gibdo')) {
            $butin = ["Aile de Gibdo", "Côtes de Gibdo", "Viscère de Gibdo"];
        } elseif (str_contains($n, 'lithorok') || str_contains($n, 'rok')) {
            $coeur = $isFeu ? "Magma" : ($isGlace ? "Frimas" : "Lithorok");
            $butin = ["Cœur de $coeur", "Ambre brut", "Opale"];
        } elseif (str_contains($n, 'moldarquor')) {
            $butin = ["Aileron de Moldarquor", "Mâchoire de Moldarquor", "Viscère de Moldarquor"];
        } elseif (str_contains($n, 'griock')) {
            $butin = ["Aile de Griock", "Corne de Griock"];
        } elseif (str_contains($n, 'gigatracien')) {
            $butin = ["Dent de Gigatracien", "Ongle de Gigatracien", "Cristal d'énergie Soneau"];
        } elseif (str_contains($n, 'golemax')) {
            if (str_contains($n, 'ultime')) $butin = ["Noyau de Golemax ultime"];
            elseif (str_contains($n, 'amélioré')) $butin = ["Noyau de Golemax amélioré"];
            else $butin = ["Noyau de Golemax"];
        } elseif (str_contains($n, 'ganon')) {
            $butin = ["Matériau des ténèbres", "Arme spectrale"];
        } else {
            $butin = ["Matériau de monstre rare"];
        }

        return implode(", ", $butin);
    }
}