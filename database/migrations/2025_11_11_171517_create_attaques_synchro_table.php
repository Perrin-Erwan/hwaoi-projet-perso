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
        Schema::create('attaque_synchro', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->string('partenaire'); // Pour identifier le partenaire requis

            // Relation avec le personnage principal
            $table->unsignedBigInteger('personnage_id'); 
            $table->foreign('personnage_id')->references('id')->on('personnage')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attaque_synchro');
    }
};
