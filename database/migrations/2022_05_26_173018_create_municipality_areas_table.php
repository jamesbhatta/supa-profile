<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalityAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipality_areas', function (Blueprint $table) {
            $table->id();
            $table->integer('muncipality_area');
            
            $table->string('district_name');
            
            $table->integer('ward_count');
            $table->unsignedBigInteger('municipalitiy_id');
            $table->foreign('municipalitiy_id')->references('id')->on('municipalities')->onDelete('cascade');
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
        Schema::dropIfExists('municipality_areas');
    }
}
