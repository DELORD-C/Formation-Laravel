<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'subject' => Lorem::sentence(5),
            'content' => Lorem::sentences(4, true),
            'user_id' => User::all()->random()->id
        ];
    }
}
