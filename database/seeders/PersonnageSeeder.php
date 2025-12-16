<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personnage;
use Illuminate\Support\Facades\Schema;
class PersonnageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Personnage::truncate();
        Schema::enableForeignKeyConstraints();

        Personnage::create([
        'nom' => 'Zelda',
        'alias' => 'La sage du temps',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'Descendante des premiers rois et Reine d\'Hyrule.',
        'element' => 'Lumière et temps'
    ]);

    Personnage::create([
        'nom' => 'Rauru',
        'alias' => 'Le roi d\'hyrule',
        'coeurs_base' => 35,
        'arme_principale' => 'Lance',
        'description' => 'Le premier roi d\'Hyrule et fondateur de ce même royaume.',
        'element' => 'Lumière'
    ]);

    Personnage::create([
        'nom' => 'Mineru',
        'alias' => 'La 5ème sage',
        'coeurs_base' => 35,
        'arme_principale' => 'Sceptre',
        'description' => 'La grande soeur de Rauru',
        'element' => 'Esprit'
    ]);

    Personnage::create([
        'nom' => 'Qia',
        'alias' => 'La reine des Zoras',
        'coeurs_base' => 35,
        'arme_principale' => 'Lance',
        'description' => 'La reine des zoras et la première sage de l\'eau.',
        'element' => 'Eau'
    ]);

    Personnage::create([
        'nom' => 'Agraston',
        'alias' => 'Le chef des gorons',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'Le chef des Gorons et le premier sage du feu.',
        'element' => 'Feu'
    ]);

    Personnage::create([
        'nom' => 'Raphica',
        'alias' => 'Le chef des Piafs',
        'coeurs_base' => 35,
        'arme_principale' => 'Arc',
        'description' => 'Le chef des Piafs et le premier sage du vent.',
        'element' => 'Vent'
    ]);

    Personnage::create([
        'nom' => 'Ardi',
        'alias' => 'La chef des Gerudos',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée et bouclier',
        'description' => 'La cheffe des Gerudos et la première sage de la foudre.',
        'element' => 'Foudre'
    ]);

    Personnage::create([
        'nom' => 'Chevalier Golem',
        'alias' => 'Le gardien antique',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'Un chevalier golem antique protegeant hyrule.',
        'element' => 'multi-éléments'
    ]);

    Personnage::create([
        'nom' => 'Calamo',
        'alias' => 'Le korogu pérégrin',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'Un korogu qui cherche à s\'enraciner.',
        'element' => 'Multi-éléments'
    ]);

    Personnage::create([
        'nom' => 'Typhan',
        'alias' => 'Guerrier d\'hyrule',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée et bouclier',
        'description' => 'Chevalier vétéran protegeant hyrule.',
        'element' => 'Lumière'
    ]);

    Personnage::create([
        'nom' => 'Quino',
        'alias' => 'Guerrier d\'hyrule',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'Jeune chevalier ayant un sens de la justice incroyable.',
        'element' => 'Ténèbres'
    ]);

    Personnage::create([
        'nom' => 'Cadlan',
        'alias' => 'Chevalier zora',
        'coeurs_base' => 35,
        'arme_principale' => 'Lance',
        'description' => 'Chevalier zora essayant d\'être le protecteur de la nouvelle reine.',
        'element' => 'Eau'
    ]);

    Personnage::create([
        'nom' => 'Lago',
        'alias' => 'Chevalier vétéran zora',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'Le chevalier protecteur du défunt roi.',
        'element' => 'Eau'
    ]);

     Personnage::create([
        'nom' => 'Pastos',
        'alias' => 'Guerrier goron',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'Le chef d\'une autre tribu goron.',
        'element' => 'Feu'
    ]);

     Personnage::create([
        'nom' => 'Braton',
        'alias' => 'Guerrier goron',
        'coeurs_base' => 35,
        'arme_principale' => 'Lance',
        'description' => 'Un soldat goron qui adore manger.',
        'element' => 'Feu'
    ]);

     Personnage::create([
        'nom' => 'Vence',
        'alias' => 'Guerrier piaf',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'Le guerrier et ami du chef piaf.',
        'element' => 'vent'
    ]);

     Personnage::create([
        'nom' => 'Masba',
        'alias' => 'Chevalier vétéran piaf',
        'coeurs_base' => 35,
        'arme_principale' => 'Lance',
        'description' => 'Le conseiller du chef Piaf.',
        'element' => 'Vent'
    ]);

     Personnage::create([
        'nom' => 'Sholani',
        'alias' => 'Guerrier gerudo',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'La chevalier et admiratrice de la chef.',
        'element' => 'Vent'
    ]);

     Personnage::create([
        'nom' => 'Ronza',
        'alias' => 'Guerrier gerudo',
        'coeurs_base' => 35,
        'arme_principale' => 'Épée',
        'description' => 'La chef d\'une autre tribu gerudo.',
        'element' => 'Ténèbres'
    ]);
    }
}
