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
        Schema::table('setting', function (Blueprint $table) {
            $table->string('office_map_image_one')->nullable()->after('multiple_address');
            $table->string('office_map_image_two')->nullable()->after('office_map_image_one');
            $table->string('office_about')->nullable()->after('office_map_image_two');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setting', function (Blueprint $table) {
            //
        });
    }
};
