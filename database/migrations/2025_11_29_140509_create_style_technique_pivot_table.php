<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Table pivot liant CombatStyle et TechniqueIndividuelle
       Schema::create('style_technique', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            
            // 1. Clé étrangère Combat Style
            // Nous utilisons unsignedBigInteger pour garantir la compatibilité avec $table->id()
            $table->unsignedBigInteger('combat_style_id')->index();
            $table->foreign('combat_style_id')->references('id')->on('combat_styles')->onDelete('cascade');
            
            // 2. Clé étrangère Technique Individuelle (CORRECTION CLÉ EN MAIN)
            $table->unsignedBigInteger('technique_individuelle_id')->index(); // <= AJOUT CRITIQUE DE index()
            $table->foreign('technique_individuelle_id')->references('id')->on('technique_individuelle')->onDelete('cascade');
            
            // Le champ supplémentaire
            $table->unsignedSmallInteger('mastery_level')->default(1)->comment('Niveau de maîtrise requis'); 
            
            $table->timestamps();
            
            // Contrainte d'unicité
            $table->unique(['combat_style_id', 'technique_individuelle_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('style_technique');
    }
};