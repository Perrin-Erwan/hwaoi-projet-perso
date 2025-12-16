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
        Schema::create('technique_individuelle', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            // Ajoutez ici les autres colonnes comme 'dégâts', si elles n'ont pas été ajoutées ailleurs
            $table->integer('dégâts')->nullable(); 
            // Lien vers le personnage (si la technique est spécifique à un personnage)
            $table->foreignId('personnage_id')->nullable()->constrained('personnage')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technique_individuelle');
    }
};
