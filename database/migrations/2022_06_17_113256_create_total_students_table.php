<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_students', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->integer('g_male');
            $table->integer('g_fmale');
            $table->integer('p_male');
            $table->integer('p_fmale');
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
        Schema::dropIfExists('total_students');
    }
}
