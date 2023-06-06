<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::insert([
            [
                'menu_name' => 'dashboard',
                'menu_icon' => 'nav-icon fas fa-tachometer-alt',
                'menu_link' => '/home',
                'created_at' => now(),
            ],
            [
                'menu_name' => 'user management',
                'menu_icon' => 'nav-icon fas fa-users-cog',
                'menu_link' => '#',
                'created_at' => now(),
            ],
            [
                'menu_name' => 'menu management',
                'menu_icon' => 'nav-icon fas fa-tasks',
                'menu_link' => '/menu',
                'created_at' => now(),
            ],
        ]);
    }
}
