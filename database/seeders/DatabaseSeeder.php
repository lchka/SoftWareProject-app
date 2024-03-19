<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarPart;
use App\Models\Basket;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       //using these to seed all the models at once rather than on by one
        CarPart::factory()->count(15)->create();
        Basket::factory()->count(20)->create(); // Change the count as needed

        //just seeding the harcoded users in
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
