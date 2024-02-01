<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provoider_informations', function (Blueprint $table) {
            $table->id();
            $table->string('provider_type',50)->nullable();
            $table->string('name',80)->nullable();
            $table->string('address',225)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('zip_code',20)->nullable();
            $table->string('phone_number',50)->nullable();
            $table->string('tax_id',50)->nullable();
            $table->string('owner_name',50)->nullable();
            $table->string('owner_address',225)->nullable();
            $table->string('owner_phone_number',50)->nullable();
            $table->string('owner_user_name',50)->nullable();
            $table->string('owner_password',50)->nullable();
            $table->string('owner_license_number',100)->nullable();
            $table->string('affidavit_signor',50)->nullable();
            $table->string('litigation_principle',50)->nullable();
            $table->string('litigation_interest',50)->nullable();
            $table->string('arbitration_principle',50)->nullable();
            $table->string('arbitration_interest',50)->nullable();
            $table->string('billing_company',10)->default('NO')->comment('YES','NO')->nullable();
            $table->string('billing_company_person_name',100)->nullable();
            $table->string('billing_company_contact_person',100)->nullable();
            $table->string('billing_company_phone',50)->nullable();
            $table->string('billing_company_email',50)->nullable();
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
        Schema::dropIfExists('provoider_informations');
    }
};
