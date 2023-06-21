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

<body class="hold-transition">
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title">Laporan Kunjungan Pasien</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Tanggal Reservasi</th>
                    <th class="text-center">Klinik Tujuan</th>
                    <th class="text-center">Jalur</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($laporans as $laporan)
                  <tr>
                    <td class="text-center">{{$laporan->name}}</td>
                    <td class="text-center">{{$laporan->tanggal_reservasi}}</td>
                    <td class="text-center">{{$laporan->klinik_tujuan}}</td>
                    <td class="text-center">{{$laporan->jalur}}</td>
                    <td class="text-center">{{$laporan->status}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </section>
<!-- ./wrapper -->
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</html>