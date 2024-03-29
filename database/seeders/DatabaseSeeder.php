<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            MessageSeeder::class,
            SubscriptionSeeder::class,
            NotificationSeeder::class,
            LikeSeeder::class,
            CommentSeeder::class,
            InformationSeeder::class,
            ]);
    }
}
