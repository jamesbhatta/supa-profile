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
            $table->string('normal_road');
            $table->string('garvel_road');
            $table->string('black_road');
            $table->string('total_road');
            $table->string('province_percentage');
            $table->string('road_density');
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
