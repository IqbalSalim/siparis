<?php

namespace App\Http\Livewire\Arsip;

use Livewire\Component;

class CreateArsip extends Component
{
    public $fileCover;

    public function render()
    {
        return view('livewire.arsip.create-arsip');
    }
}
