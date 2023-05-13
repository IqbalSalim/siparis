<?php

namespace App\Http\Livewire\SuratKeluar;

use App\Models\SuratKeluar;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateSuratKeluar extends Component
{
    use WithFileUploads;

    public $no_agenda, $no_surat, $tanggal_surat, $tujuan_surat, $perihal, $file;

    public function render()
    {
        return view('livewire.surat-keluar.create-surat-keluar');
    }

    public function closeForm()
    {
        $this->reset('no_agenda', 'no_surat', 'tanggal_surat', 'tujuan_surat', 'perihal', 'file');
        $this->resetValidation();
        $this->dispatchBrowserEvent('close-create-suratkeluar');
    }

    public function store()
    {
        $this->validate(
            [
                'no_surat' => 'required|string|max:255|unique:surat_keluars,no_surat',
                'tanggal_surat' => 'required|date',
                'tujuan_surat' => 'required|string|max:255',
                'perihal' => 'required|string|max:255',
                'file' => 'required|file|mimes:pdf',
            ],
            [],
            [
                'no_surat' => 'Nomor Surat',
                'tanggal_surat' => 'Tanggal Surat',
                'tujaun_surat' => 'Tujaun Surat',
                'perihal' => 'Perihal',
                'file' => 'File Surat',
            ]
        );

        $this->file = $this->file->store('surat_keluar', 'public');

        try {

            $exception = DB::transaction(function () {
                $this->no_agenda = 1;
                $noagenda = SuratKeluar::latest('no_agenda')->first();
                if ($noagenda !== null) {
                    $this->no_agenda = $noagenda->no_agenda + 1;
                }

                $user = SuratKeluar::create([
                    'no_agenda' => $this->no_agenda,
                    'no_surat' => $this->no_surat,
                    'tanggal_surat' => $this->tanggal_surat,
                    'tujuan_surat' => $this->tujuan_surat,
                    'perihal' => $this->perihal,
                    'file' => $this->file,

                ]);
            });

            if (is_null($exception)) {
                $this->closeForm();
                $this->dispatchBrowserEvent('swal:success', [
                    'type' => 'success',
                    'message' => 'Data Berhasil Ditambahkan!',
                    'text' => 'ini telah disimpan di tabel Surat Keluar.'
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
