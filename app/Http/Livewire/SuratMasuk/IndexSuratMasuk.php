<?php

namespace App\Http\Livewire\SuratMasuk;

use App\Models\SuratMasuk;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class IndexSuratMasuk extends Component
{
    use WithPagination;

    public $paginate = 10, $search = null;
    protected $listeners = ['render', 'delete'];


    public function render()
    {
        return view('livewire.surat-masuk.index-surat-masuk', [
            'suratmasuk' => ($this->search == null || $this->search == '') ?
                SuratMasuk::latest()->paginate($this->paginate) :
                SuratMasuk::where('perihal', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function delete($id)
    {
        try {
            // Transaction
            $exception = DB::transaction(function () use ($id) {
                // Do your SQL here
                SuratMasuk::find($id)->delete();
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
