<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrawingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drawings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prevx');
            $table->integer('prevy');
            $table->integer('curx');
            $table->integer('cury');
            $table->string('collor');
            $table->string('size');
            $table->string('stroke');
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
        Schema::dropIfExists('drawings');
    }
}
