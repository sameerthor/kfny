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
        Schema::create('settlement_checks', function (Blueprint $table) {
            $table->id();
            $table->string('settlement_id');
            $table->string('date_received')->nullable();
            $table->string('total')->nullable();
            $table->string('principle')->nullable();
            $table->string('interest')->nullable();
            $table->string('attorney_fees')->nullable();
            $table->string('filing_fees')->nullable();
            $table->string('costs')->nullable();
            $table->string('other')->nullable();
            $table->string('check')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('settlement_checks');
    }
};
