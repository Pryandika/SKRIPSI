
    <x-app-layout>
        {{-- Header --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dokter') }} / {{$currentUser}}
            </h2>
        </x-slot>
        
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                  <h3 class="card-title">Data Pasien </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">id</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Jalur</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users->where('tanggal_reservasi', $today)->whereNotNull('no_antrian')->sortBy('no_antrian') as $user)
                      <tr>
                        <td class="text-center">{{$user->id}}</td>
                        <td class="text-center">{{$user->name}}</td>
                        <td class="text-center">{{$user->alamat}}</td>
                        <td class="text-center">{{$user->jalur}}</td>
                        <td>
                          <div class="text-center">
                            <form method="POST" action="{{ route('laporan.update', $user->id) }}" class="inline">
                              @csrf
                              @method('PUT')
                            <button class="btn btn-danger" onclick="">
                              <a>Lewati</a>
                            </button>
                            </form>
                            <button type="button" value="{{$user->id}}" class="btn btn-default editbtn" >
                                Tambah Biaya
                              </button>
                            </div>
                            <form method="POST" action="{{ url('update-tarifdokter') }}" class="">
                              @csrf
                              @method('PUT')
                              <div class="modal fade" id="editModal">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Tarif Tindakan</h4>
                                    </div>
                                    <div class="modal-body">
                                <input type="hidden" name="id" id="id">
                                  <input id="name" name="name" class="font-semibold text-xl text-gray-800 leading-tight mb-2" disabled>
                                  <!-- /.Body -->
                                  <table class="table table-bordered" id="tabelTindakan">
                                    <thead>
                                      <tr>
                                        <th>Nama Tindakan</th>
                                        <th>Biaya</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <div hidden>{{$i=1}}</div>
                                      @foreach ($polatarifs as $index => $polatarif)
                                      <tr>
                                        <td>{{$polatarif->nama_pola}}</td>
                                        <td id="biayaKomaTabel{{$index}}"> 
                                          <input type="hidden" name="tabelBiaya{{$index}}" id="tabelBiaya{{$index}}" value="{{$polatarif->biaya}}">
                                        </td>
                                        <td><input class="cbox" type="checkbox" data-price="{{$polatarif->biaya}}" id="{{$polatarif->id_pola}}"></td>
                                      </tr>
                                      @endforeach
                            
                                    </tbody>
                                  </table>
                                  <input type="hidden" id="biaya" name="biaya"/>
                                  <div class="text-bold">Total Biaya:</div>
                                  <div class="" id="biayaKoma">Rp. 0</div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                                    </div>
                                  </form>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>

    </x-app-layout>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script>
$(function() {
  $(".cbox").on("change", function() {
    const vals = $(".cbox:checked")
      .map(function() {
        return +this.dataset.price;
      })
      .get();
    // test we have an array of values   
    const sum = vals.length > 0 ? vals.reduce((a, b) => a + b) : 0; // if no, zero sum
    const sumkoma = sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    $('#biaya').val(sum);

    // update total biaya
    $('#biayaKomaTabel').html('Rp.' + sumkoma);
    $('#biayaKoma').html('Rp.' + sumkoma);
  });
});


$(document).ready(function () {
  $(document).on('click', '.editbtn', function(){
    var user_id = $(this).val();

    // alert(user_id);
    $('#editModal').modal('show');

    $.ajax({
      type: "GET",
      url: "/edit-tarifdokter/" + user_id,
      success: function (response) {
        $('#id').val(response.user.id);
        $('#name').val(response.user.name);
        $('#biaya').val(response.user.biaya);
        console.log(response);
      }
    });

    // update koma pada tabel
    var table = document.getElementById("tabelTindakan");
    var tbodyRowCount = table.tBodies[0].rows.length;
    for (let index = 0; index < tbodyRowCount; index++){
      var angkaTabelKoma = document.getElementById('tabelBiaya'+[index]).value;
      const konfersiKoma = angkaTabelKoma.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById('biayaKomaTabel'+[index]).innerHTML = 'Rp. ' + konfersiKoma;
    }
  });
});

</script>
