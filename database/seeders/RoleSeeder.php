<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'admin',
            'operator',
        ];
        foreach ($array as $row) {
            Role::create(['name' => $row]);
        }

        $array2 = [
            'olah user',
            'olah arsip',
            'cetak arsip',
            'olah surat masuk',
            'olah surat keluar',
            'buat surat notaris',
            'ubah password',
            'lihat laporan',
            'cetak laporan',
            'dashboard admin',
            'dashboard operator',
        ];

        foreach ($array2 as $row) {
            Permission::create(['name' => $row]);
        }

        // Tambah Permission di Role Admin
        $role = Role::where('name', 'admin')->first();
        $role->givePermissionTo([
            'olah user',
            'olah arsip',
            'cetak arsip',
            'olah surat masuk',
            'olah surat keluar',
            'buat surat notaris',
            'ubah password',
            'lihat laporan',
            'cetak laporan',
            'dashboard admin',
        ]);

        // Tambah Permission di Role Operator
        $role = Role::where('name', 'operator')->first();
        $role->givePermissionTo([
            'olah arsip',
            'cetak arsip',
            'olah surat masuk',
            'olah surat keluar',
            'buat surat notaris',
            'ubah password',
            'dashboard operator',
        ]);
    }
}
