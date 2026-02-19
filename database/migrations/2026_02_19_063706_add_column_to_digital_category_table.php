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
        Schema::table('digital_category', function (Blueprint $table) {
            $table->string('banner_title')->nullable()->after('name');
            $table->string('banner_image')->nullable()->after('banner_title');
            $table->text('banner_description')->nullable()->after('banner_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('digital_category', function (Blueprint $table) {
            //
        });
    }
};
