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
        Schema::table('armes', function (Blueprint $table) {
            // 🛑 MODIFIER la colonne pour qu'elle accepte NULL
            // change() est nécessaire pour modifier les attributs d'une colonne existante
            $table->unsignedBigInteger('personnage_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('armes', function (Blueprint $table) {
            // Optionnel : Revenir à NON NULL si désiré, mais attention aux données génériques
            $table->unsignedBigInteger('personnage_id')->nullable(false)->change();
        });
    }
};
