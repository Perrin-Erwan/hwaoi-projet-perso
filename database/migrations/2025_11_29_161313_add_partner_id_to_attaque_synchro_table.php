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
    Schema::table('attaque_synchro', function (Blueprint $table) {
        $table->foreignId('partner_personnage_id') // Utilisez le nom que vous voulez VRAIMENT (ex: partenaire_id)
              ->nullable()
              ->constrained('personnage')
              ->onDelete('set null')
              ->after('personnage_id'); // Après la clé de l'attaquant
    });
}

public function down(): void
{
    Schema::table('attaque_synchro', function (Blueprint $table) {
        $table->dropForeign(['partner_personnage_id']);
        $table->dropColumn('partner_personnage_id');
    });
}
};
