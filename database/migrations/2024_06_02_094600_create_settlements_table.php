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
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->string('basic_intake_id');
            $table->string('date')->nullable();
            $table->string('type')->nullable();
            $table->string('person_settled')->nullable();
            $table->string('email_fax')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('judgement_appl')->nullable();
            $table->string('judgement_date')->nullable();
            $table->string('noe_judgement')->nullable();
            $table->string('sent_to_marshal')->nullable();
            $table->string('marshal_fees')->nullable();
            $table->string('principle_percent')->nullable();
            $table->string('principle_amount')->nullable();
            $table->string('new_principle')->nullable();
            $table->string('new_total')->nullable();
            $table->string('interest_percent')->nullable();
            $table->string('interest_amount')->nullable();
            $table->string('interest_from')->nullable();
            $table->string('interest_from_date')->nullable();
            $table->string('additional_interest')->nullable();
            $table->string('additional_attorney_fees')->nullable();
            $table->string('additional_costs')->nullable();
            $table->text('notes')->nullable();
            $table->string('attorney_fees')->nullable();
            $table->string('filing_fees')->nullable();
            $table->string('costs')->nullable();
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
        Schema::dropIfExists('settlements');
    }
};
