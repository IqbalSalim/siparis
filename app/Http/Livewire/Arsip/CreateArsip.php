<?php

namespace App\Http\Livewire\Arsip;

use Alimranahmed\LaraOCR\Services\Tesseract;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Livewire\WithFileUploads;
use Spatie\PdfToImage\Pdf;
// use Org_Heigl\Ghostscript\Ghostscript;

class CreateArsip extends Component
{
    use WithFileUploads;

    public $fileCover, $textOCR;
    public $pihakPertama = "", $pihakKedua = "", $judulAkta = "", $noAkta = "", $tanggalAkta = "", $jenis = "";

    public function mount()
    {
        if (Session::has('text')) {
            $text = Session::get('text');

            $baris = explode("\n", $text);

            $row1 = explode(": ", $baris[8]);
            $row2 = explode(": ", $baris[9]);
            $row3 = explode(": ", $baris[10]);
            $row4 = explode(": ", $baris[11]);
            $row5 = explode(": ", $baris[12]);
            $row6 = explode(": ", $baris[13]);

            $this->pihakPertama = $row1[1];
            $this->pihakKedua = $row2[1];
            $this->judulAkta = $row3[1];
            $this->noAkta = $row4[1];
            $this->tanggalAkta = $row5[1];
            $this->jenis = $row6[1];
        }
    }

    public function render()
    {
        return view('livewire.arsip.create-arsip');
    }

    public function uploadFile()
    {
        $this->validate(
            [
                'fileCover' => 'required|file|mimes:png,jpg',
            ],
            [],
            [
                'fileCover' => 'File Cover',
            ]
        );

        // $this->pihakPertama = "AWAL SIKING";
        // return false;

        $nameFileCover = $this->fileCover->store('files', 'public');
        $this->textOCR = new TesseractOCR(public_path('storage/' . $nameFileCover));
        $text = $this->textOCR->run();
        return redirect()->back()->with('text', $text);
        $this->pihakPertama = $text;
        if ($text !== null || $text !== "") {
            $text = (array) $text;
            $baris = explode("\n", $text[0]);



            $row1 = explode(": ", $baris[8]);
            $row2 = explode(": ", $baris[9]);
            $row3 = explode(": ", $baris[10]);
            $row4 = explode(": ", $baris[11]);
            $row5 = explode(": ", $baris[12]);
            $row6 = explode(": ", $baris[13]);

            $this->pihakPertama = $row1[1];
            // $this->pihakKedua = $row2[1];
            // $this->judulAkta = $row3[1];
            // $this->noAkta = $row4[1];
            // $this->tanggalAkta = $row5[1];
            // $this->jenis = $row6[1];
        }
    }
}
