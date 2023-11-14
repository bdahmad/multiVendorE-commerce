<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_categories')->insert([
            [
                'sub_category_name' => 'Laptop',
                'sub_category_slug' => 'laptop',
                'sub_category_status' => 1,
                'category_id' => 1,
                'category_slug' => 'electronics',
                'sub_category_creator' => 2,
                'created_at' => Carbon::now()->toDateTimeLocalString(),
            ],
            [
                'sub_category_name' => 'Vegetable',
                'sub_category_slug' => 'Vegetable',
                'sub_category_status' => 1,
                'category_id' => 2,
                'category_slug' => 'food',
                'sub_category_creator' => 2,
                'created_at' => Carbon::now()->toDateTimeLocalString(),
            ],

        ]);
    }
}
