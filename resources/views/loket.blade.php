<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <title>Admin</title>
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
                <div class="card card-primary">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
                      {{ __('List Klinik') }}
                    </h2>
                    <div class="row"> 
                      @foreach ($kliniks as $klinik) <div class="col-sm-4">
                        <div class="position-relative p-3 bg-blue mt-1 my-2" style="height: 180px">
                          <input hidden type="text" id="nama_klinik" name="nama_klinik" value="{{$klinik->nama_klinik}}">
                          {{$klinik->nama_klinik}}
                          <br>
                          <small>{{$klinik->jam_buka}} - {{$klinik->jam_tutup}}</small>

                          <form method="POST" action="{{ url('modal-loket') }}" class="mt-6 space-y-6"> 
                            @csrf 
                            @method('POST')
                          <input type="text" id="nama_klinik_hide" value="{{$klinik->nama_klinik}}">
                          <button type="submit" id="detail_klinik" value="{{$klinik->nama_klinik}}" class="btn btn-default showmodal"> Lihat Detail </button>
                          </form>
                        </div>
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
        // $('#editModal').modal('show');
        var nama_klinik = $(this).val();
        // document.getElementById("nama_klinik_hide").innerHTML = nama_klinik;
        // document.getElementById("nama_klinik_hide").value = nama_klinik;
        $.ajax({
          type: "GET",
          url: "/modal-loket/"+nama_klinik,
          success: function (response){
            console.log(response);
          }
        });
      });
      $(document).on('click', '.editbtn', function() {
        var user_id = $(this).val();
        $.ajax({
          type: "GET",
          url: "/edit-loket/" + user_id,
          success: function(response) {
            console.log(response);
            $('#id').val(response.user.id);
          }
        });
      });
    });
  </script>