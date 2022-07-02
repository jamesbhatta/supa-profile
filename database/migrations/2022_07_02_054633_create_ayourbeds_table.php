<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyourbedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayourbeds', function (Blueprint $table) {
            $table->id();
             $table->string('district');
            $table->integer('pardesika');
            $table->integer('jilla');
            $table->integer('pharmesi');
            $table->integer('arogye_sewa');
            $table->integer('phc');
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
        Schema::dropIfExists('ayourbeds');
    }
}
