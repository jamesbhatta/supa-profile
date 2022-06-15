<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeographicalAreaPopulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geographical_area_populations', function (Blueprint $table) {
            $table->id();
            $table->string('sector');
            $table->integer('population');
            $table->integer('area');
            $table->integer('density');
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
        Schema::dropIfExists('geographical_area_populations');
    }
}
