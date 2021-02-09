<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name', 50);
            $table->string('account_email', 100);
            $table->string('account_description', 500)->nullable();
            $table->integer('account_billing_address_id')->nullable();
            $table->integer('account_shipping_address_id')->nullable();
            $table->integer('timezone_id')->nullable();
            $table->string('invoice_prefix', 50);
            $table->integer('next_invoice_sequence');
            $table->string('tax_status', 30);
            $table->string('account_status', 20);
            $table->integer('master_account_id');
            $table->timestamp('created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
