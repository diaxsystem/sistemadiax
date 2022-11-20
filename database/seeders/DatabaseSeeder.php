<?php

namespace Database\Seeders;
use App\Products;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $products = Products::factory(50)->create();
    }
}
