<?php

namespace App\Http\Livewire\SuratKeluar;

use App\Models\SuratKeluar;
use Livewire\Component;

class ShowSuratKeluar extends Component
{
    public $result;
    protected $listeners = ['getFileSuratKeluar'];

    public function render()
    {
        return view('livewire.surat-keluar.show-surat-keluar');
    }

    public function getFileSuratKeluar($id)
    {
        $this->result = SuratKeluar::find($id);
    }

    public function closeModal()
    {
        $this->result = null;
        $this->dispatchBrowserEvent('close-show-suratkeluar');
    }
}
