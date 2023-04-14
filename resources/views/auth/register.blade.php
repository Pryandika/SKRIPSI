<x-guest-layout>
    <div class="mx-auto my-2">
        <h1 class="fs-3">REGISTER</h1>
        <hr>
    </div>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Username (Email)')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Nama Pasien -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nama Pasien')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>        

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>       
        
        <!-- Tanggal Lahir -->
        <div class="mt-4">
            <x-input-label for="lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="lahir" class="block mt-1 w-full" type="text" name="lahir" :value="old('lahir')" required autofocus autocomplete="lahir" />
            <x-input-error :messages="$errors->get('lahir')" class="mt-2" />
        </div>    
        
        <!-- No HP -->
        <div class="mt-4">
            <x-input-label for="hp" :value="__('No HP')" />
            <x-text-input id="hp" class="block mt-1 w-full" type="text" name="hp" :value="old('hp')" required autofocus autocomplete="hp" />
            <x-input-error :messages="$errors->get('hp')" class="mt-2" />
        </div>       

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
