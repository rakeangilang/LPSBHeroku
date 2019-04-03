<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPelacakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelacakan', function (Blueprint $table) {
            //
            $table->tinyInteger('KirimSampel')->default(1)->after('IDStatus');
            $table->tinyInteger('Pembayaran')->default(1)->after('IDStatus');

            $table->dropColumn('SertifikatDiterima');
         //   $table->renameColumn('SisaDiterima', 'SisaSampel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelacakan', function (Blueprint $table) {
            //
            $table->dropColumn('KirimSampel');
            $table->dropColumn('Pembayaran');

            $table->boolean('SertifikatDiterima')->nullable();
           // $table->renameColumn('SisaSampel', 'SisaDiterima');
        });
    }
}
