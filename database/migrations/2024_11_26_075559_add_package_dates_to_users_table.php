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
        Schema::table('users', function (Blueprint $table) {
         // Add the new columns to track package activation and expiration dates
         $table->timestamp('package_activation_date')->nullable()->after('email'); // Add after the email column (adjust as needed)
         $table->timestamp('package_expiration_date')->nullable()->after('package_activation_date'); // Add after activation date
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        // Drop the columns if migration is rolled back
        $table->dropColumn('package_activation_date');
        $table->dropColumn('package_expiration_date');
        
        });
    }
};
