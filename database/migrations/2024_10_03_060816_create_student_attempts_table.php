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
        Schema::create('student_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // assumes 'users' table for students
            $table->foreignId('exam_id')->constrained('exams'); // foreign key to 'exams' table
            $table->integer('attempt_number'); // tracks the student's attempt number
            $table->integer('score')->nullable(); // stores the score
            $table->datetime('attempt_date'); // when the exam was attempted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_attempts');
    }
};
