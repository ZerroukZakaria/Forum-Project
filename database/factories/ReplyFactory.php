<?php

namespace Database\Factories;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{

    protected $model = Reply::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text(),
            'author_id' => $attributes['author_id'] ?? User::factory()->create()->id(),
            'replyable_id' => $attributes['replyable_id'] ?? Thread::factory()->create()->id(),
            'replyable_type' => Thread::TABLE, 
        ];
    }
}
