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
        Schema::create('exam_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->date('exam_date');
            $table->integer('total_questions');
            $table->integer('attempted_questions');
            $table->integer('correct_answers');
            $table->integer('incorrect_answers');
            $table->string('review_status');
            $table->date('review_date')->nullable();
            $table->text('reviewer_comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_reviews');
    }
};
