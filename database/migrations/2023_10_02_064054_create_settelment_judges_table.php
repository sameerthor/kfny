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
        Schema::create('settlement_judges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('basic_intake_id')->nullable();
            $table->string('decision_date', 50)->nullable();
            $table->string('settlement_date', 50)->nullable();
            $table->string('settled_with', 50)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('email_fax', 50)->nullable();
            $table->string('principal_term', 50)->nullable();
            $table->decimal('principal_amount', 15, 2)->nullable();
            $table->decimal('new_total', 15, 2)->nullable();
            $table->string('interest_term', 50)->nullable();
            $table->decimal('interest_amount', 15, 2)->nullable();
            $table->string('interest_from', 50)->nullable();
            $table->string('settled_other', 50)->nullable();
            $table->decimal('fee_charged', 15, 2)->nullable();
            $table->decimal('attorney_fees', 15, 2)->nullable();
            $table->decimal('other_cost', 15, 2)->nullable();
            $table->string('judgement_date')->nullable();
            $table->decimal('additional_cost', 15, 2)->nullable();
            $table->decimal('additional_interest', 15, 2)->nullable();
            $table->string('sent_to_marshal', 50)->nullable();
            $table->decimal('marshal_fee', 15, 2)->nullable();
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
        Schema::dropIfExists('settlement_judges');
    }
};
