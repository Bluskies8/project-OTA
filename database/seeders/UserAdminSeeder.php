<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserAdmin;
use Illuminate\Support\Facades\Hash;
class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAdmin::create([
            'admin_role_id' => 1,
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);
        UserAdmin::create([
            'admin_role_id' => 2,
            'username' => 'bo',
            'password' => Hash::make('bo')
        ]);
        UserAdmin::create([
            'admin_role_id' => 3,
            'username' => 'cms',
            'password' => Hash::make('cms')
        ]);
    }
}
