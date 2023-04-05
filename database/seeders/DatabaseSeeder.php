<?php

namespace Database\Seeders;

use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\NotificationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ThreadSeeder::class);
    }   
}
