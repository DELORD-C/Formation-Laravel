<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            'subject' => fake()->sentence(4),
            'body' => fake()->sentence(50),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
