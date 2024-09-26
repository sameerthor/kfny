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
        Schema::create('employee_calender_relations', function (Blueprint $table) {
            $table->id();
            $table->string("appearance_type")->nullable()->comment('eou=1,motion=2,trial=3,arbitration=4,appeal=5,discovery=6');
            $table->string("appearance_id")->nullable();
            $table->string("appearance_column")->nullable();
            $table->string("appearance_model")->nullable();
            $table->string("employee_id")->nullable();
            $table->unique(array('appearance_id', 'appearance_column','appearance_type'),'table_unique_index');
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
        Schema::dropIfExists('employee_calender_relations');
    }
};
