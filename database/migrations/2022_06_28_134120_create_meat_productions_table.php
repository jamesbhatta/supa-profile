<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meat_productions', function (Blueprint $table) {
            $table->id();
             $table->string('district');
            $table->integer('buff');
            $table->integer('mutton');
            $table->integer('chewan');
            $table->integer('pork');
            $table->integer('chicken');
            $table->integer('duck');
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
        Schema::dropIfExists('meat_productions');
    }
}
