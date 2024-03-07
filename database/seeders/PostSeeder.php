<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Spport\Facades\Hash;

class PostSeeder extends Seeder {
    public function run(): void
    {
        if (count(Post::all()) < 10) {
            Post::factory()
                ->count(10 - count(Post::all()))
                ->create();
        }
    }
}
