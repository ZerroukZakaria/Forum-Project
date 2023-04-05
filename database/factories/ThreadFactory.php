<?php

namespace Database\Factories;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    protected $model = Thread::class;

    public function definition()
    {
        return [
            'title' => $this->faker->text(30),
            'body' => $this->faker->paragraph(2, true),
            'slug' => $this->faker->unique()->slug,
            'author_id' => rand(3,9),
            'category_id' => rand(1,7),
        ];
    }
}
