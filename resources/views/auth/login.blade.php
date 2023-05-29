<x-guest-layout>
    <div class="mx-auto my-2">
        <h1 class="fs-3">LOGIN</h1>
        <hr>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center mt-4 mb-4">
            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <hr>
    <div class="flex items-center mt-4 ml-3">
            <a class="underline text-sm text-gray-600 hover:text-gray-600 rounded-md">
                {{ __('Pengguna Baru?') }}
            </a>
    </div>

    <div class="flex items-center mt-2">
        <a href="{{ route('register') }}">
            <x-primary-button class="ml-3" href="/register">
                {{ ('Register') }}
            </x-primary-button>
        </a>
    </div>
</x-guest-layout>
