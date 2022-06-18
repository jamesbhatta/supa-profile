<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_papers', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->integer('daily');
            $table->integer('half_weakly');
            $table->integer('weakly');
            $table->integer('fortnightly');
            $table->integer('monthly');
            $table->integer('monthly_twise');
            $table->integer('monthly_thirds');
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
        Schema::dropIfExists('news_papers');
    }
}
