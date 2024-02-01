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
        Schema::create('judges', function (Blueprint $table) {
            $table->id();
            $table->string('name',80)->nullable();
            $table->string('vanue',225)->nullable();
            $table->string('court',50)->nullable();
            $table->string('email',50)->nullable();
            $table->string('phone_number',50)->nullable();
            $table->string('address',225)->nullable();
            $table->string('court_attorney_name',50)->nullable();
            $table->string('court_attorney_email',100)->nullable();
            $table->string('court_attorney_phone_number',100)->nullable();
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
        Schema::dropIfExists('judges');
    }
};
