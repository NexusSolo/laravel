<?php

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Payment::create([
          'amount' => 100.00,
          'currency_id' => 1.00,
          'description' => 'Test Payment',
          'account_id' => 1,
          'payment_fee' => 10,
          'master_account_id' => 1,
          'payment_status' => 'completed',
          'payment_number' => '1111222233334444',
          'payment_type' => 'creditcard',
          'payment_providers' => 'Provider',
          'payment_country_origin' => 1,
          'cvc_check' => 0,
          'payment_ip' => '127.0.0.1',
          'payment_created_by' => 1,
          'disputed' => 0,
          'refunded' => 0,
          'for_review' => 1,
      ]);
    }
}
