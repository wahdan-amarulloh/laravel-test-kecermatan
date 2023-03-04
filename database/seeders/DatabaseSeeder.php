<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
            MenuSeeder::class,
            QuestionSeeder::class,
            ]
        );

        if (App::environment('local')) {
            // The environment is local
            \App\Models\User::factory(100)->create();
            \App\Models\Subscription::factory(10)->create();
            $this->call(
                [
                QuestionSeeder::class,
                ]
            );
        }

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@dev.com',
            'password' => bcrypt('admindev'),
            'is_admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Member',
            'email' => 'member@dev.com',
            'password' => bcrypt('memberdev'),
            'is_admin' => 0,
        ]);
    }
}
