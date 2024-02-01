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
        Schema::create('settlement_judge_details', function (Blueprint $table) {
            $table->id();
            $table->integer('set_id')->nullable();
            $table->integer('provider_id')->nullable();
            $table->integer('basic_intake_id')->nullable();
            $table->string('date_rec', 50)->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->decimal('principle', 15, 2)->nullable();
            $table->decimal('interest', 15, 2)->nullable();
            $table->decimal('attorney_fees', 15, 2)->nullable();
            $table->decimal('filling_fees', 15, 2)->nullable();
            $table->decimal('other', 15, 2)->nullable();
            $table->string('check_number', 50)->nullable();
            $table->date('check_date')->nullable();
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
        Schema::dropIfExists('settlement_judge_details');
    }
};
