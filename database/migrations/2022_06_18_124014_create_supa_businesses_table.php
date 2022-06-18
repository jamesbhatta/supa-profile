<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupaBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supa_businesses', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('laghu_quantity');
            $table->string('laghu_capital');
            $table->integer('gahrelu_quantity');
            $table->string('gharelu_capital');
            $table->integer('sana_quantity');
            $table->string('sana_capital');
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
        Schema::dropIfExists('supa_businesses');
    }
}
