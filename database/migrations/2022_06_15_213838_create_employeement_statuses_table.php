<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeementStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeement_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('province');
            $table->integer('unemployeement');
            $table->integer('unemployeement_ratio');
            $table->integer('labour_force_rate');
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
        Schema::dropIfExists('employeement_statuses');
    }
}
