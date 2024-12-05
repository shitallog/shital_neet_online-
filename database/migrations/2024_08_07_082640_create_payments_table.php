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
            $table->id(); // Auto-incrementing primary key
            $table->string('merchant_id'); // Merchant ID (e.g., 'M22YDXMVXLJUX')
            $table->string('transaction_id')->unique(); // Unique transaction ID (e.g., 'abc12345')
            $table->string('merchant_user_id')->nullable(); // Merchant user ID (e.g., 'MUID123')
            $table->unsignedBigInteger('user_id')->nullable(); // Reference to user (optional)
            $table->integer('amount'); // Amount in paisa (e.g., 10 = ₹0.10)
            $table->string('payment_status')->default('pending'); // Payment status ('pending', 'paid', 'failed')
            $table->timestamps(); // Created at and updated at
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
