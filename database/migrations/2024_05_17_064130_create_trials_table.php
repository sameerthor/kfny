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
        Schema::create('trials', function (Blueprint $table) {
            $table->id();
            $table->string('basic_intake_id', 11);
            $table->string('not_filed', 55)->nullable();
            $table->string('not_received', 55)->nullable();
            $table->string('deadline', 55)->nullable();
            $table->string('sjm_deadline', 55)->nullable();
            $table->string('trial_decision', 55)->nullable();
            $table->string('trial_noe_date', 55)->nullable();
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
        Schema::dropIfExists('trials');
    }
};
