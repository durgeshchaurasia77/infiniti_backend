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
        Schema::create('industry', function (Blueprint $table) {
            $table->id();
            $table->string('header_title')->nullable();
            $table->text('header_short_description')->nullable();
            $table->string('header_image')->nullable();
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('seo_slug')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_image')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industry');
    }
};
