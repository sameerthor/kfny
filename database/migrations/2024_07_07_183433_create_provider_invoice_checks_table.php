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
        Schema::create('provider_invoice_checks', function (Blueprint $table) {
            $table->id();
            $table->integer("invoice_id");
            $table->string("check_number")->nullable();
            $table->string("check_date")->nullable();
            $table->string("date_received")->nullable();
            $table->string("amount")->nullable();
            $table->string("issued_by")->nullable();
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
        Schema::dropIfExists('provider_invoice_checks');
    }
};
