<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JokulPaymentConfig;

class JokulPaymentConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JokulPaymentConfig::create(['key' => 'VIRTUAL_ACCOUNT_BANK_MANDIRI', 'enabled' => true]);
        JokulPaymentConfig::create(['key' => 'VIRTUAL_ACCOUNT_BANK_SYARIAH_MANDIRI', 'enabled' => true]);
        JokulPaymentConfig::create(['key' => 'VIRTUAL_ACCOUNT_DOKU', 'enabled' => true]);
        JokulPaymentConfig::create(['key' => 'VIRTUAL_ACCOUNT_BRI', 'enabled' => true]);
        JokulPaymentConfig::create(['key' => 'VIRTUAL_ACCOUNT_BCA', 'enabled' => true]);
        JokulPaymentConfig::create(['key' => 'CREDIT_CARD', 'enabled' => true]);
        JokulPaymentConfig::create(['key' => 'DIRECT_DEBIT_BRI', 'enabled' => true]);
        JokulPaymentConfig::create(['key' => 'ONLINE_TO_OFFLINE_ALFA', 'enabled' => true]);

    }
}
