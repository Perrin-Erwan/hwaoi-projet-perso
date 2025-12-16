<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personnage_technique_individuelle', function (Blueprint $table) { 
            $table->id();
            
            $table->unsignedBigInteger('personnage_id');
            $table->unsignedBigInteger('technique_individuelle_id');

            $table->foreign('personnage_id', 'perso_ti_personnage_fk')
                ->references('id')->on('personnage')
                ->onDelete('cascade');

            $table->foreign('technique_individuelle_id', 'perso_ti_technique_fk') 
                ->references('id')->on('technique_individuelle') 
                ->onDelete('cascade');
            
            $table->timestamps();
            
            // CORRECTION DE L'ERREUR 1059: Nom court pour la contrainte d'unicité
            $table->unique(['personnage_id', 'technique_individuelle_id'], 'perso_ti_unique'); 
        });
    }

    public function down(): void
    {
        Schema::table('personnage_technique_individuelle', function (Blueprint $table) {
            // Suppression de la contrainte d'unicité
            $table->dropUnique('perso_ti_unique');
            
            // Suppression des clés étrangères
            $table->dropForeign('perso_ti_personnage_fk');
            $table->dropForeign('perso_ti_technique_fk');
        });
        
        Schema::dropIfExists('personnage_technique_individuelle');
    }
};