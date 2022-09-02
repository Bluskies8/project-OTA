<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisiMisi;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VisiMisi::create([
            'type' => 'visi',
            'description' => 'ini visi'
        ]);
        VisiMisi::create([
            'type' => 'misi',
            'description' => 'ini misi'
        ]);
    }
}
