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
        $table->string('nom');
        $table->text('description')->nullable(); // Ajouté pour stocker le texte du Seeder
        $table->integer('effet')->default(0);    // Ajouté pour stocker la valeur numérique
        $table->string('type')->nullable(); 
        
        $table->foreignId('personnage_id')
              ->constrained('personnage')
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