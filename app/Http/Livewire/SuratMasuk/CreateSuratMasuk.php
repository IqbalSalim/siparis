<?php

namespace App\Http\Livewire\SuratMasuk;

use App\Models\SuratMasuk;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateSuratMasuk extends Component
{
    use WithFileUploads;

    public $no_agenda, $no_surat, $tanggal_surat, $tanggal_terima, $asal_surat, $perihal, $file;


    public function render()
    {
        return view('livewire.surat-masuk.create-surat-masuk');
    }

    public function closeForm()
    {
        $this->reset('no_agenda', 'no_surat', 'tanggal_surat', 'tanggal_terima', 'asal_surat', 'perihal', 'file');
        $this->resetValidation();
        $this->dispatchBrowserEvent('close-create-suratmasuk');
    }

    public function store()
    {
        $this->validate(
            [
                'no_surat' => 'required|string|max:255|unique:surat_masuks,no_surat',
                'tanggal_surat' => 'required|date',
                'tanggal_terima' => 'required|date',
                'asal_surat' => 'required|string|max:255',
                'perihal' => 'required|string|max:255',
                'file' => 'required|file|mimes:pdf',
            ],
            [],
            [
                'no_surat' => 'Nomor Surat',
                'tanggal_surat' => 'Tanggal Surat',
                'tanggal_terima' => 'Tanggal Terima',
                'asal_surat' => 'Asal Surat',
                'perihal' => 'Perihal',
                'file' => 'File Surat',
            ]
        );

        $this->file = $this->file->store('surat_masuk', 'public');

        try {
            // Transaction
            $exception = DB::transaction(function () {
                // Do your SQL here

                $this->no_agenda = 1;
                $noagenda = SuratMasuk::latest('no_agenda')->first();
                if ($noagenda !== null) {
                    $this->no_agenda = $noagenda->no_agenda + 1;
                }

                $user = SuratMasuk::create([
                    'no_agenda' => $this->no_agenda,
                    'no_surat' => $this->no_surat,
                    'tanggal_surat' => $this->tanggal_surat,
                    'tanggal_terima' => $this->tanggal_terima,
                    'asal_surat' => $this->asal_surat,
                    'perihal' => $this->perihal,
                    'file' => $this->file,

                ]);
            });

            if (is_null($exception)) {
                $this->closeForm();
                $this->dispatchBrowserEvent('swal:success', [
                    'type' => 'success',
                    'message' => 'Data Berhasil Ditambahkan!',
                    'text' => 'ini telah disimpan di tabel Surat Masuk.'
                ]);
                $this->emit('render');
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
