<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder {
    public function run(): void
    {
        if (count(Post::all()) < 10) {
            Post::factory()
                ->count(10 - count(Post::all()))
                ->create();
        }

        if (count(Comment::all()) < 10) {
            Comment::factory()
                ->count(10 - count(Comment::all()))
                ->create();
        }

        $this->createLikes();
    }

    private function createLikes(): void
    {
        if (count(Like::all()) < 5) {
            try {
                Like::factory()
                    ->count(5 - count(Like::all()))
                    ->create();
            } catch (\Exception $e) {
                $this->createLikes();
            }
        }
    }
}
