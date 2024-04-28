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
        Schema::create('released_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 30);
            $table->string('created_payment_id', 10);
            $table->string('paid_amount', 10);
            $table->string('rest_amount', 10)->nullable();
            $table->string('method', 50);
            $table->string('transaction_id', 50)->nullable();
            $table->dateTime('date_time');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('released_payment');
    }
};
