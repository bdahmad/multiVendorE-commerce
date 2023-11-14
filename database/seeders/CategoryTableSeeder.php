<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Electronics',
                'category_slug' => 'electronics',
                'category_status' => 1,
                'category_creator' => 2,
                'created_at' => Carbon::now()->toDateTimeLocalString(),
            ],
            [
                'category_name' => 'Food',
                'category_slug' => 'food',
                'category_status' => 1,
                'category_creator' => 2,
                'created_at' => Carbon::now()->toDateTimeLocalString(),
            ],

        ]);
    }
}
