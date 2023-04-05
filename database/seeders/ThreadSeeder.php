<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    
    public function run()
    {
        Thread::factory(5)->create(['author_id' => 2]);

    }
}
