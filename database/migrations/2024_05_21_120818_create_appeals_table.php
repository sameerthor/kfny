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
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            $table->string('basic_intake_id',11);
            $table->string('noa_deadline',55)->nullable();
            $table->string('noa_filed',55)->nullable();
            $table->string('appeal_type',55)->nullable();
            $table->string('appeal_docket',55)->nullable();
            $table->string('appeal_by',55)->nullable();
            $table->string('app_brief_due',55)->nullable();
            $table->string('app_brief_filed',55)->nullable();
            $table->string('app_response_due',55)->nullable();
            $table->string('app_response_filed',55)->nullable();
            $table->string('app_reply_due',55)->nullable();
            $table->string('app_reply_filed',55)->nullable();
            $table->string('camp_date',55)->nullable();
            $table->string('camp_time',55)->nullable();
            $table->string('camp_location',55)->nullable();
            $table->string('oral_argument_date',55)->nullable();
            $table->string('master_arbitrator',55)->nullable();
            $table->string('app_decision',55)->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('appeals');
    }
};
