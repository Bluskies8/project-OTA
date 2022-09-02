<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Summer Sale',
            'slug' => 'Summer-Sale'
        ]);
        Tag::create([
            'name' => 'Winter Sale',
            'slug' => 'Winter-Sale'
        ]);
    }
}
