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
        Schema::create('task_assigneds', function (Blueprint $table) {
            $table->id();
            $table->integer("employee_id")->nullable();
            $table->integer("file_no")->nullable();
            $table->string("task_type")->nullable();
            $table->text("task_notes")->nullable();
            $table->string("task_deadline")->nullable();
            $table->string("assigned_calender")->default("1");
            $table->string("task_status")->default("pending");
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
        Schema::dropIfExists('task_assigneds');
    }
};
