<?php

namespace App\Http\Livewire\Arsip;

use Livewire\Component;
use Livewire\WithFileUploads;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ModalUploadImage extends Component
{
    use WithFileUploads;

    public $fileCover;
    private $textOCR;

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

        $nameFileCover = $this->fileCover->store('files', 'public');
        $this->textOCR = new TesseractOCR(public_path('storage/' . $nameFileCover));
        $text = $this->textOCR->run();
        return redirect()->route('arsip.create')->with('text', $text);
    }

    public function closeForm()
    {
        $this->reset('fileCover', 'textOCR');
        $this->resetValidation();
        $this->dispatchBrowserEvent('close-modal-upload');
    }
}
