<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nama' => 'Noor Hidayat Ente, S.H, M.H',
                'jenis_kelamin' => 'Laki-laki',
                'no_telpon' => '082345345332',
                'alamat' => 'Jln Dewi Sartika, Samping Kampus 1 UNG',
                'email' => 'admin@gmail.com',
                'foto' => 'foto/default-user.png',
                'password' => 'password',
                'role' => 'admin',
            ],
            [
                'nama' => 'Al Iqbal Bin Salim, S.Kom',
                'jenis_kelamin' => 'Laki-laki',
                'no_telpon' => '082271131552',
                'alamat' => 'Jln Analisa, Kel. Tumbihe, Kec. Kabila, Kab. Bone Bolango',
                'email' => 'iqbalbinsalim@gmail.com',
                'foto' => 'foto/default-user.png',
                'password' => 'password',
                'role' => 'operator',
            ]
        ];

        foreach ($users as $row) {
            $user = User::create([
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
            ]);

            Karyawan::create([
                'user_id' => $user->id,
                'nama' => $row['nama'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'no_telpon' => $row['no_telpon'],
                'alamat' => $row['alamat'],
                'foto' => $row['foto'],
            ]);

            $role = Role::where('name', $row['role'])->first();
            $user = User::where('email', $row['email'])->first();
            $user->assignRole($role);
        }
    }
}
