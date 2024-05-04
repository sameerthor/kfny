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
        Schema::create('discovery', function (Blueprint $table) {
            $table->id();
            $table->string('d_demands', 50)->nullable();
            $table->string('p_resp', 50)->nullable();
            $table->string('p_demands', 50)->nullable();
            $table->string('d_resp', 50)->nullable();
            $table->string('d_3101', 50)->nullable();
            $table->string('p_3101', 50)->nullable();
            $table->string('d_notice', 50)->nullable();
            $table->string('p_nta_resp', 50)->nullable();
            $table->string('p_notice', 50)->nullable();
            $table->string('d_nta_resp', 50)->nullable();
            $table->string('good_faith_let', 50)->nullable();
            $table->string('note_of_issue', 50)->nullable();
            $table->string('d_supp_demand', 50)->nullable();
            $table->string('p_supp_resp', 50)->nullable();
            $table->string('p_supp_demand', 50)->nullable();
            $table->string('d_supp_resp', 50)->nullable();
            $table->string('party_disc_date', 50)->nullable();
            $table->string('party_disc_text', 250)->nullable();
            $table->string('subpoena_date', 50)->nullable();
            $table->string('subpoena_text', 250)->nullable();
            $table->text('notes')->nullable();
            $table->integer('basic_intake_id');
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
