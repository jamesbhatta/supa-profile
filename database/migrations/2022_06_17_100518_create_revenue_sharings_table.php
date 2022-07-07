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
            $table->string('province_revenue');
            $table->string('province_revenue_percentage');
            $table->string('local_level');
            $table->string('local_level_revenue');
            $table->string('local_level_revenue_percentage');
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
