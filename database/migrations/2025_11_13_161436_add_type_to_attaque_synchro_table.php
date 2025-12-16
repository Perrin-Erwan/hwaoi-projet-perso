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
        Schema::table('attaque_synchro', function (Blueprint $table) {
            $table->enum('type', ['Normal', 'Special'])->default('Normal')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attaque_synchro', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
