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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cat_id')->index('cat_id');
            $table->string('cat_name');
            $table->string('cat_img')->nullable();
            $table->string('cat_banner')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['cat_name', 'cat_img', 'cat_banner'], 'cat_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
