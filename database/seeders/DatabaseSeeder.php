<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Service;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
