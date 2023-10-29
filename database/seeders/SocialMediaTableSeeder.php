<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_media')->insert([

            // Superadmin
            [
                'user_id' => 1,
                'social_media_name' => 'WebSite',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'website',
                'status_id' => 1

            ],
            [
                'user_id' => 1,
                'social_media_name' => 'Github',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'github',
                'status_id' => 1

            ],
            [
                'user_id' => 1,
                'social_media_name' => 'Twitter',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'twitter',
                'status_id' => 1

            ],
            [
                'user_id' => 1,
                'social_media_name' => 'Instagram',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'instagram',
                'status_id' => 1

            ],
            [
                'user_id' => 1,
                'social_media_name' => 'Facebook',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'facebook',
                'status_id' => 1

            ],
            [
                'user_id' => 1,
                'social_media_name' => 'Linkedin',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'linkedin',
                'status_id' => 1

            ],

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
            [
                'user_id' => 2,
                'social_media_name' => 'Linkedin',
                'social_media_link' => 'www.example.com',
                'social_media_slug' => 'linkedin',
                'status_id' => 1

            ],

        ]);
    }
}
