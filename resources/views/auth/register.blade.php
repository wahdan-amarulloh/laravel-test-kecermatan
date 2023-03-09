<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="h-20 w-20 fill-current text-gray-500" /> --}}
                <h1 class="font-mono text-4xl font-extrabold text-white">Pendaftaran Pengguna Baru</h1>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-label class="text-white" for="name" :value="__('Name')" />

                <x-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label class="text-white" for="email" :value="__('Email')" />

                <x-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label class="text-white" for="password" :value="__('Password')" />

                <x-input id="password" class="mt-1 block w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label class="text-white" for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="mt-1 block w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="mt-3 grid">
                <x-button type="submit"
                    class="inline-block rounded border border-amber-500 bg-amber-500 py-2 px-4 text-center leading-normal text-gray-100 hover:border-amber-600 hover:bg-amber-600 hover:text-white hover:ring-0 focus:border-amber-600 focus:bg-amber-600 focus:outline-none focus:ring-0">
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
                    Register
                </x-button>
            </div>

            <div class="mt-3">
                <p class="mb-4 text-center">Already have an account?
                    <a class="hover:text-indigo-500" href="{{ route('login') }}">
                        Login
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
    </x-auth-card>
</x-guest-layout>
