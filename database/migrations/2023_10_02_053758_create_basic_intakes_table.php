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
        Schema::create('basic_intakes', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 80)->nullable();
            $table->string('last_name', 80)->nullable();
            $table->string('doa', 80)->nullable();
            $table->string('dpo', 80)->nullable();
            $table->string('claim_number', 80)->nullable();
            $table->string('policy_number', 80)->nullable();
            $table->string('address', 225)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->string('self_insh', 50)->default('false')->nullable();
            $table->string('insured', 50)->nullable();
            $table->string('index_no', 50)->nullable();
            $table->unsignedBigInteger('insurance_company_id')->nullable();
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->unsignedBigInteger('defense_firm_id')->nullable();
            $table->unsignedBigInteger('venue_county')->default('0')->nullable();
            $table->unsignedBigInteger('is_ligitation')->default('1')->nullable()->comment('1=ligitation,2=arbitration'); 
            $table->string('phone_number', 50)->nullable();
            $table->string('fax_number', 50)->nullable();
            $table->string('best_contact_person', 50)->nullable();
            $table->string('known_email', 50)->nullable();
            $table->string('carrier_attorney', 50)->nullable();
            $table->string('aaa_number', 50)->nullable();
            $table->string('appeal_docket', 50)->nullable();
            $table->string('status', 50)->default('1')->nullable();
            $table->text('attorney_notes')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('basic_intakes');
    }
};
