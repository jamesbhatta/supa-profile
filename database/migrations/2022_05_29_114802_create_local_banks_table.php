<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_banks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->unsignedBigInteger('municipalities_id');
            $table->foreign('municipalities_id')->references('id')->on('municipalities')->onDelete('cascade');
            $table->unsignedBigInteger('banks_id');
            $table->foreign('banks_id')->references('id')->on('banks')->onDelete('cascade');
            $table->integer('bank_number');
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
        Schema::dropIfExists('local_banks');
    }
}
