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
        Schema::create('leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 20);
            $table->date('l_from');
            $table->date('l_to');
            $table->string('type', 20)->nullable();
            $table->string('status', 20);
            $table->text('des')->nullable();
            $table->text('reject_reason')->nullable();
            $table->integer('year');
            $table->string('month', 30);
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
