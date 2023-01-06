<?php

namespace App\Http\Livewire\Arsip;

use Livewire\Component;
use Livewire\WithFileUploads;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ModalUploadImage extends Component
{
    use WithFileUploads;

    public $fileCover;
    public $textOCR;

    public function render()
    {
        return view('livewire.arsip.modal-upload-image');
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

        $nameFileCover = $this->fileCover->store('cover', 'public');
        $idImage = substr($nameFileCover, 6);
        return redirect()->route('create-arsip', $idImage);
    }

    public function closeForm()
    {
        $this->reset('fileCover', 'textOCR');
        $this->resetValidation();
        $this->dispatchBrowserEvent('close-modal-upload');
    }
}
