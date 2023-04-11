<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'photo' => fake()->imageUrl(),
            'title' => fake()->title(),
            'slug' => fake()->title(),
            'content' => fake()->sentence(100),
            'user_id' => 1
        ];
    }
}
