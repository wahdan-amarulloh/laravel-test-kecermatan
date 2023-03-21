<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setup;
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
        $freePlan = \App\Models\Subscription::factory()->create([
            'name' => 'Free Plan',
            'attempt' => 2,
        ]);

        $paidPlan = \App\Models\Subscription::factory()->create([
            'name' => 'Paid Plan',
            'attempt' => 10,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@dev.com',
            'password' => bcrypt('admindev'),
            'is_admin' => 1,
            'subscription_id' => $paidPlan->id,
            'expired_at' => now()->addDays(30),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Member',
            'email' => 'member@dev.com',
            'password' => bcrypt('memberdev'),
            'is_admin' => 0,
            'subscription_id' => $freePlan->id,
            'expired_at' => now()->addDays(10),
        ]);

        Setup::create([
            'admin_phone' => '0899999',
            'bca' => '837643887',
            'youtube' => 'https://www.youtube.com/@LofiGirl',
            'shopee' => 'https://wsa.wallet.airpay.co.id/qr/00d0354a71e61ed03376',
            'ovo' => 'https://www.dana.id/',
            'dana' => 'https://www.ovo.id/',
        ]);

        $this->call(
            [
                MenuSeeder::class,
            ]
        );

        if (App::environment('local')) {
            // The environment is local
            \App\Models\User::factory(100)->create([
                'password' => bcrypt('password'),
            ]);
            $this->call(
                [
                    QuestionSeeder::class,
                ]
            );
        }
    }
}
