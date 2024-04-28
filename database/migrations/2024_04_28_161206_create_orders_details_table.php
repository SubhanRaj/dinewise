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
        Schema::create('orders_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id', 30);
            $table->text('productData');
            $table->text('selectedTable');
            $table->integer('no_of_people');
            $table->integer('table_status')->default(0);
            $table->string('customer_or_booking', 30);
            $table->string('customer_id_or_booking_id', 30);
            $table->text('orderInstruction')->nullable();
            $table->string('total_item', 20);
            $table->string('total_amount', 30)->nullable();
            $table->string('gst_amount', 30)->nullable();
            $table->string('discount_amount', 30)->nullable();
            $table->string('loyalty_discount', 30)->default('0');
            $table->string('loyalty_used', 20)->default('0');
            $table->string('payable_amount', 30)->nullable();
            $table->string('payment_method', 30)->nullable();
            $table->text('other_method')->nullable();
            $table->text('grand_amount')->nullable();
            $table->string('payment_status', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('chef_status', 30)->nullable()->default('RECEIVED');
            $table->date('date')->nullable();
            $table->string('month', 20)->nullable();
            $table->year('year')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_details');
    }
};
