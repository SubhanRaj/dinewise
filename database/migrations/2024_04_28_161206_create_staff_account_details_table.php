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
        Schema::create('staff_account_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 20);
            $table->text('bank_name');
            $table->text('account_holder_name');
            $table->string('acc_no');
            $table->string('ifsc_code');
            $table->string('phone_number');
            $table->string('gpay')->nullable();
            $table->string('phonepay')->nullable();
            $table->string('paytm')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_account_details');
    }
};
