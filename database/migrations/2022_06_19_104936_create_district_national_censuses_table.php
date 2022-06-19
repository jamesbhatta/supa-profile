<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictNationalCensusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_national_censuses', function (Blueprint $table) {
            $table->id();
            $table->string('secctor');
            $table->string('population');
            $table->string('house_number');
            $table->string('family_number');
            $table->string('male');
            $table->string('female');
            $table->string('ratio');
            $table->string('family_size');
            $table->string('increase_rate');
            $table->string('density');
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
        Schema::dropIfExists('district_national_censuses');
    }
}
