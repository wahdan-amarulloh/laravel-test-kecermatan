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
                'name' => 'PLAN',
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

        $member_menus = [
            [
                'name' => 'PLAN',
            ],
            [
                'name' => 'PAYMENT',
            ],
            [
                'name' => 'TEST',
            ],
        ];

        \Illuminate\Support\Facades\DB::table('menus')->insert($menus);
    }
}
