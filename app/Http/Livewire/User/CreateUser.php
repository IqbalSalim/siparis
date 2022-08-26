<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $name, $email;

    public function render()
    {
        return view('livewire.user.create-user');
    }

    public function closeForm()
    {
        $this->reset('name', 'email');
        $this->resetValidation();
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function store()
    {
        $this->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
            ],
            [],
            [
                'name' => 'Nama',
                'email' => 'Email',
            ]
        );

        try {
            // Transaction
            $exception = DB::transaction(function () {
                // Do your SQL here
                $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make('password')
                ]);

                $role = Role::where('name', 'operator')->first();
                $user->assignRole($role);
            });

            if (is_null($exception)) {
                $this->closeForm();
                $this->dispatchBrowserEvent('swal:success', [
                    'type' => 'success',
                    'message' => 'Data Berhasil Ditambahkan!',
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
