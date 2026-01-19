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
        Schema::table('users', function (Blueprint $table) {
            // $table->string('full_name')->nullable();
            // $table->string('email')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable()->after('name');
            // $table->string(column: 'password')->nullable();
            $table->string(column: 'show_password')->nullable()->after('password');
            $table->string('api_token')->nullable()->after('show_password');
            $table->string('device_type')->nullable()->after('api_token');
            $table->string('device_token')->nullable()->after('device_type');
            $table->string('forgot_otp')->nullable()->after('device_token');
            $table->string('image')->nullable()->after('forgot_otp');
            $table->string('provider')->nullable()->after('image');
            $table->boolean('status')->default(1)->index()->after('provider');
            $table->boolean('is_delete')->default(0)->index()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
