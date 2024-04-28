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
        Schema::create('pricing_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_id')->unique('unit_id');
            $table->string('unit')->index('unit');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['unit_id'], 'unit_id_2');
            $table->index(['unit_id'], 'unit_id_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_units');
    }
};
