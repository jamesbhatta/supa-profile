<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilkProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milk_productions', function (Blueprint $table) {
            $table->id();
             $table->string('district');
            $table->integer('cow');
            $table->integer('cow_milk');
            $table->integer('buffalo');
            $table->integer('buffalo_milk');
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
        Schema::dropIfExists('milk_productions');
    }
}
