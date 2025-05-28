<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Seeder;


class ThreadSeeder extends Seeder
{
    public function run()
    {
        $userIds = User::pluck('id')->toArray();
        $categoryIds = \App\Models\Category::pluck('id')->toArray();

        Thread::factory(10)->create([
            'author_id' => function () use ($userIds) {
                return $userIds[array_rand($userIds)];
            },
            'category_id' => function () use ($categoryIds) {
                return $categoryIds[array_rand($categoryIds)];
            },
        ]);
    }
}
