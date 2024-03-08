<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $productManager = Role::create(['name' => 'Product Manager']);
        $user = Role::create(['name' => 'User']);
        $superAdmin->givePermissionTo([
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
        ]);
        $admin->givePermissionTo([
            'list-role',
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
        ]);

        $productManager->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product'
        ]);
    }
}
