<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <title>RSUD Bangli</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Loket') }}
        </h2>
      </x-slot>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- /.card-header -->
                <div class="card card-primary">
                  <div class="card-body">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
                      {{ __('List Klinik') }}
                    </h2>
                    <div class="row"> 
                      @foreach ($kliniks as $klinik) 
                      <div class="col-sm-4">
                        <div class="position-relative p-3 bg-blue mt-1 my-2" style="height: 180px">
                          <input hidden type="text" id="nama_klinik" name="nama_klinik" value="{{$klinik->nama_klinik}}">
                          {{$klinik->nama_klinik}}
                          <br>
                          <small>{{$klinik->jam_buka}} - {{$klinik->jam_tutup}}</small>

                          <input type="text" id="nama_klinik_hide" value="{{$klinik->nama_klinik}}">
                          <button type="text" data-toggle="modal" data-target="#modal-{{$klinik->nama_klinik}}"  class="btn btn-default"> Lihat Detail </button>
                        </div> 

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="modal-{{$klinik->nama_klinik}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                ...
                                <div class="row">
                                    <div class="col">
                                      <div class="modal-body">
                          
                                        <!-- /.Body -->

                                            <input type="text" id="nama_klinik_hide" value="{{$klinik->nama_klinik}}">
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
                                                   asd
                                                    <h1>{{$nama_klinik}}</h1>
                                                  @foreach ($users->where('role', '0')->where('klinik_tujuan', $klinik->nama_klinik) as $user) 
                                                  <form method="POST" action="{{ route('updateloket', [$user->id]) }}" class="mt-6 space-y-6"> 
                                                    @csrf 
                                                    @method('PUT')
                                                  <tbody>
                                                      <td>{{$user->no_antrian+1}}</td>
                                                      <td>{{$user->name}}</td>
                                                      <td>
                                                        <button type="button" id="{{$user->id}}" value="{{$user->id}}" data-value="{{$klinik->nama_klinik}}" class="editbtn btn btn-default">Lanjutkan</button>
                                                      </td>
                                                    </tr> 
                                                    <x-primary-button>{{ __('Lanjut Antrian') }}
                                                    </x-primary-button>
                                                  </tbody>
                                                </form>
                                                  @endforeach
                                            </table>
                                        </div>
                                      </div>
                                      <div class="col">
                                        <p class="h1 text-center mt-5 font-weight-bold">Antrian </p>
                          
                                        <p class="h1 text-center mb-5 font-weight-bold"></p>
                                        {{-- {{$user->where('klinik_tujuan', $klinik->nama_klinik)->where('role', '0')->where('tanggal_reservasi', $today)->count()}} / {{$klinik->quota}} --}}
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.modal -->

                        </div>
                      @endforeach
                     </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </x-app-layout>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <script>
    var $checkboxes = $('input[type=checkbox]');
    $checkboxes.change(function() {
      if (this.checked) {
        if ($checkboxes.filter(':checked').length == 1) {
          $checkboxes.not(':checked').prop('disabled', true);
        }
      } else {
        $checkboxes.prop('disabled', false);
      }
    });

    $(document).ready(function() {
      $(document).on('click', '.showmodal', function() {

        var nama_klinik = $(this).val();
        document.getElementById("nama_klinik_hide").innerHTML = nama_klinik;
        document.getElementById("nama_klinik_hide").value = nama_klinik;
      });

        
      $(document).on('click', '.editbtn', function() {
        var user_id = $(this).val();
        var klinik = $(this).attr("data-value");
        $.ajax({
          type: "GET",
          url: "/edit-loket/" + user_id,
          success: function(response) {
            console.log(klinik);
            document.getElementById(klinik).value = response.user.id;
          }
        });
      });
    });
  </script>