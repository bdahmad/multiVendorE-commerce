<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'superadmin'
            ],
            [
                'role_name' => 'admin'
            ],
            [
                'role_name' => 'vendor'
            ],
            [
                'role_name' => 'user'
            ],
        ]);
    }
}
