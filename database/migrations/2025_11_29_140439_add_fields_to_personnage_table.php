<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('personnage', function (Blueprint $table) {
            // Clé étrangère pour le CombatStyle
            $table->foreignId('classe_id')
                  ->nullable()
                  ->constrained('combat_styles') // Fait référence à la nouvelle table
                  ->onDelete('set null')
                  ->after('element');
            
            // Champ JSON pour les bonus permanents (PV, ATK, etc.)
            // IMPORTANT : Utiliser JSON pour stocker des structures de données complexes.
            $table->json('bonus_permanents')->nullable()->after('classe_id');
        });
    }

    public function down(): void
    {
        Schema::table('personnage', function (Blueprint $table) {
            $table->dropForeign(['classe_id']);
            $table->dropColumn('classe_id');
            $table->dropColumn('bonus_permanents');
        });
    }
};
