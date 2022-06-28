<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovermentSchoolStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goverment_school_students', function (Blueprint $table) {
            $table->id();
            $table->string('classes');
            $table->integer('girls1_12');
            $table->integer('boys1_12');
            $table->integer('girls1_5');
            $table->integer('boys1_5');
            $table->integer('girls6_8');
            $table->integer('boys6_8');
            $table->integer('girls9_10');
            $table->integer('boys9_10');
            $table->integer('girls11_12');
            $table->integer('boys11_12');
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
        Schema::dropIfExists('goverment_school_students');
    }
}
