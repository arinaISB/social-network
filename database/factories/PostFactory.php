<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array
    {
        $userId = User::all()->pluck('id')->random();

        return [
            'author_id'      => $userId,
            'content'        => $this->faker->paragraph,
            'likes_count'    => $this->faker->randomNumber(),
            'comments_count' => $this->faker->randomNumber(),
        ];
    }
}
