<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'slug' => uniqid('sa' . rand()),

                // this data related with super admin just for seed null value
                'vendor_shop_name' => null,
                'vendor_shop_slug' => null,
                'vendor_pay_of_line' => null,
                'vendor_short_description' => null,
                'vendor_join' => null,
                'vendor_avg_review' => null,
                'vendor_status_id' => null,
                'vendor_shop_address' => null,
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
                'slug' => uniqid('a' . rand()),

                // this data related with admin just for seed null value
                'vendor_shop_name' => null,
                'vendor_shop_slug' => null,
                'vendor_pay_of_line' => null,
                'vendor_short_description' => null,
                'vendor_join' => null,
                'vendor_avg_review' => null,
                'vendor_status_id' => null,
                'vendor_shop_address' => null,
            ],

            // Vendor Data
            [
                'name' => 'Vendor',
                'username' => 'vendor',
                'email' => 'vendor@gmail.com',
                'phone' => '01718022216',
                'password' => Hash::make('111'),
                'role_id' => 3,
                'status_id' => 1,
                'slug' => uniqid('v' . rand()),

                // for vendor fake data
                'vendor_shop_name' => 'TFC',
                'vendor_shop_slug' => 'tfc',
                'vendor_pay_of_line' => 'Eat Healthy, Be Healthy',
                'vendor_short_description' => 'We are trying to best',
                'vendor_join' => Carbon::now(),
                'vendor_avg_review' => 4,
                'vendor_status_id' => 1,
                'vendor_shop_address' => "Dhaka",
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
                'slug' => uniqid('u' . rand()),

                // this data not use on user admin just for seed null value
                'vendor_shop_name' => null,
                'vendor_shop_slug' => null,
                'vendor_pay_of_line' => null,
                'vendor_short_description' => null,
                'vendor_join' => null,
                'vendor_avg_review' => null,
                'vendor_status_id' => null,
                'vendor_shop_address' => null,
            ],


        ]);
    }
}
