<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'name' => 'dashboard',
            ],
            [
                'name' => 'Menu',
            ],
            [
                'name' => 'users',
            ],
            [
                'name' => 'permission',
            ],
        ];

        \Illuminate\Support\Facades\DB::table('menus')->insert($menus);
    }
}
