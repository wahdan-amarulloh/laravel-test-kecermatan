<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menusRoute = [
            [
                'name' => 'DASHBOARD',
                'route' => 'dashboard',
                'is_admin' => 0,
            ],
            [
                'name' => 'USERS',
                'route' => 'user.index',
                'is_admin' => 1,
            ],
            [
                'name' => 'QUESTION',
                'route' => 'question.index',
                'is_admin' => 1,
            ],
            [
                'name' => 'PLAN',
                'route' => 'subscription.index',
                'is_admin' => 1,
            ],
            [
                'name' => 'DOCS',
                'route' => 'docs',
                'is_admin' => 1,
            ],
            [
                'name' => 'TEST',
                'route' => 'user.test',
                'is_admin' => 0,
            ],
        ];

        \Illuminate\Support\Facades\DB::table('menus')->insert($menusRoute);
    }
}
