<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('personnage', function (Blueprint $table) {
        // Ajout de la clé étrangère vers la table combat_styles
        $table->foreignId('combat_style_id')
              ->nullable() // Permet d'avoir des personnages sans style défini au début
              ->constrained('combat_styles')
              ->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('personnage', function (Blueprint $table) {
        $table->dropForeign(['combat_style_id']);
        $table->dropColumn('combat_style_id');
    });
}
};
