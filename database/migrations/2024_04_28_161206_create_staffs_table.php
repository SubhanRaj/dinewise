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
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 20);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('work_ex')->nullable();
            $table->string('designation')->nullable();
            $table->date('doj')->nullable();
            $table->text('address')->nullable();
            $table->text('profile_picture');
            $table->text('documents')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
