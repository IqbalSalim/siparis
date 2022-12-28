<div x-cloak x-data="{ editModal: false }" x-on:close-edit-modal="editModal=false">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-primary-500 dark:text-white">
            {{ __('Tambah Arsip') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-primary-200">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
            <div>-</div>
            <div>Arsip</div>
            <div>-</div>
            <div>Tambah Arsip</div>
        </div>
    </x-slot>


    <div id="content">
        <div class="flex flex-row space-x-8">
            <div class="w-full p-4 bg-white rounded-lg shadow-lg">
                <table>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="">Nama Pihak I</th>
                        <td><input type="text" name="pihakPertama" wire:model.defer='pihakPertama'></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Nama Pihak II</th>
                        <td><input type="text" name="pihakKedua" wire:model.defer='pihakKedua'></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Judul Akta</th>
                        <td><input type="text" name="judulAkta" wire:model.defer='judulAkta'></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>No Akta</th>
                        <td><input type="text" name="noAkta" wire:model.defer='noAkta'></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Tanggal Akta</th>
                        <td><input type="text" name="tanggalAkta" wire:model.defer='tanggalAkta'></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Jenis</th>
                        <td><input type="text" name="jenis" wire:model.defer='jenis'></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>