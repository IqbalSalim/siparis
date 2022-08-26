<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditUser extends Component
{
    public $name, $email, $userId;

    protected $listeners = ['getUser'];

    public function getUser($id)
    {
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->userId = $id;
    }

    public function closeForm()
    {
        $this->reset('name', 'email');
        $this->resetValidation();
        $this->dispatchBrowserEvent('close-edit-modal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ]);


        $id = $this->userId;

        try {
            // Transaction
            $exception = DB::transaction(function () use ($id) {
                User::find($id)->update([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);
            });

            if (is_null($exception)) {
                $this->closeForm();
                $this->dispatchBrowserEvent('swal:success', [
                    'type' => 'success',
                    'message' => 'Data Berhasil Diubah!',
                    'text' => 'ini telah disimpan di tabel User.'
                ]);
                $this->emit('render');
            } else {
                throw new Exception();
            }
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'Terjadi Kesalahan!',
                'text' => 'silahkan periksa kembali inputan atau hubungi developer.'
            ]);
        }
    }
}
