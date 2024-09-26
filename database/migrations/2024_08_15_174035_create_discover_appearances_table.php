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
        Schema::create('discover_appearances', function (Blueprint $table) {
            $table->id();
            $table->integer("discovery_id");
            $table->string("appearance_type")->nullable();
            $table->string("date")->nullable();
            $table->string("time")->nullable();
            $table->string("location")->nullable();
            $table->string("inperson_vertual")->nullable();
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
        Schema::dropIfExists('discover_appearances');
    }
};
