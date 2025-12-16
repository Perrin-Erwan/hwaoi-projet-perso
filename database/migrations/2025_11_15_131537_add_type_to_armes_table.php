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
            $table->enum('type', ['Arme à une main', 'Arme à deux mains', 'Lance', 'Arc'])->after('nom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('armes', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
