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
        Schema::table('arbitrators', function (Blueprint $table) {
             // change() tells the Schema builder that we are altering a table
             $table->string('email')->nullable()->change();
             $table->string('phone_number')->nullable()->change();
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       

    }
};
