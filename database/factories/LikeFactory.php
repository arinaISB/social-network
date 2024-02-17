<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::all()->pluck('id')->random();
        $postId = Post::all()->pluck('id')->random();

        while (Like::where([
                ['user_id', $userId],
                ['post_id', $postId],
            ])->exists())
        {
            $postId = Post::all()->pluck('id')->random();
        }
        return [
            'user_id' => $userId,
            'post_id' => $postId,
        ];
    }
}
