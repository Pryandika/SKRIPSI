<div>   
    <form method="POST" action="{{ route('polatarif') }}">
        @csrf

        <!-- Nama Klinik -->
        <div class="mt-4">
            <x-input-label for="klinik" :value="__('Klinik')" />
            <x-form-select name="nama_klinik" class="block py-2 px-2 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                @foreach ($kliniks as $klinik)
                    <option name="nama_klinik" :value="old('{{$klinik->nama_klinik}}')">{{$klinik->nama_klinik}}</option>
                @endforeach
            </x-form-select>
            <x-input-error :messages="$errors->get('nama_klinik')" class="mt-2" />
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