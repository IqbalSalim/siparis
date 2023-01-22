<div x-cloak x-data="{ createModal: false, editModal: false }" x-on:close-create-modal="createModal=false"
    x-on:close-edit-modal="editModal=false">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-primary-500 dark:text-white">
            {{ __('Dashboard') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-primary-200">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
        </div>
    </x-slot>



    <div id="content">
        <div class="grid grid-cols-4 rounded-lg gap-x-4">
            <div
                class="flex flex-row justify-between p-2 rounded-lg shadow-lg bg-primary-500 gap-x-4 shadow-primary-500">
                <div class="flex flex-col gap-y-4">
                    <div class="font-bold text-white">
                        <p class="text-sm">DOKUMEN NOTARIS</p>
                        <p class="text-4xl">{{ $jumlahNotaris }}</p>
                    </div>
                    <div class="font-bold">Update Hari Ini</div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-20 h-20 text-center bg-white rounded-full ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-primary-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-row justify-between p-2 rounded-lg shadow-lg bg-secondary-500 gap-x-4 shadow-secondary-500">
                <div class="flex flex-col gap-y-4">
                    <div class="font-bold text-white">
                        <p class="text-sm">DOKUMEN PPAT</p>
                        <p class="text-4xl">{{ $jumlahPpat }}</p>
                    </div>
                    <div class="font-bold">Update Hari Ini</div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-20 h-20 text-center bg-white rounded-full ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-secondary-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-row justify-between p-2 rounded-lg shadow-lg bg-warning-500 gap-x-4 shadow-warning-500">
                <div class="flex flex-col gap-y-4">
                    <div class="font-bold text-white">
                        <p class="text-sm">SURAT MASUK</p>
                        <p class="text-4xl">{{ $jumlahSuratMasuk }}</p>
                    </div>
                    <div class="font-bold">Update Hari Ini</div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-20 h-20 text-center bg-white rounded-full ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-warning-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-row justify-between p-2 rounded-lg shadow-lg bg-success-500 gap-x-4 shadow-success-500">
                <div class="flex flex-col gap-y-4">
                    <div class="font-bold text-white">
                        <p class="text-sm">SURAT Keluar</p>
                        <p class="text-4xl">{{ $jumlahSuratKeluar }}</p>
                    </div>
                    <div class="font-bold">Update Hari Ini</div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-20 h-20 text-center bg-white rounded-full ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-success-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-4 gap-x-10">
            <div class="relative p-4 bg-white border shadow-md sm:rounded-lg">
                <div class="w-40">
                    <label for="tahunNotaris" class="sr-only">Tahun</label>
                    <select wire:model='tahunNotaris' wire:change='notarisTahunChange'
                        class="text-sm accent-primary-500 border-primary-300 text-primary-500 focus:border-primary-300 focus:ring focus:ring-primary-200">
                        <option value="">-- Pilih Tahun --</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div class="col-span-1 bg-white rounded-lg" style="height: 28rem;">
                    <livewire:livewire-column-chart :column-chart-model="$notaris" key="{{ $notaris->reactiveKey() }}">
                    </livewire:livewire-column-chart>
                </div>
            </div>
            <div class="relative p-4 bg-white border shadow-md sm:rounded-lg">
                <div class="w-40">
                    <label for="tahunPpat" class="sr-only">Tahun</label>
                    <select wire:model='tahunPpat' wire:change='notarisTahunChange'
                        class="text-sm accent-success-500 border-success-300 text-success-500 focus:border-success-300 focus:ring focus:ring-success-200">
                        <option value="">-- Pilih Tahun --</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div class="col-span-1 bg-white rounded-lg" style="height: 28rem;">
                    <livewire:livewire-column-chart :column-chart-model="$ppat" key="{{ $ppat->reactiveKey() }}">
                    </livewire:livewire-column-chart>
                </div>
            </div>
        </div>
    </div>
</div>