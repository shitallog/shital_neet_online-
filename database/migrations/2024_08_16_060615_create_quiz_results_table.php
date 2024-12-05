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
       
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('exam_id'); // Check if this line exists
            $table->unsignedBigInteger('user_id'); // Foreign key to students table
            $table->unsignedBigInteger('quiz_id'); // Foreign key to quizzes table
            $table->unsignedBigInteger('subject_id');
            $table->integer('part_a_score')->default(0);  // Score for Part A
            $table->integer('part_b_score')->default(0);  // Score for Part B
            $table->boolean('is_correct')->default(0);
            $table->unsignedInteger('incorrect_count')->default(0); // Track incorrect answers
            $table->unsignedInteger('attempted_questions')->default(0); // Track total attempted questions
            $table->unsignedInteger('not_attempted_questions')->default(0); // Track total attempted questions
            $table->integer('total_score')->default(0);  // Total score
            $table->timestamps(); // Created at and Updated at timestamps

            // Add foreign key constraints if necessary
          
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');

        });
           
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_results');
    }
};
