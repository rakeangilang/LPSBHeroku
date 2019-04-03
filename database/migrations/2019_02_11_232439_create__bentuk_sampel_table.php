<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBentukSampelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bentuksampel', function (Blueprint $table) {
            $table->increments('IDKatalog');
            $table->integer('Ekstrak')->nullable()->default(null);
            $table->integer('Simplisia')->nullable()->default(null);
            $table->integer('Cairan')->nullable()->default(null);
            $table->integer('Serbuk')->nullable()->default(null);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bentuksampel');
    }
}
