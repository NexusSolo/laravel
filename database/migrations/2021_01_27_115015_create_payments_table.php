<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->float('amount');
            $table->float('currency_id');
            $table->string('description', 500)->nullable();
            $table->integer('account_id')->nullable();
            $table->float('risk_evaluation')->nullable();
            $table->float('payment_fee');
            $table->integer('master_account_id');
            $table->string('payment_status', 50);
            $table->string('payment_number', 50);
            $table->string('fingerprint_number', 50)->nullable();
            $table->string('payment_type', 50);
            $table->string('payment_providers', 50);
            $table->integer('account_addresses_id')->nullable();
            $table->integer('payment_country_origin');
            $table->boolean('cvc_check')->default(false);
            $table->string('payment_ip', 50);
            $table->integer('payment_created_by');
            $table->boolean('disputed')->default(false);
            $table->string('failure_code', 50)->nullable();
            $table->string('failure_message', 200)->nullable();
            $table->boolean('refunded')->defaut(false);
            $table->boolean('for_review')->defaut(false);
            $table->string('review_reason', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
