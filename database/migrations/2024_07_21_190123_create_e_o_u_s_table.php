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
        Schema::create('e_o_u_s', function (Blueprint $table) {
            $table->id();
            $table->string("insurance_company")->nullable();
            $table->string("provider")->nullable();
            $table->string("carrier_attorney")->nullable();
            $table->string("eou_status")->nullable();
            $table->string("amount_dispute")->nullable();
            $table->string("date_service")->nullable();
            $table->string("assigner")->nullable();
            $table->string("claim_number")->nullable();
            $table->string("eou_date")->nullable();
            $table->string("eou_time")->nullable();
            $table->string("eou_location")->nullable();
            $table->string("eou_witness")->nullable();
            $table->string("eou_attorney")->nullable();
            $table->string("witness_fee_demanded")->nullable();
            $table->string("witness_fee_agreed")->nullable();
            $table->string("witness_fee_received")->nullable();
            $table->string("eou_withdrawl_date")->nullable();
            $table->string("witness_fee_outstanding")->nullable();
            $table->string("eou_transcript_received")->nullable();
            $table->string("eou_transcript_deadline")->nullable();
            $table->string("eou_transcript_sent")->nullable();
            $table->string("first_post_eou_verification")->nullable();
            $table->string("response_deadline")->nullable();
            $table->string("second_post_eou_verification")->nullable();
            $table->string("response_post_eou_verification")->nullable();
            $table->string("denial_date")->nullable();
            $table->string("person_settled")->nullable();
            $table->string("settlement_date")->nullable();
            $table->string("email_contact")->nullable();
            $table->string("phone_contact")->nullable();
            $table->string("principle_settled")->nullable();
            $table->string("attorney_fees_settled")->nullable();
            $table->string("principle_settled_outstanding")->nullable();
            $table->string("attorney_fees_settled_outstanding")->nullable();
            $table->string("principle_received")->nullable();
            $table->string("principle_received_date")->nullable();
            $table->string("attorney_fees_received")->nullable();
            $table->string("attorney_fees_received_date")->nullable();
            $table->text("notes")->nullable();
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
        Schema::dropIfExists('e_o_u_s');
    }
};
