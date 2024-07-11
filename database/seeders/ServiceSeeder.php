<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;  // Ensure this import is present
use App\Models\Category; // Ensure this import is present
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $services = [
            ['category' => 'Flat Tire', 'name' => 'Flat Tire Change', 'description' => 'Changing a flat tire with a spare.', 'price' => 50.00],
            ['category' => 'Battery Jump-Start', 'name' => 'Battery Jump-Start', 'description' => 'Jump-starting a dead battery.', 'price' => 40.00],
            ['category' => 'Towing', 'name' => 'Local Towing', 'description' => 'Towing within 10 miles.', 'price' => 100.00],
            ['category' => 'Fuel Delivery', 'name' => 'Fuel Delivery', 'description' => 'Delivering fuel to your location.', 'price' => 30.00],
            ['category' => 'Lockout Assistance', 'name' => 'Lockout Service', 'description' => 'Unlocking a car when keys are inside.', 'price' => 60.00],
            ['category' => 'Winch Service', 'name' => 'Winch Out', 'description' => 'Pulling a stuck vehicle out of mud or snow.', 'price' => 120.00],
        ];

        foreach ($services as $service) {
            $category = Category::where('name', $service['category'])->first();
            Service::create([
                'category_id' => $category->id,
                'name' => $service['name'],
                'description' => $service['description'],
                'price' => $service['price']
            ]);
        }
    }
}
