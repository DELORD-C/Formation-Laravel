<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Spport\Facades\Hash;

class PostSeeder extends Seeder {
    public function run(): void
    {
        Post::factory()
            ->count(5)
            ->create();
    }
}
