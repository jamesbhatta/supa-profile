<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinceBusinesslsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_businessls', function (Blueprint $table) {
            $table->id();
            $table->string('province');
            $table->integer('agriculture');
            $table->integer('construction');
            $table->integer('energy');
            $table->integer('communication');
            $table->integer('production');
            $table->integer('mine');
            $table->integer('service');
            $table->integer('tourism');
            $table->integer('business');
            $table->string('investment');
            $table->integer('employeement');
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
        Schema::dropIfExists('province_businessls');
    }
}
