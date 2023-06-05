<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="nama_klinik"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="row">
          <div class="col">
            <div class="modal-body">

              <!-- /.Body -->
              <form method="POST" action="{{ url('update-loket') }}" class="mt-6 space-y-6"> 
                @csrf 
                @method('PUT')
                <table class="table table-bordered">
                  <tbody>
                  <thead>
                    <tr>
                      <th>Nomor Antrian</th>
                      <th>Nama Pasien</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>                                          
                    <div class="h4" id="tujuan_susah">asd </div> ->where('role', '0')->where('klinik_tujuan', $klinik->nama_klinik)->where('tanggal_reservasi', $today) <tr>
                      {{$nama_klinik}} asd
                        <h1>{{$nama_klinik}}</h1>
                      @foreach ($users->where('role', '0')->where('klinik_tujuan', $tujuan) as $user) <tbody>
                      <td>{{$user->no_antrian+1}}</td>
                      <td>{{$user->name}}</td>
                      <td>
                        <button type="button" id="{{$user->id}}" value="{{$user->id}}" class="editbtn btn btn-default">Lanjutkan</button>
                      </td>
                    </tr> 
                    @endforeach
                  </tbody>
                  
                </table>
            </div>
          </div>
          <div class="col">
            <p class="h1 text-center mt-5 font-weight-bold">Antrian </p>

            <p class="h1 text-center mb-5 font-weight-bold"></p>
            {{-- {{$user->where('klinik_tujuan', $klinik->nama_klinik)->where('role', '0')->where('tanggal_reservasi', $today)->count()}} / {{$klinik->quota}} --}}
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <input type="text" name="id" id="id">
          <x-primary-button>{{ __('Lanjut Antrian') }}
          </x-primary-button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  