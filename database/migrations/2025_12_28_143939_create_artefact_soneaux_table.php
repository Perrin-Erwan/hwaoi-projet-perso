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
        Schema::create('artefact_soneaux', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom de l'artéfact (ex: Turbine, Lance-flamme)
            $table->string('type')->nullable(); // Type (ex: Propulsion, Combat)
            
            // Clé étrangère pour lier l'artéfact à un personnage
            $table->foreignId('personnage_id')
                  ->constrained('personnages')
                  ->onDelete('cascade'); 
                  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Correction du nom de la table ici pour correspondre au up()
        Schema::dropIfExists('artefact_soneaux');
    }
};