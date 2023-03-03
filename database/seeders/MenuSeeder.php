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
            [
                'name' => 'MEMBER',
            ],
            [
                'name' => 'BANK',
            ],
            [
                'name' => 'TEST',
            ],
            [
                'name' => 'MENU',
            ],
            [
                'name' => 'USERS',
            ],
            [
                'name' => 'PERMISSION',
            ],
        ];

        $menusRoute = [
            [
                'name' => 'PLAN',
                'route' => 'subscription.index',
            ],
            [
                'name' => 'DOCS',
                'route' => 'docs',
            ],
        ];

        \Illuminate\Support\Facades\DB::table('menus')->insert($menus);
        \Illuminate\Support\Facades\DB::table('menus')->insert($menusRoute);
    }
}
