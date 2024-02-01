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
        Schema::create('basic_intake_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('basic_intake_id')->nullable();
            $table->string('dos_from', 50)->nullable();
            $table->string('dos_to', 50)->nullable();
            $table->decimal('amount', 15, 2)->default('0.00')->nullable();
            $table->string('partial_pay', 50)->nullable();
            $table->string('out_st', 50)->nullable();
            $table->string('pom', 50)->nullable();
            $table->string('ver_req', 50)->nullable();
            $table->string('ver_resp', 50)->nullable();
            $table->string('denial_date', 50)->nullable();
            $table->string('denial_reason', 500)->nullable();
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
        Schema::dropIfExists('basic_intake_details');
    }
};
