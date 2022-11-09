<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'title' => 'mr',
            'first_name' => 'Test',
            'last_name' => '1',
            'phone_number' => '12345678',
            'email' => 'test1@gmail.com',
            'email_verified_at' => '2021-10-13 16:43:36',
            'DOB' => '2001-05-08',
            'password' => '$2y$10$DLyrXz5xMCCHDFtBVIN6mueZT4gjSV9LgIYQdjMeg7W.1aAARvWx.'
        ]);
        User::create([
            'title' => 'mr',
            'first_name' => 'Ariel',
            'middle_name' => 'Nova',
            'last_name' => 'Christian',
            'phone_number' => '6282230576517',
            'email' => 'arielnovachristian01@gmail.com',
            'email_verified_at' => '2021-10-13 16:43:36',
            'DOB' => '2001-05-08',
            'password' => '$2y$10$DLyrXz5xMCCHDFtBVIN6mueZT4gjSV9LgIYQdjMeg7W.1aAARvWx.'
        ]);
    }
}
