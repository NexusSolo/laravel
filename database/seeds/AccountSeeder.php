<?php

use Illuminate\Database\Seeder;
use App\Models\Account;
class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      Account::create([
        'account_name' => 'Andrea Jaramillo',
        'account_email' => 'test@mail.com',
        'account_description' => 'Test Account',
        'account_billing_address_id' => 1,
        'account_shipping_address_id' => '0',
        'timezone_id' => '0',
        'invoice_prefix' => '0',
        'next_invoice_sequence' => '0',
        'tax_status' => 'exempt',
        'account_status' => 'none',
        'master_account_id' => '1'
      ]);
    }
}
