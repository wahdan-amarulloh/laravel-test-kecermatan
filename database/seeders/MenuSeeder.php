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
            [
                'name' => 'DOCS',
            ],
        ];

        $menusRoute = [
            [
                'name' => 'PLAN',
                'parent_id' => null,
                'route' => 'subscription.index',
                'status' => 'AC',
            ],
        ];

        \Illuminate\Support\Facades\DB::table('menus')->insert($menus);
        \Illuminate\Support\Facades\DB::table('menus')->insert($menusRoute);
    }
}
