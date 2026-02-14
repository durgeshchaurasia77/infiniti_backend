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
        Schema::create('our_process', function (Blueprint $table) {
            $table->id();
            $table->string('title_header_one')->nullable();
            $table->string('title_step_one')->nullable();
            $table->string('image_step_one')->nullable();
            $table->text('short_description_step_one')->nullable();
            $table->string('title_step_two')->nullable();
            $table->string('image_step_two')->nullable();
            $table->text('short_description_step_two')->nullable();
            $table->string('title_step_three')->nullable();
            $table->string('image_step_three')->nullable();
            $table->text('short_description_step_three')->nullable();
            $table->string('title_header_two')->nullable();
            $table->string('short_description_two')->nullable();
            $table->string('title_step_four')->nullable();
            $table->string('image_step_four')->nullable();
            $table->text('short_description_step_four')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_process');
    }
};
