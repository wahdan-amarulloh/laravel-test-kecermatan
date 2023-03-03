<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Subscription::factory(10)->create();

        $this->call(
            [
            MenuSeeder::class,
            QuestionSeeder::class,
            ]
        );

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@dev.com',
            'password' => bcrypt('admindev'),
            'is_admin' => 1,
        ]);
    }
}
