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
        Schema::create('filling_informations', function (Blueprint $table) {
            $table->id();
            $table->string('filling_date_s_c', 50)->nullable();
            $table->string('amended_s_c', 50)->nullable();
            $table->string('date_serve_s_c', 50)->nullable();
            $table->string('service_complaint_s_c', 50)->nullable();
            $table->string('answer_rec', 50)->nullable();
            $table->string('answer_due_by', 50)->nullable();
            $table->string('answer_extension', 50)->nullable();
            $table->string('default_letter', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('filling_date_ar', 50)->nullable();
            $table->string('date_serve_ar', 50)->nullable();
            $table->string('response_rec', 50)->nullable();
            $table->string('adjuster_name', 50)->nullable();
            $table->string('adjuster_phone', 50)->nullable();
            $table->string('reason_to_pay', 50)->nullable();
            $table->unsignedBigInteger('basic_intake_id')->nullable();

            // Assuming basic_intake_id is a foreign key to some other table
            // Uncomment the line below to add a foreign key constraint
            // $table->foreign('basic_intake_id')->references('id')->on('related_table_name');
            
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
        Schema::dropIfExists('filling_informations');
    }
};
