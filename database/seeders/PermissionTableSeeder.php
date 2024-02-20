<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'list-role',
            'create-role',
            'edit-role',
            'delete-role',
            'list-user',
            'create-user',
            'edit-user',
            'delete-user',
            'list-product',
            'create-product',
            'edit-product',
            'delete-product'
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
