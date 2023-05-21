<div>   
    <form method="POST" action="{{ route('addTarif') }}">
        @csrf

        <!-- Nama Klinik -->
        <div>
            <x-input-label class="mt-5" for="klinik_tujuan" :value="__('Nama Klinik')" />
            <x-text-input id="klinik_tujuan" class="block mt-1 w-full" type="text" name="klinik_tujuan" :value="old('klinik_tujuan')" required autofocus autocomplete="nama_pola" />
            <x-input-error :messages="$errors->get('klinik_tujuan')" class="mt-2" />
        </div>

        <!-- Nama Tindakan -->
        <div>
            <x-input-label class="mt-5" for="nama_pola" :value="__('Nama Tindakan')" />
            <x-text-input id="nama_pola" class="block mt-1 w-full" type="text" name="nama_pola" :value="old('nama_pola')" required autofocus autocomplete="nama_pola" />
            <x-input-error :messages="$errors->get('nama_pola')" class="mt-2" />
        </div>

        <!-- Biaya Tindakan -->
        <div>
            <x-input-label class="mt-5" for="biaya" :value="__('Biaya Tindakan')" />
            <x-text-input id="biaya" class="block mt-1 w-full" type="text" name="biaya" :value="old('biaya')" required autofocus autocomplete="biaya" />
            <x-input-error :messages="$errors->get('biaya')" class="mt  -2" />
        </div>        

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Tambah Pola') }}
            </x-primary-button>
        </div>

    </form>
</div>