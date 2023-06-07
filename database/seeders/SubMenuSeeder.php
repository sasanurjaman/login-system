<?php

namespace Database\Seeders;

use App\Models\SubMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubMenu::insert([
            [
                'menu_id' => 2,
                'sub_menu_name' => 'user role',
                'sub_menu_icon' => 'far fa-circle nav-icon',
                'sub_menu_link' => '/role',
                'created_at' => now(),
            ],
            [
                'menu_id' => 2,
                'sub_menu_name' => 'user permission',
                'sub_menu_icon' => 'far fa-circle nav-icon',
                'sub_menu_link' => '/permission',
                'created_at' => now(),
            ],
        ]);
    }
}
