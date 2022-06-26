<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumableFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_food', function (Blueprint $table) {
            $table->id();
             $table->string('province');
            $table->integer('population');
            $table->integer('rice');
            $table->integer('maize');
            $table->integer('kodo');
            $table->integer('phppar');
            $table->integer('wheat');
            $table->integer('Barley');
            $table->integer('production');
            $table->integer('required_food');
            $table->integer('saving');
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
        Schema::dropIfExists('consumable_food');
    }
}
