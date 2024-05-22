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
        Schema::create('trial_dates', function (Blueprint $table) {
            $table->id();
            $table->string('trial_id', 11);
            $table->string('trial_date', 55)->nullable();
            $table->string('time_on', 55)->nullable();;
            $table->string('calender', 55)->nullable();;
            $table->string('prima_facie', 55)->nullable();;
            $table->string('judge', 55)->nullable();
            $table->string('plaintiff_witness', 255)->nullable();;
            $table->string('defence_witness', 255)->nullable();;
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
        Schema::dropIfExists('trial_dates');
    }
};
