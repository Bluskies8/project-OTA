<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutusTeam;

class AboutusTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutusTeam::create([
            'name' => 'Sumbawa,I Made Gede',
            'jabatan' => 'Managing Director',
            'img_url' => 'public/AboutUs/Team/t1.jpg'
        ]);
        AboutusTeam::create([
            'name' => 'Benny, SE. I Gede',
            'jabatan' => 'General Manager',
            'img_url' => 'public/AboutUs/Team/t2.jpg'
        ]);
        AboutusTeam::create([
            'name' => 'Danitri, Ni Nyoman',
            'jabatan' => 'Bussiness Dev',
            'img_url' => 'public/AboutUs/Team/t3.jpg'
        ]);
        AboutusTeam::create([
            'name' => 'Adiana, I Nyoman',
            'jabatan' => 'ales & Marketing',
            'img_url' => 'public/AboutUs/Team/t4.jpg'
        ]);
    }
}
