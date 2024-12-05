<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id'); // Foreign key to quizzes table
            $table->text('question_text'); // Text of the question
            $table->string('question_image')->nullable(); // Optional image for the question
            $table->text('solution_text'); // Text of the solution
            $table->text('option_a'); // Change to TEXT for larger content
            $table->text('option_b'); // Change to TEXT for larger content
            $table->text('option_c'); // Change to TEXT for larger content
            $table->text('option_d'); // Change to TEXT for larger content
            $table->string('option_a_image')->nullable();
            $table->string('option_b_image')->nullable();
            $table->string('option_c_image')->nullable();
            $table->string('option_d_image')->nullable();
            $table->enum('correct_answer', ['a', 'b', 'c', 'd']); // Correct answer
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
