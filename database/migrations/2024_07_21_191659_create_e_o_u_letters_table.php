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
        Schema::create('e_o_u_letters', function (Blueprint $table) {
            $table->id();
            $table->integer("eou_id");
            $table->string("eou_letter_date")->nullable();
            $table->string("date_requested")->nullable();
            $table->string("eou_response_letter")->nullable();
            $table->string("adjourned_date")->nullable();
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
        Schema::dropIfExists('e_o_u_letters');
    }
};
