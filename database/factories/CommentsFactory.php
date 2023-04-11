<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    public function definition()
    {
        return [
            'comment' => fake()->text(200),
            'post_id'  => fake()->randomElement([1, 10]),
            'user_id'  => 1
        ];
    }
}
