<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictPopulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_populations', function (Blueprint $table) {
            $table->id();
             $table->string('district');
            $table->integer('house_number');
            $table->integer('average_house_number');
            $table->integer('female_number');
            $table->integer('male_number');
            $table->integer('population_percentage');
            $table->integer('laingik_anupat');
            $table->integer('population_increse_rate');
            $table->integer('dencity');
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
        Schema::dropIfExists('district_populations');
    }
}
