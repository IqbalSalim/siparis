<div x-cloak x-data="{ createModal: false, editModal: false }" x-on:close-create-modal="createModal=false"
    x-on:close-edit-modal="editModal=false">
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
        <div class="px-6 py-4 bg-white rounded-lg dark:bg-gray-800">

            <h2 class="mb-2 text-xl font-semibold text-primary-500 dark:text-white">Profil User</h2>

            <form class="space-y-6" wire:submit.prevent="update" novalidate>
                @csrf
                <div class="flex flex-col space-y-4">
                    <div>
                        <label for="nama">Nama</label>
                        <input type="text" wire:model.defer='name' id="nama" class="mt-1">
                        <span class="text-xs text-red-700">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="flex gap-x-4">
                        <div class="flex-1">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select wire:model.defer='jenis_kelamin' id="jenis_kelamin" class="mt-1">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <span class="text-xs text-red-700">
                                @error('jenis_kelamin')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="flex-1">
                            <label for="no_telpon">No Telepon</label>
                            <input type="text" wire:model.defer='no_telpon' id="no_telpon" class="mt-1">
                            <span class="text-xs text-red-700">
                                @error('no_telpon')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div>
                        <label for="alamat">Alamat</label>
                        <input type="text" wire:model.defer='alamat' id="alamat" class="mt-1">
                        <span class="text-xs text-red-700">
                            @error('alamat')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" wire:model='email' name="email" id="email" class="mt-1">
                        <span class="text-xs text-red-700">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div>
                        <label for="foto">Foto</label>
                        <div class="flex flex-row items-start mt-1 space-x-2">
                            <div class="">
                                <img src="{{ $foto ? $foto->temporaryUrl() : asset('storage/'.$foto_preview) }}" alt=""
                                    class="object-cover w-20 h-20 rounded-lg">
                            </div>
                            <div>
                                <input type="file" wire:model.defer='foto' name="foto">
                                <span class="block text-xs text-red-700">
                                    @error('foto')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <button type="submit" class="w-full text-base btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>