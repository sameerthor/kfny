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
        Schema::create('motions', function (Blueprint $table) {
            $table->id();
            $table->string('basic_intake_id', 50)->nullable();
            $table->string('motion_type', 50)->nullable();
            $table->string('x_motion_type', 50)->nullable();
            $table->string('return_date', 50)->nullable();
            $table->string('decisions', 50)->nullable();
            $table->string('decision_date', 50)->nullable();
            $table->string('prima_facie', 50)->nullable();
            $table->string('judge', 50)->nullable();
            $table->string('part', 255)->nullable();
            $table->string('noe_date', 50)->nullable();
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
        Schema::dropIfExists('motions');
    }
};
