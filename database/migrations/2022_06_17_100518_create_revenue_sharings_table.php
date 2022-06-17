<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenueSharingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenue_sharings', function (Blueprint $table) {
            $table->id();
            $table->string('province');
            $table->integer('province_revenue');
            $table->integer('province_revenue_percentage');
            $table->integer('local_level');
            $table->integer('local_level_revenue');
            $table->integer('local_level_revenue_percentage');
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
        Schema::dropIfExists('revenue_sharings');
    }
}
