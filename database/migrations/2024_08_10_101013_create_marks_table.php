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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('subject');
            $table->integer('marks_obtained');
            $table->integer('total_marks');
            $table->decimal('percentage', 5, 2)->nullable(); // Calculated later
            $table->string('transaction_id')->unique();
            $table->string('grade')->nullable(); // Calculated later
            $table->string('exam_type');
            $table->date('exam_date');
            $table->text('remarks')->nullable();
            $table->string('status')->default('Pass');
            $table->string('teacher_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
