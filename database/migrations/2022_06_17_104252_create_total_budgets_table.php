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
            $table->string('running_budget');
            $table->string('capitalize_budget');
            $table->string('running_expenses');
            $table->string('running_expenses_percentage');
            $table->string('capitalize_expenses');
            $table->string('capitalize_expenses_percentage');

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
