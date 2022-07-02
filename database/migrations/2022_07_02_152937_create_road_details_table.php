<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road_details', function (Blueprint $table) {
            $table->id();
            $table->string('road_detail');
            $table->string('province_1');
            $table->string('province_2');
            $table->string('province_3');
            $table->string('province_4');
            $table->string('province_5');
            $table->string('province_6');
            $table->string('province_7');
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
        Schema::dropIfExists('road_details');
    }
}
