<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalPopulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_populations', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->string('municipality_name');
            $table->integer('house_number');
            $table->integer('male_number');
            $table->integer('female_number');
            $table->string('avg_house_number');
            $table->string('anupat');
            $table->string('fml_edu_percentage');
            $table->string('ml_edu_percentage');
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
        Schema::dropIfExists('local_populations');
    }
}
