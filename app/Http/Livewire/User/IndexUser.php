<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUser extends Component
{
    use WithPagination;

    public $paginate = 10, $search = null;
    protected $listeners = ['render', 'delete'];

    public function render()
    {
        return view('livewire.user.index-user', [
            'users' => ($this->search == null || $this->search == '') ?
                User::whereHas('roles', function ($q) {
                    $q->whereNot('name', 'admin');
                })->latest()->paginate($this->paginate) :
                User::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function delete($id)
    {
        try {
            // Transaction
            $exception = DB::transaction(function () use ($id) {
                // Do your SQL here
                User::find($id)->delete();
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
