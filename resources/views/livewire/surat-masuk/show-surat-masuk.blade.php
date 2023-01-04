<div>
    <div x-show="showSuratMasuk"
        class="fixed top-0 left-0 right-0 z-50 flex items-center w-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-4xl p-4 mx-auto md:h-auto">
            <!-- Modal content -->
            <div
                class="relative my-auto transition duration-150 ease-in-out bg-white rounded-lg shadow dark:bg-gray-800">
                <button type="button" wire:click='closeModal()'
                    class="absolute top-3 right-2.5 text-danger-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-bold text-primary-500 ">File Surat Masuk</h3>
                    <div class="flex flex-col space-y-4">
                        <div class="mt-1">
                            <div>
                                <embed class="w-full h-screen"
                                    src="{{ $result !== null ? asset('storage/'.$result->file) : '' }}"
                                    type="application/pdf" style="height: 70vh">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>