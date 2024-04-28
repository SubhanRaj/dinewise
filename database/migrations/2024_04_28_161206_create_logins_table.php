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
        Schema::create('logins', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('role', 10)->nullable();
            $table->string('user_id', 20)->nullable()->unique('user_id');
            $table->string('email')->nullable()->unique('email');
            $table->string('phone', 12)->nullable();
            $table->text('password')->nullable();
            $table->string('two_fa_email', 10)->nullable();
            $table->string('two_fa_phone', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logins');
    }
};
