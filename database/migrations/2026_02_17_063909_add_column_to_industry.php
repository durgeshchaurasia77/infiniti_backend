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
        Schema::table('industry', function (Blueprint $table) {
            $table->string('features_one')->nullable()->after('image');
            $table->string('features_two')->nullable()->after('features_one');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industry', function (Blueprint $table) {
            //
        });
    }
};
