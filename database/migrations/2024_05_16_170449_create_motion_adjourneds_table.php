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
        Schema::create('motion_adjourneds', function (Blueprint $table) {
            $table->id();
            $table->string('motion_id', 11);
            $table->string('adj_date', 55)->nullable();
            $table->string('time_on', 55)->nullable();
            $table->string('calender', 255)->nullable();
            $table->string('x_mot_due', 55)->nullable();
            $table->string('x_mot_filed', 55)->nullable();
            $table->string('opp_due', 55)->nullable();
            $table->string('opp_filed', 55)->nullable();
            $table->string('reply_due', 55)->nullable();
            $table->string('reply_filed', 55)->nullable();
            $table->string('x_mot_reply_due', 55)->nullable();
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
        Schema::dropIfExists('motion_adjourneds');
    }
};
