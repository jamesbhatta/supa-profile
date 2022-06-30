<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReligionPopulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('religion_populations', function (Blueprint $table) {
            $table->id();
             $table->string('district');
            $table->integer('hindu');
            $table->integer('baudha');
            $table->integer('islam');
            $table->integer('kirat');
            $table->integer('christian');
            $table->integer('prakirty');
            $table->integer('other');
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
        Schema::dropIfExists('religion_populations');
    }
}
