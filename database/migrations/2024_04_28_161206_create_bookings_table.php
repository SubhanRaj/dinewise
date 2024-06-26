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
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('booking_id')->unique();
            $table->string('name');
            $table->string('mobile', 20);
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('no_of_people');
            $table->string('event')->nullable();
            $table->timestamp('booked_from')->nullable();
            $table->timestamp('booked_to')->nullable();
            $table->text('tables')->nullable();
            $table->string('amount');
            $table->text('description');
            $table->string('status')->nullable();
            $table->string('cancel_reason')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
