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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();  // Creates an auto-incrementing primary key
            $table->string('order_id')->unique();  // Unique order ID
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('mobile_number');
            $table->decimal('amount', 8, 2);  // Amount in decimal format
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamps();  // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
