<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <title>Admin RSU Bangli</title>
  </head>

<body class="hold-transition sidebar-mini">
  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Detail Klinik') }}
      </h2>
    </x-slot>
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
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
                    <th class="text-center">Nama</th>
                    <th class="text-center">Quota</th>
                    <th class="text-center">Jam Operasional</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kliniks as $klinik)
                  <tr>
                    <td class="text-center">{{$klinik->nama_klinik}}</td>
                    <td class="text-center">{{$klinik->quota}}</td>
                    <td class="text-center">{{$klinik->jam_buka}} - {{$klinik->jam_tutup}}</td>
                    <td class="text-center">{{$klinik->is_active}}</td>
                    <td class="text-center">
                      <a href="{{ url('/admin/detail-klinik/delete/' . $klinik->id) }}" class="btn btn-xs btn-danger pull-right ">Delete</a>
                      <a href="{{ url('/admin/detail-klinik/status/' . $klinik->id . '/' . 1) }}" class="btn btn-xs btn-success pull-right ">Aktif</a>
                      <a href="{{ url('/admin/detail-klinik/status/' . $klinik->id. '/' . 0) }}" class="btn btn-xs btn-primary pull-right ">Non Aktif</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </section>
  </x-app-layout>
<!-- ./wrapper -->
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</html>