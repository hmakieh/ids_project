<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'post_id' => Post::factory(),
            'content' => $this->faker->paragraph,
            'parent_comment_id' => null
        ];
    }

    public function reply()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_comment_id' => Comment::factory()
            ];
        });
    }
}