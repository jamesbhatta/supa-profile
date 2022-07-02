<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalPopulationCensusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_population_censuses', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->string('population');
            $table->string('dencity');
            $table->string('census_house_number');
            $table->string('house_number');
            $table->string('male');
            $table->string('female');
            $table->string('ratio');
            $table->string('avg_family_size');
            $table->string('increase_rate');
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
        Schema::dropIfExists('national_population_censuses');
    }
}
