<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Personnage;

class PersonnageModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_personnage_can_be_created_and_deleted()
    {
        $personnage = Personnage::create([
            'nom' => 'Link',
            'description' => 'Héros légendaire complet',
            'description_courte' => 'Héros légendaire',
            'arme_principale' => 'Épée',
        ]);

        $this->assertDatabaseHas('personnage', ['id' => $personnage->id]);

        $personnage->delete();

        $this->assertDatabaseMissing('personnage', ['id' => $personnage->id]);
    }
}
