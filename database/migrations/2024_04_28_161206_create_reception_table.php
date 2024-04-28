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
        Schema::create('reception', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year');
            $table->string('month', 20);
            $table->date('date');
            $table->string('name');
            $table->string('phone', 12);
            $table->text('purpose');
            $table->time('entry_time');
            $table->time('exit_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reception');
    }
};
