<!-- Klinik -->
<div class="mt-4">
    <x-input-label for="klinik" :value="__('Klinik')" />
    <x-form-select name="klinik_tujuan" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
        @foreach ($kliniks as $klinik)
            <option name="klinik_tujuan" :value="old('{{$klinik->nama_klinik}}')">{{$klinik->nama_klinik}}</option>
        @endforeach
     </x-form-select>
    <x-input-error :messages="$errors->get('klinik_tujuan')" class="mt-2" />
</div>