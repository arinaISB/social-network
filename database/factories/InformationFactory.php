<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Information>
 */
class InformationFactory extends Factory
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
            'user_id' => 1,
            'status'  => $this->faker->text(50),
            'job'     => $this->faker->text(30),
            'city'    => $this->faker->text(30),
            'hobby'   => $this->faker->text(30),
        ];
    }
}
