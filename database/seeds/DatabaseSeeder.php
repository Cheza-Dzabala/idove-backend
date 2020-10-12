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
         $this->call([
             defaultUserSeeder::class,
             ProjectCategorySeeder::class,
             CountriesSeeder::class,
             MapCountriesSeeder::class,
         ]);
    }
}
