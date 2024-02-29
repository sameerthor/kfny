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
        Schema::create('basic_intakes', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->unsignedBigInteger('dj_judge_id')->nullable();
            $table->unsignedBigInteger('venue_county')->default('0')->nullable();
            $table->string('venue', 50)->nullable();
            $table->unsignedBigInteger('is_ligitation')->default('1')->nullable()->comment('1=ligitation,2=arbitration3=dj'); 
            $table->string('carrier_attorney', 50)->nullable();
            $table->string('index_number', 50)->nullable();
            $table->string('status', 50)->default('1')->nullable();
            $table->text('attorney_notes')->nullable();
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
        Schema::dropIfExists('basic_intakes');
    }
};
