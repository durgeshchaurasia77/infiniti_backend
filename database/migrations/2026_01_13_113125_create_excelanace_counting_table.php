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
        Schema::create('excelanace_counting', function (Blueprint $table) {
            $table->id();
            $table->integer('industry_count')->nullable();
            $table->integer('empowered_count')->nullable();
            $table->integer('coutries_count')->nullable();
            $table->integer('teach_engineer_count')->nullable();
            $table->integer('digital_solution_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excelanace_counting');
    }
};
