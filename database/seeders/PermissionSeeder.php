<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            [
                'permission' => 'Create User Role',
                'created_at' => now(),
            ],
            [
                'permission' => 'Read User Role',
                'created_at' => now(),
            ],
            [
                'permission' => 'Update User Role',
                'created_at' => now(),
            ],
            [
                'permission' => 'Delete User Role',
                'created_at' => now(),
            ],
            [
                'permission' => 'Create permission',
                'created_at' => now(),
            ],
            [
                'permission' => 'Read permission',
                'created_at' => now(),
            ],
            [
                'permission' => 'Update permission',
                'created_at' => now(),
            ],
            [
                'permission' => 'Delete permission',
                'created_at' => now(),
            ],
        ]);
    }
}
