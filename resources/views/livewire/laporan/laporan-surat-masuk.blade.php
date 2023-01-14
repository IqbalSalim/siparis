<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-primary-500 dark:text-white">
            {{ __('Laporan Notaris') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-primary-200">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
            <div>-</div>
            <div>Laporan</div>
            <div>-</div>
            <div>Surat Masuk</div>
        </div>
    </x-slot>

    <div id="content">
        {{-- Tabel User --}}
        <div class="relative overflow-x-auto border shadow-md sm:rounded-lg dark:border-gray-700">
            <div class="p-4 bg-white dark:bg-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div>
                        <h2 class="mb-2 text-xl font-semibold text-primary-500 dark:text-white">Laporan Surat Masuk
                        </h2>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <a href="{{ route('cetak-surat-masuk',[$bulan_awal, $bulan_akhir, $tahun]) }}" target="_blank"
                            class="btn-danger btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 mr-1 -ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                            </svg>
                            Cetak PDF
                        </a>
                    </div>
                </div>
                <div class="flex flex-row items-center mt-2 gap-x-8">
                    <div>
                        <label for="bulan_awal" class="sr-only">Bulan Awal</label>
                        <select wire:model='bulan_awal' class="accent-secondary-500">
                            <option value="">-- Bulan Awal --</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div>
                        <label for="bulan_akhir" class="sr-only">Bulan Akhir</label>
                        <select wire:model='bulan_akhir' class="accent-secondary-500">
                            <option value="">-- Bulan Akhir --</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div>
                        <label for="tahun" class="sr-only">Tahun</label>
                        <select wire:model='tahun' class="accent-secondary-500">
                            <option value="">-- Pilih Tahun --</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn-secondary btn-icon" wire:click.defer='filter'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 mr-1 -ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                            </svg>
                            Filter
                        </button>
                    </div>
                </div>
            </div>

            @if ($surat_masuk->isNotEmpty())
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white uppercase bg-secondary-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No Agenda
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No Surat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Surat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Terima
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Asal Surat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Perihal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surat_masuk as $key => $row)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-bold uppercase text-secondary-500">
                            {{ $row->no_agenda }}
                        </td>
                        <td class="px-6 py-4 font-bold uppercase text-secondary-500">
                            {{ $row->no_surat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $row->tanggal_surat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $row->tanggal_terima }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $row->asal_surat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $row->perihal }}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @else
            <p class="px-4 py-2 mt-2 text-2xl font-bold text-center text-red-500 animate-pulse">
                Data tidak ditemukan!
            </p>
            @endif
        </div>
        {{-- End Tabel User --}}
    </div>
</div>