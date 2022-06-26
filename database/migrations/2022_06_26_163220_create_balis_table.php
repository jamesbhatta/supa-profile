<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balis', function (Blueprint $table) {
            $table->id();
            $table->string('crops');
            $table->string('area1');
            $table->string('production1');
            $table->string('productivity1');
            $table->string('area2');
            $table->string('production2');
            $table->string('productivity2');
            $table->string('type');
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
        Schema::dropIfExists('balis');
    }
}
