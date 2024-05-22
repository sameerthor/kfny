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
        Schema::create('arbitrations', function (Blueprint $table) {
            $table->id();
            $table->string('basic_intake_id',11);
            $table->string('arbitration_date',55)->nullable();
            $table->string('arbitrator',55)->nullable();
            $table->string('rebutal_uploaded',55)->nullable();
            $table->string('arbitration_status',55)->nullable();
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
        Schema::dropIfExists('arbitrations');
    }
};
