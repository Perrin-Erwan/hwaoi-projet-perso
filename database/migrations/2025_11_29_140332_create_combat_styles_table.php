<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('combat_styles', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->string('type'); // Ex: Épée, Lance, Magie
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('combat_styles');
    }
};