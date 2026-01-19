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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('short_description')->nullable();
            $table->string('experience')->nullable();
            $table->string('countries')->nullable();
            $table->string('delivered')->nullable();
            $table->string('enthusiasts')->nullable();
            $table->string('image')->nullable();
            $table->string('human_centric_title')->nullable();
            $table->string('human_centric_description')->nullable();
            $table->string('exceptional_expertis_title')->nullable();
            $table->string('exceptional_expertise_description')->nullable();
            $table->string('end_to_end_support_title')->nullable();
            $table->string('end_to_end_support_description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
