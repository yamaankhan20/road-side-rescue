<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Ensure this line is present
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'Flat Tire',
            'Battery Jump-Start',
            'Towing',
            'Fuel Delivery',
            'Lockout Assistance',
            'Winch Service',
        ];

        foreach ($categories as $category) {
            Category::create(['category_name' => $category]);
        }
    }
}
