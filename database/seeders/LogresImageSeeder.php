<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\logresImage;

class LogresImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        logresImage::create([
            'type' => 'login',
            'img_url' => 'public/login/login_img.jpg'
        ]);
        logresImage::create([
            'type' => 'register',
            'img_url' => 'public/register/register_img.jpg'
        ]);
        logresImage::create([
            'type' => 'bg_search',
            'img_url' => 'public/bg_search/bg_search_img.jpg'
        ]);
    }
}
