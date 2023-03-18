<x-guest-layout>
    <div class="container mx-auto">
        <div class="mx-auto mb-6 w-full rounded-lg bg-white/60 p-6 shadow-lg dark:bg-gray-800 md:w-1/2">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="w-full" method="POST" action="{{ route('register') }}">
                <div class="grid gap-6 md:grid-cols-2">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-label class="text-gray-600" for="name" :value="__('Nama Lengkap')" />

                        <x-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')"
                            required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-label class="text-gray-600" for="email" :value="__('Alamat E-Mail')" />

                        <x-input id="email" class="mt-1 block w-full" type="email" name="email"
                            :value="old('email')" required />
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2">

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label class="text-gray-600" for="password" :value="__('Kata Sandi')" />

                        <x-input id="password" class="mt-1 block w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label class="text-gray-600" for="password_confirmation" :value="__('Ulangi Kata Sandi')" />

                        <x-input id="password_confirmation" class="mt-1 block w-full" type="password"
                            name="password_confirmation" required />
                    </div>
                </div>

                {{-- Wa dan paket --}}
                <div class="mb-6 grid gap-6 md:grid-cols-2">

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label class="text-gray-600" for="phone" :value="__('No. Whatsapp')" />

                        <x-input id="phone" class="mt-1 block w-full" type="text" name="phone" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label class="text-gray-600" for="city" :value="__('Kota Asal')" />

                        <x-input id="city" class="mt-1 block w-full" type="text" name="city" required />
                    </div>
                </div>


                <div class="mt-3 grid">
                    <button type="submit"
                        class="inline-flex items-center rounded-md border border-transparent border-amber-500 bg-amber-500 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white text-gray-100 ring-gray-300 transition duration-150 ease-in-out hover:border-amber-600 hover:bg-amber-600 hover:text-white hover:ring-0 focus:border-gray-900 focus:border-amber-600 focus:bg-amber-600 focus:outline-none focus:outline-none focus:ring focus:ring-0 active:bg-gray-900 disabled:opacity-25">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-box-arrow-in-right mr-3 inline-block h-4 w-4 ltr:mr-2 rtl:ml-2"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z">
                            </path>
                        </svg>
                        Daftar
                    </button>
                </div>

                <div class="mt-3">
                    <p class="mb-4 text-center">Sudah punya akun?
                        <a class="hover:text-indigo-500" href="{{ route('login') }}">
                            Masuk Disini
                        </a>
                    </p>
                </div>
                {{-- <div class="mt-4 flex items-center justify-end">
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
    
                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div> --}}
            </form>
        </div>
    </div>
</x-guest-layout>
