<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_budgets', function (Blueprint $table) {
            $table->id();
            $table->string('fiscal_year');
            $table->integer('running_budget');
            $table->integer('capitalize_budget');
            $table->integer('running_expenses');
            $table->integer('running_expenses_percentage');
            $table->integer('capitalize_expenses');
            $table->integer('capitalize_expenses_percentage');

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
        Schema::dropIfExists('total_budgets');
    }
}
