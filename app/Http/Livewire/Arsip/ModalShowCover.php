<?php

namespace App\Http\Livewire\Arsip;

use App\Models\Arsip;
use Livewire\Component;

class ModalShowCover extends Component
{
    public $result;
    protected $listeners = ['getCoverArsip'];

    public function render()
    {
        return view('livewire.arsip.modal-show-cover');
    }

    public function getCoverArsip($id)
    {
        $this->result = Arsip::find($id);
    }

    public function closeModal()
    {
        $this->result = null;
        $this->dispatchBrowserEvent('close-cover-modal');
    }
}
