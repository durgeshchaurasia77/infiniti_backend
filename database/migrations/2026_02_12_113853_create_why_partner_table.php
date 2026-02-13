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
        Schema::create('why_partner', function (Blueprint $table) {
            $table->id();
            $table->string('heading_one')->nullable();
            $table->text('short_description_one')->nullable();
            $table->string('heading_two')->nullable();
            $table->text('short_description_two')->nullable();
            $table->string('heading_three')->nullable();
            $table->text('short_description_three')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_partner');
    }
};
