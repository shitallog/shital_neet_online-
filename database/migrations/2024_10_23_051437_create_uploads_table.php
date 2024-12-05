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
        Schema::create('uploads', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('file_name'); // Original file name
            $table->string('file_path'); // File storage path
            $table->string('file_type'); // Type of the file (e.g., image, pdf)
            $table->unsignedBigInteger('user_id')->nullable(); // Optionally, link to a user
            $table->timestamps(); // Created at and Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
