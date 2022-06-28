<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEggProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egg_productions', function (Blueprint $table) {
            $table->id();
             $table->string('district');
            $table->integer('layers');
            $table->integer('duck');
            $table->integer('chicken_egg');
            $table->integer('duck_egg');
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
        Schema::dropIfExists('egg_productions');
    }
}
