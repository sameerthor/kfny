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
        Schema::create('filing_informations', function (Blueprint $table) {
            $table->id();
            $table->string('filing_date', 50)->nullable();
            $table->string('amended_filing', 50)->nullable();
            $table->string('date_serve', 50)->nullable();
            $table->string('date_served', 50)->nullable();
            $table->string('service_type', 50)->nullable();
            $table->string('aos_filing_date', 50)->nullable();
            $table->string('service_complete', 50)->nullable();
            $table->string('ans_due_by', 50)->nullable();
            $table->string('ans_ext', 50)->nullable();
            $table->string('ans_rec', 50)->nullable();
            $table->string('default_letter', 50)->nullable();
            $table->string('default_fileno', 50)->nullable();
            $table->string('default_date', 50)->nullable();
            $table->string('default_deadline', 50)->nullable();
            $table->unsignedBigInteger('basic_intake_id')->nullable();
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
        Schema::dropIfExists('filling_informations');
    }
};
