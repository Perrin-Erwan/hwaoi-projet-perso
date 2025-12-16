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
        Schema::table('personnage', function (Blueprint $table) {
            $table->string('description_courte', 255)->nullable()->after('alias');
            $table->string('role', 255)->nullable()->after('description_courte');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personnage', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('description_courte');
        });
    }
};
