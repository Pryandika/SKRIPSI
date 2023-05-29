 <div>   
    <form method="POST" action="{{ route('tambahklinik') }}">
        @csrf

        <!-- Nama Klinik -->
        <div>
            <x-input-label for="nama_klinik" :value="__('Nama Klinik')" />
            <x-text-input id="nama_klinik" class="block mt-1 w-full" type="text" name="nama_klinik" :value="old('nama_klinik')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama_klinik')" class="mt-2" />
        </div>

        <!-- Quota -->
        <div>
            <x-input-label class="mt-1" for="quota" :value="__('Quota')" />
            <x-text-input id="quota" class="block mt-1 w-full" type="number" min="10" max="50" name="quota" :value="old('quota')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama_klinik')" class="mt-2" />
        </div>        

        <!-- Jam Buka -->
        <div class="mt-4">
            <x-input-label for="jam_buka" :value="__('Waktu Buka')" />
            <x-text-input id="jam_buka" class="block mt-1 w-full" type="time" name="jam_buka" :value="old('jam_buka')" required />
            <x-input-error :messages="$errors->get('jam_buka')" class="mt-2" />
        </div>

        <!-- Jam Tutup -->
        <div class="mt-4">
            <x-input-label for="jam_tutup" :value="__('Waktu tutup')" />
            <x-text-input id="jam_tutup" class="block mt-1 w-full" type="time" name="jam_tutup" :value="old('jam_tutup')" required />
            <x-input-error :messages="$errors->get('jam_buka')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Tambah Klinik') }}
            </x-primary-button>
        </div>

    </form>
</div>