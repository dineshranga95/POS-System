<?php

use Illuminate\Database\Seeder;
use Faker\Generator;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ProductSeeder::class);
    }
}
