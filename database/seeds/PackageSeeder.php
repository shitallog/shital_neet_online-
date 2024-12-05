<?php

namespace Database\Seeders;
use App\Models\Package;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Package::create([
            'name' => '1-Year NEET Online Examination Package',
            'price' => 1600,
            'tests_included' => 12,
        ]);
    }
}
