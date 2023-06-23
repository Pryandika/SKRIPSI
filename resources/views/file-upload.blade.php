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
            <div class="custom-file mb-2">
                <input type="file" name="ktp" class="custom-file-input ktp" id="ktp">
                <label class="custom-file-label label-ktp" for="chooseFile">Select File</label>
            </div>

            <button type="button" class="items-center px-4 py-2 bg-blue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest mb-4" data-toggle="modal" data-target=".modal-ktp">Contoh File KTP</button>
            <div class="modal fade bd-example-modal-lg modal-ktp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div>
                    <img src="{{ asset('storage/images/ktp.jpeg') }}" alt="kartu-ktp" title="kartu-ktp">
                  </div>
                </div>
              </div>
            </div>

            <x-input-label for="name" :value="__('BPJS/KIS')" />
            <div class="custom-file mb-2">
                <input type="file" name="bpjs" class="custom-file-input bpjs" id="bpjs">
                <label class="custom-file-label label-bpjs" for="chooseFile1">Select File</label>
            </div>

            <button type="button" class="items-center px-4 py-2 bg-blue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest mb-4" data-toggle="modal" data-target=".modal-bpjs">Contoh File BPJS/KIS</button>
            <div class="modal fade bd-example-modal-sm modal-bpjs" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                  <div>
                    <img src="{{ asset('storage/images/bpjs.jpg') }}" alt="kartu-bpjs" title="kartu-bpjs">
                  </div>
                </div>
              </div>
            </div>

            <button type="submit" name="submit" class="items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 btn-block mt-4">
                Upload & Daftar BPJS
            </button>
         </form>
        
        <a class="text-center items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 btn-block mt-4" href="{{ route('jalurUmum') }}">UMUM</a>

    </div>
</x-app-layout>

<script>
  document.querySelector('.ktp').onchange = function () {
    document.querySelector('.label-ktp').innerHTML = this.value.replace(/.*[\/\\]/, '');
};
document.querySelector('.bpjs').onchange = function () {
    document.querySelector('.label-bpjs').innerHTML = this.value.replace(/.*[\/\\]/, '');
};
</script>