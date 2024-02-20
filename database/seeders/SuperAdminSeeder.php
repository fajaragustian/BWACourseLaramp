<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $superAdmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@staterkits.com',
            'password' => Hash::make('password')
        ]);

        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@staterkits.com',
            'password' => Hash::make('password')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $productManager = User::create([
            'name' => 'Product Manager',
            'email' => 'productmanager@staterkits.com',
            'password' => Hash::make('password')
        ]);
        $productManager->assignRole('Product Manager');
    }
}
