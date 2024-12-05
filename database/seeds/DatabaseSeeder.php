<?php

use Illuminate\Database\Seeder;
use Database\Seeders\PackageSeeder; // Add this if needed

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(PackageSeeder::class);
    }
}
