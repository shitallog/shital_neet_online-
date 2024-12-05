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
        Schema::create('class12s', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key
            $table->string('file_name'); // Column for the file name
            $table->string('file_path'); // Column for the file path
            $table->string('file_type')->nullable(); // Column for the file type, optional
            $table->timestamps(); // Creates created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class12s');
    }
};
