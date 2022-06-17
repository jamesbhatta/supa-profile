<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinceRoadTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_road_types', function (Blueprint $table) {
            $table->id();
            $table->string('province');
            $table->integer('normal_road');
            $table->integer('garvel_road');
            $table->integer('black_road');
            $table->integer('total_road');
            $table->integer('province_percentage');
            $table->integer('road_density');
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
        Schema::dropIfExists('province_road_types');
    }
}
