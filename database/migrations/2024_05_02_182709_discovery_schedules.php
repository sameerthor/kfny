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
        Schema::create('discovery_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('discovery_schedule', 50)->nullable();
            $table->string('demand_due', 50)->nullable();
            $table->string('resp_due', 50)->nullable();
            $table->string('ebt_deadlines', 50)->nullable();
            $table->string('next_desc_conf', 50)->nullable();
            $table->string('noi_due', 50)->nullable();
            $table->integer('discovery_id');
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
        //
    }
};
