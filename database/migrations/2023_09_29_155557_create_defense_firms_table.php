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
        Schema::create('defense_firms', function (Blueprint $table) {
            $table->id();
            $table->string('firm_name',80)->nullable();
            $table->string('name',80)->nullable();
            $table->string('address',225)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('zip_code',20)->nullable();
            $table->string('phone_number',50)->nullable();
            $table->string('fax_number',50)->nullable();
            $table->string('best_contact_person',50)->nullable();
            $table->string('known_email',50)->nullable();
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
        Schema::dropIfExists('defense_firms');
    }
};
