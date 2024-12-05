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
        Schema::create('exam_question_paper', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questions_id')->nullable(); // Example of how to define it
            $table->unsignedBigInteger('exam_id');
            $table->string('subject');
            $table->string('part');
            $table->unsignedBigInteger('quiz_id');
            $table->text('question_text');
            $table->string('question_image')->nullable();
            $table->text('math_field')->nullable();
            $table->text('solution_text');
            $table->string('math_field_solution')->nullable();
            $table->string('option_a');
            $table->string('option_a_image')->nullable();
            $table->string('option_b');
            $table->string('option_b_image')->nullable();
            $table->string('option_c');
            $table->string('option_c_image')->nullable();
            $table->string('option_d');
            $table->string('option_d_image')->nullable();
            $table->string('correct_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ques');
    }
};
