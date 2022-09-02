<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name' => 'supplier',
            'email' => 'supplier@gmail.com',
            'phone' => 8132235486,
            'address' => 'jl. mawar 123'
        ]);
    }
}
