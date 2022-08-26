<div x-cloak x-data="{ createModal: false, editModal: false }" x-on:close-create-modal="createModal=false" x-on:close-edit-modal="editModal=false">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-primary-500 dark:text-white">
            {{ __('User') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-primary-200">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
            <div>-</div>
            <div>User</div>
        </div>
    </x-slot>

    <livewire:user.create-user></livewire:user.create-user>
    <livewire:user.edit-user></livewire:user.edit-user>

    <div id="content">
        {{-- Tabel User --}}
        <div class="relative overflow-x-auto border shadow-md sm:rounded-lg dark:border-gray-700">
            <div class="p-4 bg-white dark:bg-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div>
                        <h2 class="mb-2 text-xl font-semibold text-primary-500 dark:text-white">Daftar User</h2>
                    </div>
                    <button class="btn-primary btn-icon" @click='createModal=true'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 -ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah
                    </button>
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

            @if ($users->isNotEmpty())
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase bg-secondary-500">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $row)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-bold uppercase text-secondary-500">
                                    {{ $row->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $row->email }}
                                </td>
                                <td class="px-6 py-4 font-bold uppercase text-secondary-500">
                                    {{ $row->getRoleNames()[0] }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button @click="editModal=true"
                                        wire:click.prevent="$emit('getUser', {{ $row->id }})"
                                        class="px-3 btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button class="px-3 btn-primary"
                                        @click="$dispatch('swal:confirm', {{ $row->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $users->links() }}
            @else
                <p class="px-4 py-2 mt-2 text-2xl font-bold text-center text-red-500 animate-pulse">
                    Data tidak ditemukan!
                </p>
            @endif
        </div>
        {{-- End Tabel User --}}
    </div>
</div>
