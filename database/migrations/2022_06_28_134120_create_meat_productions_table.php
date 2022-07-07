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
            $table->string('buff');
            $table->string('mutton');
            $table->string('chewan');
            $table->string('pork');
            $table->string('chicken');
            $table->string('duck');
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
