<?php

namespace App\Http\Livewire;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profil extends Component
{
    use WithFileUploads;
    public $name, $jenis_kelamin, $no_telpon, $alamat,  $email, $foto, $userId;
    public $foto_preview;

    public function mount()
    {


        $user = User::find(Auth::user()->id);
        $this->name = $user->karyawan->nama;
        $this->jenis_kelamin = $user->karyawan->jenis_kelamin;
        $this->no_telpon = $user->karyawan->no_telpon;
        $this->alamat = $user->karyawan->alamat;
        $this->email = $user->email;
        $this->foto_preview = $user->karyawan->foto;
        $this->userId = Auth::user()->id;
    }

    public function render()
    {
        return view('livewire.profil');
    }


    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'no_telpon' => 'required|numeric|digits_between:11,13',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);


        $id = $this->userId;
        $user = User::find($id);
        $fotolama = '';
        if ($this->foto !== null) {
            $foto = $this->foto->store('foto', 'public');
            $fotolama = $user->foto;
        } else {
            $foto = $this->foto_preview;
        }

        try {
            // Transaction
            $exception = DB::transaction(function () use ($id, $foto, $fotolama) {
                User::find($id)->update([
                    'name' => $this->name,
                    'jenis_kelamin' => $this->jenis_kelamin,
                    'no_telpon' => $this->no_telpon,
                    'alamat' => $this->alamat,
                    'email' => $this->email,
                    'foto' => $foto,
                ]);
            });

            if (is_null($exception)) {
                if ($fotolama !== '') {
                    if (Storage::disk('public')->exists($fotolama)) {
                        Storage::disk('public')->delete($fotolama);
                    }
                }
                $this->dispatchBrowserEvent('swal:success', [
                    'type' => 'success',
                    'message' => 'Data Berhasil Diubah!',
                    'text' => 'ini telah disimpan di tabel User.'
                ]);
                $this->render();
            } else {
                throw new Exception();
            }
        } catch (Exception $e) {
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
