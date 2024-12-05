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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('father_name');
            $table->string('mother_name');
            $table->enum('category', ['general', 'obc', 'sc', 'st']);
            $table->string('username')->unique();
            $table->string('password');
            $table->string('profile_picture')->nullable(); // Add this line
            $table->string('reference')->nullable(); // Optional field
            $table->decimal('cash', 8, 2)->nullable(); // Allow null values
            $table->enum('course', ['XI', 'XII', 'XII PASS']); // Add this line for the course field
            //$table->string('registration_number')->unique();
            //$table->string('payment_status'); // 'cash' or 'online'
            $table->timestamps();
        });
    }

    /**
     * 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
