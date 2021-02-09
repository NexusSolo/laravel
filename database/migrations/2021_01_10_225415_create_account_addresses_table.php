<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('country_id', 100)->nullable();
            $table->string('account_street_address_1', 100);
            $table->string('account_street_address_2', 100);
            $table->string('account_country', 30);
            $table->string('account_city', 50);
            $table->string('account_postal_code', 10);
            $table->string('account_district_1', 50)->nullable();
            $table->string('account_district_2', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_addresses');
    }
}
