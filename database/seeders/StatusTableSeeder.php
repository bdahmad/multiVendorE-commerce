<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'status_name' => 'active'
            ],
            [
                'status_name' => 'processing'
            ],
            [
                'status_name' => 'inactive'
            ],
            [
                'status_name' => 'block'
            ],
            [
                'status_name' => 'disable'
            ],
        ]);
    }
}
