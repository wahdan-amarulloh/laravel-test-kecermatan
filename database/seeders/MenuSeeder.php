<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'name' => 'DASHBOARD',
            ],
        ];

        $menusRoute = [
            [
                'name' => 'USERS',
                'route' => 'user.index',
            ],
            [
                'name' => 'PLAN',
                'route' => 'subscription.index',
            ],
            [
                'name' => 'DOCS',
                'route' => 'docs',
            ],
            [
                'name' => 'TEST',
                'route' => 'test',
            ],
        ];

        \Illuminate\Support\Facades\DB::table('menus')->insert($menus);
        \Illuminate\Support\Facades\DB::table('menus')->insert($menusRoute);
    }
}
