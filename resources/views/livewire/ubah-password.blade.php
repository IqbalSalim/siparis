<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-primary-500 dark:text-white">
            {{ __('Password') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-primary-200">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
            <div>-</div>
            <div>Password</div>
        </div>
    </x-slot>


    <div id="content">
        <div class="px-6 py-4 bg-white rounded-lg dark:bg-gray-800">

            <h2 class="mb-2 text-xl font-semibold text-primary-500 dark:text-white">Ubah Password</h2>

            <form class="space-y-6" wire:submit.prevent="update" novalidate>
                @csrf
                <div class="flex flex-col space-y-4">
                    <div class="text-left" x-data="{ show: true }">
                        <label for="password_lama">Password Lama</label>
                        <div class="relative">
                            <input :type="show ? 'password' : 'text'" class="w-full mt-1" wire:model="password_lama"
                                id="password_lama">
                            <div class="absolute inset-y-0 right-0 flex items-center w-8 pr-3 text-sm leading-5">
                                <button type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" @click="show = !show"
                                        :class="{'hidden': !show, 'block':show }" class="w-6 h-6 text-gray-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                                <button type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" @click="show = !show"
                                        :class="{'block': !show, 'hidden':show }" class="w-6 h-6 text-gray-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <span class="text-sm text-red-600">
                            @error('password_lama')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-left" x-data="{ show: true }">
                        <label for="password">Password Baru</label>
                        <div class="relative">
                            <input :type="show ? 'password' : 'text'" class="w-full mt-1" wire:model="password"
                                id="password">
                            <div class="absolute inset-y-0 right-0 flex items-center w-8 pr-3 text-sm leading-5">
                                <button type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" @click="show = !show"
                                        :class="{'hidden': !show, 'block':show }" class="w-6 h-6 text-gray-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                                <button type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" @click="show = !show"
                                        :class="{'block': !show, 'hidden':show }" class="w-6 h-6 text-gray-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <span class="text-sm text-red-600">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="text-left" x-data="{ show: true }">
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                        <div class="relative">
                            <input :type="show ? 'password' : 'text'" class="w-full mt-1"
                                wire:model="password_confirmation" id="password_confirmation">
                            <div class="absolute inset-y-0 right-0 flex items-center w-8 pr-3 text-sm leading-5">
                                <button type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" @click="show = !show"
                                        :class="{'hidden': !show, 'block':show }" class="w-6 h-6 text-gray-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                                <button type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" @click="show = !show"
                                        :class="{'block': !show, 'hidden':show }" class="w-6 h-6 text-gray-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <span class="text-sm text-red-600">
                            @error('password_confirmation')
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