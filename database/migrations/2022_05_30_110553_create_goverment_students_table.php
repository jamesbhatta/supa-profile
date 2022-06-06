<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovermentStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goverment_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('class');
            $table->integer('boys_num');
            $table->integer('girl_num');
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
        Schema::dropIfExists('goverment_students');
    }
}
