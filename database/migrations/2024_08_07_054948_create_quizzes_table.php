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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id'); // Check if this line exists
            $table->datetime('started_date')->nullable();
            $table->datetime('finish_date')->nullable(); 
            $table->unsignedBigInteger('subject_id');
            $table->integer('mark');
            $table->integer('total');
            $table->integer('right');
            $table->integer('wrong');
            $table->integer('time_limit'); // Adds a time limit column
            $table->string('part');
            $table->enum('exam_status', ['not_started', 'started'])->default('not_started');
            $table->boolean('publish')->default(false);
            $table->text('desc');
            $table->timestamps();

        // Add foreign key constraints
         //      $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
         //      $table->foreign('exam_time_id')->references('id')->on('exam_times')->onDelete('cascade');
         //      $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
