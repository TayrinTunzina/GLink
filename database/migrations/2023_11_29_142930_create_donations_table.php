<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained(); // Foreign key referencing the campaigns table
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['credit_card', 'paypal']); // Add more options as needed
            $table->enum('status', ['paid', 'not_paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
