<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductsConfig;

class ProductsConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductsConfig::create([
            'nama' => 'Flight',
            'invoice_prefix' => 'FGH',
            'code' => 'FLG',
            'payment_due_time' => '1,0,0,ad',
            'show_search_engine' => true,
        ]);
        ProductsConfig::create([
            'nama' => 'Hotel',
            'invoice_prefix' => 'HOT',
            'code' => 'HTL',
            'payment_due_time' => '1,0,0,ad',
            'show_search_engine' => true,
        ]);
        ProductsConfig::create([
            'nama' => 'Transport',
            'invoice_prefix' => 'TRS',
            'code' => 'TRN',
            'payment_due_time' => '1,0,0,ad'
        ]);
        ProductsConfig::create([
            'nama' => 'Tour',
            'invoice_prefix' => 'TUR',
            'code' => 'TUR',
            'payment_due_time' => '1,0,0,ad',
            'show_search_engine' => true,
        ]);
        ProductsConfig::create([
            'nama' => 'Tritayatra',
            'invoice_prefix' => 'TTY',
            'code' => 'TRT',
            'payment_due_time' => '1,0,0,ad',
            'show_search_engine' => true,
        ]);
        ProductsConfig::create([
            'nama' => 'Attraction',
            'invoice_prefix' => 'ATR',
            'code' => 'ATT',
            'payment_due_time' => '1,0,0,ad'
        ]);
        ProductsConfig::create([
            'nama' => 'Cruise',
            'invoice_prefix' => 'CRS',
            'code' => 'CRS',
            'payment_due_time' => '1,0,0,ad'
        ]);
        ProductsConfig::create([
            'nama' => 'Insurance',
            'invoice_prefix' => 'ICE',
            'code' => 'INS',
            'payment_due_time' => '1,0,0,ad',
            'show_search_engine' => true,
        ]);
        ProductsConfig::create([
            'nama' => 'Wedding',
            'invoice_prefix' => 'WED',
            'code' => 'WED',
            'payment_due_time' => '1,0,0,ad'
        ]);
        ProductsConfig::create([
            'nama' => 'Travel Document',
            'invoice_prefix' => 'TDC',
            'code' => 'TRD',
            'payment_due_time' => '1,0,0,ad',
            'show_search_engine' => true,
        ]);
    }
}
