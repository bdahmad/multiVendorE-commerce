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
                'role_id' => 1,
                'status_id' => 1,
                'slag' => uniqid('sa'.rand()),
            ],
                // Admin Data
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '01718022215',
                'password' => Hash::make('111'),
                'role_id' => 2,
                'status_id' => 1,
                'slag' => uniqid('a'.rand()),
            ],

            // Vendor Data
            [
                'name' => 'Vendor',
                'username' => 'vendor',
                'email' => 'vendor@gmail.com',
                'phone' => '01718022216',
                'password' => Hash::make('111'),
                'role_id' => 3,
                'status_id' => 2,
                'slag' => uniqid('v'.rand()),
            ],

            // User Data
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'phone' => '01718022217',
                'password' => Hash::make('111'),
                'role_id' => 4,
                'status_id' => 1,
                'slag' => uniqid('u'.rand()),
            ],

            // Demo User Data
            // [
            //     'name' => 'Demo User',
            //     'username' => 'demouser',
            //     'email' => 'demouser@gmail.com',
            //     'phone' => '01718022217',
            //     'password' => Hash::make('111'),
            //     'role_id' => '',
            //     'status_id' => '',
            //     'slag' => uniqid('u'.rand()),
            // ],
        ]);
    }
}
