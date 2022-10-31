<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use Illuminate\Database\Seeder;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminRole::create(['name' => 'super admin','type' => 1]);
        AdminRole::create(['name' => 'bo','type' => 2]);
        AdminRole::create(['name' => 'cms','type' => 3]);
    }
}
