<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSahakarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sahakaris', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->string('bahu_udesye')->nullable();
            $table->string('agriculture')->nullable();
            $table->string('loan')->nullable();
            $table->string('helth')->nullable();
            $table->string('tele_comunication')->nullable();
            $table->string('electricity')->nullable();
            $table->string('jadibuti')->nullable();
            $table->string('batabaran')->nullable();
            $table->string('prakasan')->nullable();
            $table->string('other')->nullable();
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
        Schema::dropIfExists('sahakaris');
    }
}
