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
        <div class="grid grid-cols-2 gap-x-4">
            <div class="relative p-4 bg-white border shadow-md sm:rounded-lg">
                <div class="w-40">
                    <label for="tahunNotaris" class="sr-only">Tahun</label>
                    <select wire:model='tahunNotaris' wire:change='notarisTahunChange'
                        class="text-sm accent-secondary-500">
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
                    <label for="tahunNotaris" class="sr-only">Tahun</label>
                    <select wire:model='tahunNotaris' wire:change='notarisTahunChange'
                        class="text-sm accent-secondary-500">
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
        </div>
    </div>
</div>