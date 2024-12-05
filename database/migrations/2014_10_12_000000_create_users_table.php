<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  
     public function up(): void
     {
         Schema::create('users', function (Blueprint $table) {
             $table->id();
             $table->string('name');
             $table->string('email')->unique();
             $table->date('dob')->nullable(); // Make dob optional
             $table->enum('gender', ['male', 'female', 'other']);
             $table->string('father_name')->nullable(); // If you want to allow null values
             $table->string('mother_name')->nullable();
             $table->enum('category', ['general', 'obc', 'sc', 'st']);
             $table->string('username')->nullable();
             $table->string('password')->unique();
             $table->string('profile_picture')->nullable(); // Add this line
             $table->string('reference')->nullable(); // Optional field
             $table->decimal('cash', 8, 2)->nullable(); // Allow null values
             $table->enum('course', ['XI', 'XII', 'XII PASS']); // Add this line for the course field
             $table->timestamp('email_verified_at')->nullable();
             $table->rememberToken();
             $table->timestamps();
         });
 
         Schema::create('password_reset_tokens', function (Blueprint $table) {
             $table->string('email')->primary();
             $table->string('token');
             $table->timestamp('created_at')->nullable();
         });
 
         Schema::create('sessions', function (Blueprint $table) {
             $table->string('id')->primary();
             $table->foreignId('user_id')->nullable()->index();
             $table->string('ip_address', 45)->nullable();
             $table->text('user_agent')->nullable();
             $table->longText('payload');
             $table->integer('last_activity')->index();
         });
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
}
