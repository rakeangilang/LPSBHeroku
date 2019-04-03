<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecordsToStatuspelacakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statuspelacakan', function (Blueprint $table) {
            //
        });

        $data_status = [
            [
                'IDStatus'=>1,
                'Status'=>'Pesanan dibuat'
            ],
            [
                'IDStatus'=>2,
                'Status'=>'Pesanan divalidasi'
            ],
            [
                'IDStatus'=>3,
                'Status'=>'Dikaji ulang'
            ],
            [
                'IDStatus'=>4,
                'Status'=>'Dianalisis'
            ],
            [
                'IDStatus'=>5,
                'Status'=>'Analisis selesai'
            ],
            [
                'IDStatus'=>6,
                'Status'=>'Pesanan dibatalkan pelanggan'
            ],
            [
                'IDStatus'=>7,
                'Status'=>'Pesanan dibatalkan sistem'
            ],
            [
                'IDStatus'=>21,
                'Status'=>'Pembayaran divalidasi'
            ],
            [
                'IDStatus'=>22,
                'Status'=>'Sampel diterima dan divalidasi'
            ],
            [
                'IDStatus'=>51,
                'Status'=>'Sisa sampel dikirim'
            ],
            [
                'IDStatus'=>52,
                'Status'=>'Sertifikat dikirim'
            ]
        ];

        DB::table('statuspelacakan')->insert($data_status);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statuspelacakan', function (Blueprint $table) {
            //
        });
    }
}
