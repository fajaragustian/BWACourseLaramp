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
        $superAdmin->givePermissionTo([
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
            'delete-product'
        ]);

        $productManager->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product'
        ]);
    }
}
