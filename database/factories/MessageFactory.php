<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersById = User::all()->pluck('id');

        $senderId = $usersById->random();
        $receiverId = $usersById->except($senderId)->random();

        return [
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'content' => $this->faker->paragraph,
        ];
    }
}
