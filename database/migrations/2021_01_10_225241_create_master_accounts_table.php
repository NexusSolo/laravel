<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 50);
            $table->string('customer_status', 10);
            $table->string('customer_email', 100);
            $table->string('contact_first_name', 50);
            $table->string('contact_last_name', 50);
            $table->string('contact_street_address_1', 100);
            $table->string('contact_street_address_2', 100);
            $table->string('contact_country', 30);
            $table->string('contact_city', 50);
            $table->string('contact_postal_code', 10);
            $table->string('contact_district_1', 50)->nullable();
            $table->string('contact_district_2', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_accounts');
    }
}
