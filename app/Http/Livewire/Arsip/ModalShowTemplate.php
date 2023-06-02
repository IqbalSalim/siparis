<?php

namespace App\Http\Livewire\Arsip;

use Livewire\Component;

class ModalShowTemplate extends Component
{
    public $result;

    protected $listeners = ['getImageCover'];

    public function getImageCover($image)
    {
        $this->result = $image;
    }

    public function render()
    {
        return view('livewire.arsip.modal-show-template');
    }

    public function closeModal()
    {
        $this->result = null;
        $this->dispatchBrowserEvent('close-show-cover');
    }
}
