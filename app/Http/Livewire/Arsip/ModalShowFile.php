<?php

namespace App\Http\Livewire\Arsip;

use App\Models\Arsip;
use Livewire\Component;

class ModalShowFile extends Component
{
    public $result;
    protected $listeners = ['getFileArsip'];

    public function render()
    {
        return view('livewire.arsip.modal-show-file');
    }

    public function getFileArsip($id)
    {
        $this->result = Arsip::find($id);
    }

    public function closeModal()
    {
        $this->result = null;
        $this->dispatchBrowserEvent('close-show-modal');
    }
}
