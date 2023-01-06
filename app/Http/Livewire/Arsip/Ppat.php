<?php

namespace App\Http\Livewire\Arsip;

use App\Models\Arsip;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Ppat extends Component
{
    use WithPagination;

    public $paginate = 10, $search = null;
    protected $listeners = ['render', 'delete'];


    public function render()
    {
        return view('livewire.arsip.ppat', [
            'arsips' => ($this->search == null || $this->search == '') ?
                Arsip::where('jenis', 'like', 'PPAT')->latest()->paginate($this->paginate) :
                Arsip::where('nama_1', 'like', '%' . $this->search . '%')->where('jenis', 'like', 'PPAT')->paginate($this->paginate)
        ]);
    }

    public function delete($id)
    {
        try {
            // Transaction
            $exception = DB::transaction(function () use ($id) {
                // Do your SQL here
                Arsip::find($id)->delete();
            });

            if (is_null($exception)) {
                $this->dispatchBrowserEvent('swal:success', [
                    'type' => 'success',
                    'message' => 'Data Berhasil Dihapus!',
                    'text' => '...'
                ]);
                $this->emit('render');
            } else {
                throw new Exception();
            }
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'success',
                'message' => 'Terjadi Kesalahan!',
                'text' => 'silahkan hubungi developer.'
            ]);
        }
    }
}
