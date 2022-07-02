<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelthFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helth_flows', function (Blueprint $table) {
            $table->id();
             $table->string('detail');
            $table->integer('national_from');
            $table->integer('national_to');
            $table->integer('provincinal_from');
            $table->integer('provincinal_to');
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
        Schema::dropIfExists('helth_flows');
    }
}
