<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Rules\HashedPasswordCheck;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UbahPassword extends Component
{
    public $password_lama, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.ubah-password');
    }

    public function closeForm()
    {
        $this->reset('password_lama', 'password', 'password_confirmation');
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate([
            'password_lama' => ['required', new HashedPasswordCheck],
            'password' => 'required|confirmed|min:6',

        ]);


        try {
            // Transaction
            $exception = DB::transaction(function () {
                User::find(Auth::user()->id)->update([
                    'password' => Hash::make($this->password),
                ]);
            });

            if (is_null($exception)) {
                $this->closeForm();
                $this->dispatchBrowserEvent('swal:success-redirect', [
                    'type' => 'success',
                    'message' => 'Data Berhasil Diubah!',
                    'text' => 'ini telah disimpan di tabel User.',
                    'url' => route('dashboard'),
                ]);
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
