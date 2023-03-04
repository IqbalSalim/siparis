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
use Illuminate\Support\Str;
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
        $row1 = null;
        $row2 = null;
        $row3 = null;
        $row4 = null;
        $row5 = null;
        $row6 = null;
        if ($text !== null || $text !== '') {

            $baris = explode("\n", $text);

            // dd($baris);
            foreach ($baris as $key => $row) {
                if (Str::contains($row, 'PERTAMA')) {
                    $row1 = explode("PERTAMA", $row);
                    foreach ($row1 as $baris) {
                        $result = preg_replace("/[^a-zA-Z0-9_ .,]/", "", $baris);
                        $this->pihakPertama = trim($result);
                    }
                } elseif (Str::contains($row, 'KEDUA')) {
                    $row2 = explode("KEDUA", $row);
                    foreach ($row2 as $baris) {
                        $result = preg_replace("/[^a-zA-Z0-9\. ,]/", "", $baris);
                        $this->pihakKedua = trim($result);
                    }
                } elseif (Str::contains($row, 'JUDUL')) {
                    $row3 = explode("AKTA", $row);
                    foreach ($row3 as $baris) {
                        $result = preg_replace("/[^a-zA-Z0-9\. ,]/", "", $baris);
                        $this->judulAkta = trim($result);
                    }
                } elseif (Str::contains($row, 'NO AKTA')) {
                    $row4 = explode("AKTA", $row);
                    foreach ($row4 as $baris) {
                        $result = preg_replace("/[^a-zA-Z0-9\. , \/]/", "", $baris);
                        $this->noAkta = trim($result);
                    }
                } elseif (Str::contains($row, 'JENIS')) {
                    $row6 = explode("JENIS", $row);
                    foreach ($row6 as $baris) {
                        $this->jenis = trim($baris);
                    }
                    if ($this->jenis == 'ppat' || $this->jenis == 'Ppat' || $this->jenis == 'PPAT') {
                        $this->jenis = 'PPAT';
                    } else {
                        $this->jenis = 'NOTARIS';
                    }
                }
            }
            // dd($keynote);
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
                'noAkta' => 'required|string|max:255|unique:arsips,no_akta',
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
