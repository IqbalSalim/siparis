<?php

namespace App\Http\Livewire\User;

use App\Models\Karyawan;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    use WithFileUploads;

    public $name, $jenis_kelamin, $no_telpon, $alamat,  $email, $foto;


    public function render()
    {
        return view('livewire.user.create-user');
    }

    public function closeForm()
    {
        $this->reset('name', 'jenis_kelamin', 'no_telpon', 'alamat', 'email', 'foto');
        $this->resetValidation();
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function store()
    {
        $this->validate(
            [
                'name' => 'required|string|max:255',
                'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
                'no_telpon' => 'required|numeric|digits_between:11,13',
                'alamat' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'foto' => 'image|max:2048',
            ],
            [],
            [
                'name' => 'Nama',
                'jenis_kelamin' => 'Jenis Kelamin',
                'no_telpon' => 'No Telepon',
                'alamat' => 'Alamat',
                'email' => 'Email',
                'foto' => 'Foto',
            ]
        );

        if ($this->foto !== null) {
            $foto = $this->foto->store('foto', 'public');
        } else {
            $foto = '';
        }

        try {
            // Transaction
            $exception = DB::transaction(function () use ($foto) {
                // Do your SQL here
                $user = User::create([
                    'email' => $this->email,
                    'password' => Hash::make('password')
                ]);

                Karyawan::create([
                    'user_id' => $user->id,
                    'nama' => $this->name,
                    'jenis_kelamin' => $this->jenis_kelamin,
                    'no_telpon' => $this->no_telpon,
                    'alamat' => $this->alamat,
                    'foto' => $foto,
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
            dd($e);
            if (Storage::disk('public')->exists($foto)) {
                Storage::disk('public')->delete($foto);
            }
            $this->dispatchBrowserEvent('swal:error', [
                'type' => 'error',
                'message' => 'Terjadi Kesalahan!',
                'text' => 'silahkan periksa kembali inputan atau hubungi developer.'
            ]);
        }
    }
}
