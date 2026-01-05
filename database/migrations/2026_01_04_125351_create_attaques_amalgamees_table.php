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
    Schema::create('attaquesAmalgamees', function (Blueprint $table) {
        $table->id();
        $table->string('nom'); 
        $table->text('description');
        $table->integer('degats');
        $table->string('type'); // Élément (Feu, Glace...)
        $table->string('arme_requise'); // EX: '1M', '2M', 'Lance', 'Arc'
        
        $table->foreignId('personnage_id')->constrained('personnage')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attaques_amalgamees');
    }
};
