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
        Schema::create('payments', function (Blueprint $table) {
            $table->pay_id();
            $table->string('name')->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->double('amount')->nullable();
            $table->string('status', 10)->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency', 20)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
