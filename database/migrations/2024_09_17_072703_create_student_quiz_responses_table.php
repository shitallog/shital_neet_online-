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
        Schema::create('student_quiz_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to students table
            $table->unsignedBigInteger('quiz_id'); // Foreign key to quizzes table
            $table->json('answers'); // JSON to store answers for each question
            $table->integer('score')->nullable(); // Student's score for this quiz
            $table->timestamps();

            // Add foreign key constraints
            // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            // $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_quiz_responses');
    }
};
