<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrrigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irrigations', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->string('area');
            $table->string('arable_land');
            $table->string('cultivated_land');
            $table->string('yearly');
            $table->string('half_yearly');
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
        Schema::dropIfExists('irrigations');
    }
}
