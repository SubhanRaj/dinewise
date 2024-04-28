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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('auto_product_id', 20);
            $table->string('product_id');
            $table->string('cat_id');
            $table->text('product_name');
            $table->text('product_image');
            $table->string('stock')->nullable();
            $table->text('price');
            $table->string('status')->nullable();
            $table->integer('stared')->nullable()->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->index(['product_id', 'cat_id'], 'product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
