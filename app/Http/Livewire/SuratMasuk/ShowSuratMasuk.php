<?php

namespace App\Http\Livewire\SuratMasuk;

use App\Models\SuratMasuk;
use Livewire\Component;

class ShowSuratMasuk extends Component
{
    public $result;
    protected $listeners = ['getFileSuratMasuk'];

    public function render()
    {
        return view('livewire.surat-masuk.show-surat-masuk');
    }

    public function getFileSuratMasuk($id)
    {
        $this->result = SuratMasuk::find($id);
    }

    public function closeModal()
    {
        $this->result = null;
        $this->dispatchBrowserEvent('close-show-suratmasuk');
    }
}
