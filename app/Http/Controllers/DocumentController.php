<?php

namespace App\Http\Controllers;

use App\User;
use App\DokumenPesanan;
use App\Pelacakan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function getPermohonanAnalisis($pes, User $user, Request $request)
    {
        try{
            $id_pesanan = $pes;
            //$doc_name = DokumenPesanan::select('PermohonanAnalisis')->where('IDPesanan', $id_pesanan)->first()->PermohonanAnalisis;
            // Set doc name while admin's apps not yet developed
            $doc_name = "permohonan_analisis.docx";
            $filename="abc.docx";
            $headers = ['Content-Type'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'Content-Disposition'=> 'attachment; filename="'.$filename.'"'];

            // Jika dokumen tidak tersedia
            if($doc_name==null)
            {
                return response()->json(['success'=>false, 'message'=>"Dokumen tidak tersedia",'Status'=>500], 200);
            }
            
            else
            {
                $doc_path = storage_path('permohonan_analisis/'.$doc_name);
                
                return response()->file($doc_path, $headers);
                return response()->download($doc_path, $doc_name, [], 'inline');
            }
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    public function getTandaTerimaSampel($pes, User $user, Request $request)
    {
        try{
            $nama = "Sutedjo Purnomo";
        $perusahaan = "PT. Makmur Sejahtera";
        $alamat = "Perum. Kalibaru Permai Blok C1 No.1, Cilodong, Depok";
        $no_hp = "6281712312";
        $email = "sutedjo1945@gmail.com";
        $no_pesanan = "25/3/19";
        $no_npwp = "123456789";
        $nama_penerima = "Mochammad Suryono Oyon";

        $template_path = storage_path('templates/Template_Permohonan_Analisis.docx');
        $hasil_path = storage_path('permohonan_analisis');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);
        $templateProcessor->setValue('NamaLengkap', $nama);
        $templateProcessor->setValue('Perusahaan', $perusahaan);
        $templateProcessor->setValue('Alamat', $alamat);
        $templateProcessor->setValue('NoHP', $no_hp);
        $templateProcessor->setValue('Email', $email);
        $templateProcessor->setValue('NoNPWP', $no_npwp);
        $templateProcessor->setValue('NoPesanan', $no_pesanan);
        $templateProcessor->setValue('NamaPenerima', $nama_penerima);
        $templateProcessor->setImageValue('TTD', array('path' => storage_path('templates/ttd.png'), 'width'=>75, 'height'=>75));

        $filename = 'Hasil ' . $nama . '.docx';
 //     Storage::put('')
        $base_name = 'Hasil ' . $nama;
        $hasil_path = storage_path('permohonan_analisis/'.$filename);
        $templateProcessor->saveAs($hasil_path);
        $headers = ['Content-Type'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'Content-Disposition'=> 'attachment; filename="'.$filename.'"'];

        return response()->download($hasil_path, $base_name . '.docx', $headers, 'inline');
        // ahahaha


            $id_pesanan = $pes;
            $doc_name = DokumenPesanan::select('TandaTerimaSampel')->where('IDPesanan', $id_pesanan)->first()->TandaTerimaSampel;
            // Set doc name while admin's apps not yet developed
            $doc_name = "tanda_terima_sampel.docx";

            // Jika dokumen tidak tersedia
            if($doc_name==null)
            {
                return response()->json(['success'=>false, 'message'=>"Dokumen tidak tersedia",'Status'=>500], 200);
            }

            else
            {
                //$doc_path = storage_path('tanda_terima_sampel/'.$doc_name);
                $doc_path = storage_path('tanda_terima_sampel/Hasil Sutedjo Purnomo.docx');

                return response()->download($doc_path, $doc_name, [], 'inline');
            }
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    public function getSertifikat($pes, User $user, Request $request)
    {
        try{
            $id_pesanan = $pes;
            $doc_name = DokumenPesanan::select('Sertifikat')->where('IDPesanan', $id_pesanan)->first()->Sertifikat;
            // Set doc name while admin's apps not yet developed
            $doc_name = "sertifikat.docx";

            // Jika dokumen tidak tersedia
            if($doc_name==null)
            {
                return response()->json(['success'=>false, 'message'=>"Dokumen tidak tersedia",'Status'=>500], 200);
            }

            else
            {
               $doc_path = storage_path('sertifikat/'.$doc_name);

                return response()->download($doc_path, $doc_name, [], 'inline');
            }
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    public function getKategoriImages($pth, User $user, Request $request)
    {
        try{
            $img_subpath = $pth;
            $img_path = storage_path('images/kategori/'.$img_subpath);
            $extension = pathinfo($img_path, PATHINFO_EXTENSION);
            $headers = ['Content-Type'=>'image/'.$extension];

            return response()->file($img_path, $headers);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    public function getKatalogImages($pth, User $user, Request $request)
    {
        try{
            $img_subpath = $pth;
            $img_path = storage_path('images/katalog/'.$img_subpath);
            $extension = pathinfo($img_path, PATHINFO_EXTENSION);
            $headers = ['Content-Type'=>'image/'.$extension];

            return response()->file($img_path, $headers);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    //
    public function generateFormPermohonanAnalisis()
    {
        //$dok_baru = new \PhpOffice\PhpWord\PhpWord();
        //$section = $phpWord->addSection();

        //$description = "hahahaha";
        //$section->addText($description);

        $nama = "Sutedjo Purnomo";
        $perusahaan = "PT. Makmur Sejahtera";
        $alamat = "Perum. Kalibaru Permai Blok C1 No.1, Cilodong, Depok";
        $no_hp = "6281712312";
        $email = "sutedjo1945@gmail.com";
        $no_pesanan = "25/3/19";
        $no_npwp = "123456789";
        $nama_penerima = "Mochammad Suryono Oyon";

        $template_path = storage_path('templates/Template_Permohonan_Analisis.docx');
        $hasil_path = storage_path('permohonan_analisis');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);
        $templateProcessor->setValue('NamaLengkap', $nama);
        $templateProcessor->setValue('Perusahaan', $perusahaan);
        $templateProcessor->setValue('Alamat', $alamat);
        $templateProcessor->setValue('NoHP', $no_hp);
        $templateProcessor->setValue('Email', $email);
        $templateProcessor->setValue('NoNPWP', $no_npwp);
        $templateProcessor->setValue('NoPesanan', $no_pesanan);
        $templateProcessor->setValue('NamaPenerima', $nama_penerima);
        $templateProcessor->setImageValue('TTD', array('path' => storage_path('templates/ttd.png'), 'width'=>75, 'height'=>75));

        $filename = 'Hasil ' . $nama . '.docx';
 //     Storage::put('')
        $base_name = 'Hasil ' . $nama;
        $hasil_path = storage_path('permohonan_analisis/'.$filename);
        $templateProcessor->saveAs($hasil_path);
        $headers = ['Content-Type'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'Content-Disposition'=> 'attachment; filename="'.$filename.'"'];


        //return response()->download($hasil_path, $base_name . '.docx', $headers);
        //return response()->download(storage_path('permohonan_analisis/' . $base_name), $ $headers);

//      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($templateProcessor, 'Word2007');
        try{
        return response()->file($hasil_path, $headers);
        return response()->download($hasil_path, $base_name . '.docx', [], 'inline');
        return response()->file($hasil_path, $headers);
        //    $objWriter->save(storage_path('tes.docx'));
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }

        return response()->download(storage_path('tes.docx'), $base_name, $headers);
    }

    public function uploadBuktiPembayaran($pes, User $user, Request $request)
    {
        try
        {
            $id_pelanggan = $request->user()->IDPelanggan;
            //$debug_request = dd($request);
            $bayar = "Bukti bayar";
            $all_req = $request->all();
            $id_pesanan = $pes;

            if($request->hasFile('img')) {
                $foto = $request->file('img');
                $nama_foto = "ini_gambar." . $foto->getClientOriginalExtension();
                $img_path = $foto->storeAs('photos1', $nama_foto);
                $bayar = "Bukti pembayaran";
//            $img_path = $request->file('photo')->storeAs('photos', "ini_gambar");

            //    DokumenPesanan::where('IDPesanan', $id_pesanan)->update(['BuktiPembayaran'=>$bayar]);
            //    $waktu_sekarang = Carbon::now('Asia/Jakarta')->toDateTimeString();
            //    Pelacakan::where('IDPesanan', $id_pesanan)->update([
            //      'Pembayaran'=>2,
            //      'WaktuPembayaran'=>$waktu_sekarang
            //    ]);

            return response()->json(['IDPelanggan'=>$id_pelanggan, 'DebugRequest'=>$all_req, 'Status'=>200], 200);
            }

            //DokumenPesanan::where('IDPesanan', $id_pesanan)->update(['BuktiPembayaran'=>$bayar]);
            //$waktu_sekarang = Carbon::now('Asia/Jakarta')->toDateTimeString();
            //Pelacakan::where('IDPesanan', $id_pesanan)->update([
            //    'Pembayaran'=>2, 
            //    'WaktuPembayaran'=>$waktu_sekarang
            //    ]);
            $dbg = $request->getContent();
            if($dbg==null){
                return response()->json(['IDPelanggan'=>99, 'DebugRequest'=>"konten kosong", 'Status'=>200], 200);    
            }

            //DokumenPesanan::where('IDPesanan', $id_pesanan)->update(['BuktiPembayaran'=>$bayar]);
            //   $waktu_sekarang = Carbon::now('Asia/Jakarta')->toDateTimeString();
            //    Pelacakan::where('IDPesanan', $id_pesanan)->update([
            //      'Pembayaran'=>2,
            //      'WaktuPembayaran'=>$waktu_sekarang
            //    ]);

            return response()->json(['IDPelanggan'=>$id_pelanggan, 'DebugRequest'=>$all_req, 'Status'=>400], 400);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'DebugRequest'=>$e->getMessage(),'Status'=>500], 200);
        }
    }
}