<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    User::factory()->create([
    'name' => 'Admin Hyrule',
    'email' => 'nawere61@gmail.com',
    'password' => Hash::make('assuprufa02.'),
    'is_admin' => true,
]);

        $this->call([
            CombatStyleSeeder::class, 
            PersonnageSeeder::class,
            ArmeSeeder::class, 
            TechniqueSeeder::class,
            ArtefactsSoneauxSeeder::class,
            PersonnageTechniqueSeeder::class, 
            PersonnageImagePathSeeder::class,
            AttaqueSynchroSeeder::class,
            AttaqueAmalgameesSeeder::class, 
            EnnemisSeeder::class,
        ]);
    }
}