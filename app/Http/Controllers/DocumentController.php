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
        return response()->download($hasil_path, $base_name . '.docx', [], 'inline');
        return response()->file($hasil_path, $headers);
        //    $objWriter->save(storage_path('tes.docx'));
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }

        return response()->download(storage_path('tes.docx'), $base_name, $headers);
    }

    public function uploadBuktiPembayaran1($pes, User $user, Request $request){
        return response()->json(['asdf'=>2], 200);
    }

    
}