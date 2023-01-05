<div>
    <div x-show="createSuratKeluar"
        class="fixed top-0 left-0 right-0 z-50 flex items-center w-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-4xl p-4 mx-auto md:h-auto">
            <!-- Modal content -->
            <div
                class="relative my-auto transition duration-150 ease-in-out bg-white rounded-lg shadow dark:bg-gray-800">
                <button type="button" wire:click='closeForm()'
                    class="absolute top-3 right-2.5 text-danger-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-bold text-primary-500 ">Tambah Surat Keluar</h3>
                    <form class="space-y-4" wire:submit.prevent="store" novalidate>
                        @csrf
                        <div class="flex flex-col space-y-2">
                            <div class="flex items-center gap-x-4">
                                <div class="flex-1">
                                    <label for="no_surat">Nomor Surat</label>
                                    <input type="text" wire:model.defer='no_surat' class="mt-1">
                                    <span class="text-xs text-red-700">
                                        @error('no_surat')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <label for="tanggal_surat">Tanggal Surat</label>
                                    <input type="date" wire:model.defer='tanggal_surat' name="tanggal_surat"
                                        id="tanggal_surat" class="mt-1">
                                    <span class="text-xs text-red-700">
                                        @error('tanggal_surat')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div>
                                <label for="tujuan_surat">Tujuan Surat</label>
                                <input type="text" wire:model.defer='tujuan_surat' name="tujuan_surat" id="tujuan_surat"
                                    class="mt-1">
                                <span class="text-xs text-red-700">
                                    @error('tujuan_surat')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div>
                                <label for="perihal">Perihal</label>
                                <input type="text" wire:model.defer='perihal' name="perihal" id="perihal" class="mt-1">
                                <span class="text-xs text-red-700">
                                    @error('perihal')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div>
                                <label for="file">File Surat</label>
                                <input type="file" wire:model.defer='file' name="file" id="file" class="mt-1">
                                <span class="text-xs text-red-700">
                                    @error('file')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="w-full text-base btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>