<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSampelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampel', function (Blueprint $table) {
            $table->bigInteger('IDPesanan');
            $table->integer('NoSampel')->nullable(true);
            $table->string('JenisSampel');
            $table->text('BentukSampel');
            $table->string('Kemasan');
            $table->integer('Jumlah');
            $table->string('JenisAnalisis');
            $table->bigInteger('HargaSampel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sampel');
    }
}
