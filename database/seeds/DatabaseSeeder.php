<?php

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
        $this->call(UserSeeder::class);

        // Fist we generate some products with their respective codes
        $this->call(ProductSeeder::class);

        // After the products are made, we make the stock associated with each product code
        $this->call(StockSeeder::class);
    }
}
