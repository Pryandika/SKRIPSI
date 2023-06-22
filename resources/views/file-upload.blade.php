    <x-app-layout>
        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload File') }}
          </h2>
        </x-slot>
    
    <div class="container mt-5">
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-5 h2">Pilih Jalur Antrian</h2>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <x-input-label for="name" :value="__('KTP')" />
            <div class="custom-file mb-5">
                <input type="file" name="ktp" class="custom-file-input" id="ktp">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>

            <x-input-label for="name" :value="__('BPJS')" />
            <div class="custom-file mb-5">
                <input type="file" name="bpjs" class="custom-file-input" id="bpjs">
                <label class="custom-file-label" for="chooseFile1">Select file</label>
            </div>

            <button type="submit" name="submit" class="items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 btn-block mt-4">
                Upload & Daftar BPJS
            </button>
         </form>
        
        <a class="text-center items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 btn-block mt-4" href="{{ route('jalurUmum') }}">UMUM</a>

    </div>
</x-app-layout>