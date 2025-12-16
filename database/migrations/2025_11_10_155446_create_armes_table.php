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
        Schema::create('armes', function (Blueprint $table) {
            $table->id();
           $table->string('nom'); 
        $table->integer('puissance_base')->default(0); 
        $table->string('element')->nullable();
        
        // CRÉATION DE LA CLÉ ÉTRANGÈRE :
       
        $table->unsignedBigInteger('personnage_id'); // Assure un type BIGINT UNSIGNED, compatible avec $table->id()
        $table->foreign('personnage_id')            // Déclare la clé étrangère
              ->references('id')                   // Fait référence à la colonne 'id'
              ->on('personnage')                  // De la table 'personnages'
              ->onDelete('cascade');
              
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armes');
    }
};
