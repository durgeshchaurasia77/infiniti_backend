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
        Schema::create('why_business_choose', function (Blueprint $table) {
            $table->id();
            $table->string('ai_title')->nullable();
            $table->text('ai_description')->nullable();
            $table->string('scalable_title')->nullable();
            $table->text('scalable_description')->nullable();
            $table->string('reliable_title')->nullable();
            $table->text('reliable_description')->nullable();
            $table->string('security_title')->nullable();
            $table->text('security_description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_business_choose');
    }
};
