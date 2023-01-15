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
        {{-- Tabel User --}}
        <div class="relative w-1/2 border shadow-md sm:rounded-lg dark:border-gray-700">
            <div class="col-span-1 bg-white rounded-lg" style="height: 32rem;">
                <livewire:livewire-column-chart :column-chart-model="$columnChartModel">
                </livewire:livewire-column-chart>
            </div>
        </div>
        {{-- End Tabel User --}}
    </div>
</div>