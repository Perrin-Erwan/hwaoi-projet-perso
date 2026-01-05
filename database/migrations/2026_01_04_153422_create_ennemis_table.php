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
    Schema::create('ennemis', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('categorie'); // Ex: Petit monstre, Élite, Boss
        $table->string('element')->nullable(); // Ex: Feu, Glace, Ombre
        $table->integer('points_de_vie');
        $table->text('description')->nullable();
        $table->string('butin')->nullable(); // Ce qu'ils lâchent à leur mort
        $table->string('image_path')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ennemis');
    }
};
