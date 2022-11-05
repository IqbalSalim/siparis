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
            <div class="w-4/12 p-4 bg-white rounded-lg shadow-lg">
                <div>
                    <label for="nama">File Cover</label>
                    <input type="file" wire:model.defer='fileCover' class="mt-1">
                    <span class="text-xs text-red-700">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" class="w-full mt-2 text-base btn-primary">Upload</button>
            </div>
            <div class="w-8/12 p-4 bg-white rounded-lg shadow-lg">
                <table>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="">Nama Pihak I</th>
                        <td></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Nama Pihak II</th>
                        <td></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Judul Akta</th>
                        <td></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>No Akta</th>
                        <td></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Tanggal Akta</th>
                        <td></td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th>Jenis</th>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- <div class="relative overflow-x-auto border shadow-md sm:rounded-lg dark:border-gray-700">
            <div class="p-4 bg-white dark:bg-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div>
                        <h2 class="mb-2 text-xl font-semibold text-primary-500 dark:text-white">Daftar User</h2>
                    </div>
                    <a href="{{ route('arsip.create') }}" class="btn-primary btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 -ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah
                    </a>
                </div>
                <div class="flex flex-row items-center justify-between mt-2">
                    <div>
                        <label for="table-search" class="sr-only">Item</label>
                        <select wire:model='paginate' class="accent-secondary-500">
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-secondary-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search" wire:model='search' class="block w-80 pl-10 p-2.5"
                                placeholder="Cari berdasarkan nama">
                        </div>
                    </div>
                </div>
            </div>


        </div> --}}
        {{-- End Tabel User --}}
    </div>
</div>