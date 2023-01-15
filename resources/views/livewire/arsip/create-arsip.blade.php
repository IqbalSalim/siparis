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
            <div class="w-1/2 p-4 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-primary-500">Cover File</h3>
                <p class="mb-4 text-secondary-500">Periksa Kembali Inputan Cover File</p>
                <table class="w-full pt-4">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="w-2/5">Nama Pihak I</th>
                        <td class="w-full"><input type="text" name="pihakPertama" class="my-1"
                                wire:model.defer='pihakPertama'>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Nama Pihak II</th>
                        <td><input type="text" name="pihakKedua" class="my-1" wire:model.defer='pihakKedua'></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Judul Akta</th>
                        <td><input type="text" class="my-1" name="judulAkta" wire:model.defer='judulAkta'></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>No Akta</th>
                        <td><input type="text" class="my-1" name="noAkta" wire:model.defer='noAkta'></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Tanggal Akta</th>
                        <td>
                            <input type="date" class="my-1" name="tanggalAkta" wire:model.defer='tanggalAkta'>
                            <span class="text-xs text-red-700">
                                @error('tanggalAkta')
                                {{ $message }}
                                @enderror
                            </span>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Jenis</th>
                        <td>
                            <select name="jenis" wire:model.defer='jenis'>
                                <option value="NOTARIS">NOTARIS</option>
                                <option value="PPAT">PPAT</option>
                            </select>
                        </td>
                        {{-- <td><input type="text" class="my-1" name="jenis" wire:model.defer='jenis'></td> --}}
                    </tr>
                </table>
            </div>
            <div class="w-1/2 p-4 bg-white rounded-lg shadow-lg">
                <h3 class="mb-4 text-xl font-bold text-primary-500 ">Upload File Arsip</h3>

                <div class="flex flex-col space-y-4">
                    <div>
                        <label for="nama">File Arsip</label>
                        <input type="file" wire:model.defer='fileArsip' class="mt-1">
                        <span class="text-xs text-red-700">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <button type="button" wire:click.defer='uploadFile'
                        class="w-full mt-2 text-base btn-primary">Upload</button>

                </div>
            </div>
        </div>
    </div>
</div>