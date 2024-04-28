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
        Schema::create('create_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 30);
            $table->year('year');
            $table->string('month', 30);
            $table->string('deduction', 30)->nullable();
            $table->string('bonus', 30)->nullable();
            $table->string('final_amount', 30);
            $table->text('comment')->nullable();
            $table->string('status')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_payment');
    }
};
