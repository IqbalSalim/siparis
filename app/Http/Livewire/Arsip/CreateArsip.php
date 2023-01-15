<?php

namespace App\Http\Livewire\Arsip;

use Alimranahmed\LaraOCR\Services\Tesseract;
use App\Models\Arsip;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Livewire\WithFileUploads;
use Spatie\PdfToImage\Pdf;
// use Org_Heigl\Ghostscript\Ghostscript;

class CreateArsip extends Component
{
    use WithFileUploads;

    public $fileArsip, $fileCover;
    public $pihakPertama = "", $pihakKedua = "", $judulAkta = "", $noAkta = "", $tanggalAkta = "", $jenis = "";
    private $textOCR;
    public $url;

    public function mount($idImage)
    {
        $this->textOCR = new TesseractOCR(public_path('storage/cover/' . $idImage));
        $text = $this->textOCR->run();
        if ($text !== null || $text !== '') {

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
            if ($this->jenis == 'ppat' || $this->jenis == 'Ppat' || $this->jenis == 'PPAT') {
                $this->jenis = 'PPAT';
            } else {
                $this->jenis = 'NOTARIS';
            }

            $this->fileCover = 'cover/' . $idImage;
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
                'fileArsip' => 'required|file|mimes:pdf',
                'jenis' => 'required|string|in:NOTARIS,PPAT',
                'tanggalAkta' => 'required|date',
                'pihakPertama' => 'required|string|max:255',
                'pihakKedua' => 'required|string|max:255',
                'judulAkta' => 'required|string|max:255',
                'noAkta' => 'required|string|max:255',
            ],
            [],
            [
                'fileArsip' => 'File Arsip',
                'jenis' => 'Jenis',
                'tanggalAkta' => 'Tanggal Akta',
                'pihakPertama' => 'Pihak Pertama',
                'pihakKedua' => 'Pihak Kedua',
                'judulAkta' => 'Judul Akta',
                'noAkta' => 'No Akta',
            ]
        );

        $this->fileArsip = $this->fileArsip->store('files', 'public');

        try {
            // Transaction
            $exception = DB::transaction(function () {
                // Do your SQL here
                $user = Arsip::create([
                    'nama_1' => $this->pihakPertama,
                    'nama_2' => $this->pihakKedua,
                    'judul_akta' => $this->judulAkta,
                    'no_akta' => $this->noAkta,
                    'tanggal_akta' => $this->tanggalAkta,
                    'jenis' => $this->jenis,
                    'file_cover' => 'cover/' . $this->fileCover,
                    'file_isi' => $this->fileArsip,
                ]);
            });

            if (is_null($exception)) {
                $this->url = route('notaris');
                if ($this->jenis == 'PPAT') {
                    $this->url = route('ppat');
                }
                $this->dispatchBrowserEvent('swal:success-redirect', [
                    'type' => 'success',
                    'message' => 'Data Berhasil Ditambahkan!',
                    'text' => 'ini telah disimpan di tabel Arsip.',
                    'url' => $this->url,
                ]);
            } else {
                throw new Exception();
            }
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'Terjadi Kesalahan!',
                'text' => 'silahkan periksa kembali inputan atau hubungi developer.'
            ]);
        }
    }
}
