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
        Schema::create('test_series_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->decimal('price', 8, 2);
            $table->decimal('original_price', 8, 2); // Original price (for discounts)
            $table->string('image'); // Make sure this field is defined
            $table->year('year'); // Corrected to add the semicolon
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_series_packages');
    }
};
