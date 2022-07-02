<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseas', function (Blueprint $table) {
            $table->id();
            $table->string('dises');
            $table->string('national_number');
            $table->string('national_percentage');
            $table->string('provincenal_number');
            $table->string('provincenal_percentage');
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
        Schema::dropIfExists('diseas');
    }
}
