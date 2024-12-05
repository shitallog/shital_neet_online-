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
        Schema::create('exam_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Package name
            $table->json('exams'); // Store selected exams as JSON
            $table->enum('payment_type', ['free', 'paid']); // Payment type: free or paid
            $table->decimal('amount', 10, 2)->nullable(); // Nullable for free packages
            $table->text('description')->nullable(); // Description of the package
            $table->string('image')->nullable(); // For package image upload
            $table->boolean('active')->default(true); // Active status (true or false)
            $table->timestamps(); // Created and updated timestamps
            
            // // Payment-related fields for PhonePe integration
            // $table->string('payment_status')->nullable(); // Store payment status (e.g., 'paid', 'pending')
            // $table->string('order_id')->nullable(); // Store order ID generated for payment
            // $table->string('transaction_id')->nullable(); // Store the transaction ID after successful payment
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_packages');
    }
};
