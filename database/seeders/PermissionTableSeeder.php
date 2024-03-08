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
            'list-permission',
            'create-permission',
            'edit-permission',
            'delete-permission',
            'list-user',
            'create-user',
            'edit-user',
            'delete-user',
            'list-product',
            'create-product',
            'edit-product',
            'delete-product',
            'list-discount',
            'create-discount',
            'edit-discount',
            'delete-discount',
            'list-transaction',
            'create-transaction',
            'edit-transaction',
            'delete-transaction',
            'list-camp',
            'create-camp',
            'edit-camp',
            'delete-camp',
        ];
        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
