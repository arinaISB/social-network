<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersId = User::all()->pluck('id');

        $subscriberId = $usersId->random();
        $subscribedToId = $usersId->reject(function ($id) use ($subscriberId) {
            return $id == $subscriberId;
        })->random();

        return [
            'subscriber_id' => $subscriberId,
            'subscribed_to_id' => $subscribedToId,
        ];
    }
}
