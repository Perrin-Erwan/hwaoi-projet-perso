<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Arme;

class ArmeModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_arme_can_be_created_and_updated()
    {
        $arme = Arme::create([
            'nom' => 'Épée de démon',
            'puissance_base' => 25,
            'type' => 'Arme à une main',
        ]);

        $this->assertDatabaseHas('armes', ['id' => $arme->id, 'puissance_base' => 25]);

        $arme->update(['puissance_base' => 30]);

        $this->assertDatabaseHas('armes', ['id' => $arme->id, 'puissance_base' => 30]);
    }
}
