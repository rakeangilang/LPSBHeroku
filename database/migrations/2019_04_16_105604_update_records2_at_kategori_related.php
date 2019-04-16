<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRecords2AtKategoriRelated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('kategori')->where('IDKategori', 1)->update([
            "FotoKategori"=>"https://powerful-tor-69480.herokuapp.com/elpsb/api/kategoriImages/fitokimia.png"
        ]);

        DB::table('kategori')->where('IDKategori', 2)->update([
            "FotoKategori"=>"https://powerful-tor-69480.herokuapp.com/elpsb/api/kategoriImages/mikrobiologi.png"
        ]);

        // Put images to all katalogs
        $katalogs = DB::table('katalog')->select('IDKatalog', 'FotoKatalog')->get();

        $katalog_id_count = 1;
        foreach ($katalogs as $katalog) {
            DB::table('katalog')->where('IDKatalog', $katalog_id_count)->update([
                "FotoKatalog" => "https://powerful-tor-69480.herokuapp.com/elpsb/api/katalogImages/fitokimia.png"
            ]);
            $katalog_id_count++;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
