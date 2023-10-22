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


        DB::table('social_media')->insert([

            // Superadmin


            // Admin

            [
                'user_id' => 2,
                'social_media_name' => 'WebSite',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'website',
                'status_id' => 1

            ],
            [
                'user_id' => 2,
                'social_media_name' => 'Github',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'github',
                'status_id' => 1

            ],
            [
                'user_id' => 2,
                'social_media_name' => 'Twitter',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'twitter',
                'status_id' => 1

            ],
            [
                'user_id' => 2,
                'social_media_name' => 'Instagram',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'instagram',
                'status_id' => 1

            ],
            [
                'user_id' => 2,
                'social_media_name' => 'Facebook',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'facebook',
                'status_id' => 1

            ],

        ]);
    }
}
