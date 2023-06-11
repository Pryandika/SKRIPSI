<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <title>Dokter</title>
</head>

<body>
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
                      @foreach ($users->sortBy('no_antrian') as $user)
                      <tr>
                        <td class="text-center">{{$user->id}}</td>
                        <td class="text-center">{{$user->name}}</td>
                        <td class="text-center">{{$user->alamat}}</td>
                        <td class="text-center">{{$user->jalur}}</td>
                        <td>
                          <div class="text-center">
                            <button type="button" value="{{$user->id}}" class="btn btn-default editbtn" >
                                Tambah Biaya
                              </button>
                            </div>
                            <form method="POST" action="{{ url('update-tarifdokter') }}" class="mt-6 space-y-6">
                              @csrf
                              @method('PUT')
                              <div class="modal fade" id="editModal">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Tarif Tindakan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                <input type="hidden" name="id" id="id">
                                  <input id="name" name="name" class="font-semibold text-xl text-gray-800 leading-tight mb-2" disabled>
                                  <!-- /.Body -->
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Nama Tindakan</th>
                                        <th>Biaya</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <div hidden>{{$i=1}}</div>
                                      @foreach ($polatarifs as $polatarif)
                                      <tr>
                                        <td>{{$polatarif->nama_pola}}</td>
                                        <td>{{$polatarif->biaya}}</td>
                                        <td><input class="cbox" type="checkbox" data-price="{{$polatarif->biaya}}" id="{{$polatarif->id_pola}}"></td>
                                      </tr>
                                      @endforeach
                            
                                    </tbody>
                                  </table>
                                  <input type="text" id="biaya" name="biaya"/>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>

<script>
  $(function() {
  $(".cbox").on("change", function() {
    const vals = $(".cbox:checked")
      .map(function() {
        return +this.dataset.price
      })
      .get();
    // test we have an array of values
    const sum = vals.length>0 ? vals.reduce((a, b) => a + b) : 0; // if no, zero sum
    $('#biaya').val(sum)
  })
})


    $(document).ready(function () {

      $(document).on('click', '.editbtn', function(){
        
        var user_id = $(this).val();
        //alert(user_id);
        $('#editModal').modal('show');

        $.ajax({
          type: "GET",
          url: "/edit-tarifdokter/"+user_id,
          success: function (response){
            console.log(response);
            $('#id').val(response.user.id);
            $('#name').val(response.user.name);
            $('#biaya').val(response.user.biaya);
          }
        });
      });
    });
</script>
