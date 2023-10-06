<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

                //Super Admin Data
            [
                'name' => 'Superadmin',
                'username' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'phone' => '01718022214',
                'password' => Hash::make('111'),
                'role' => 'superadmin',
                'status' => 'active',
                'slag' => uniqid('sa'.rand()),
            ],
                // Admin Data
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '01718022215',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
                'slag' => uniqid('a'.rand()),
            ],

            // Vendor Data
            [
                'name' => 'Vendor',
                'username' => 'vendor',
                'email' => 'vendor@gmail.com',
                'phone' => '01718022216',
                'password' => Hash::make('111'),
                'role' => 'vendor',
                'status' => 'active',
                'slag' => uniqid('v'.rand()),
            ],

            // User Data
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'phone' => '01718022217',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
                'slag' => uniqid('u'.rand()),
            ],
        ]);
    }
}
