<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgricultureProducesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculture_produces', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->string('food_area');
            $table->string('vegetable_area');
            $table->string('fruits_area');

            $table->string('food_percentage');
            $table->string('vegetable_percentage');
            $table->string('fruits_percentage');
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
        Schema::dropIfExists('agriculture_produces');
    }
}
