<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- jsGrid -->
  <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid-theme.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pasien</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <div hidden>{{$i=1}}</div>
                    @foreach ($users->where('role', 'user') as $user)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->alamat}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Dokter</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama</th>
                      <th>Klinik</th>
                    </tr>
                  </thead>
                  <tbody>
                    <div hidden>{{$j=1}}</div>
                    @foreach ($users->where('role', 'dokter') as $user)
                    <tr>
                      <td>{{$j++}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->klinik_tujuan}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grafik Kedatangan Pasien</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <h1>{{ $chart2->options['chart_title'] }}</h1>
                {!! $chart2->renderHtml() !!}
              </div>
              <!-- /.card-body -->
            </div>
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grafik User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <h1>{{ $chart1->options['chart_title'] }}</h1>
                {!! $chart1->renderHtml() !!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data klinik</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama</th>
                      <th>Jam Operasional</th>
                    </tr>
                  </thead>
                  <tbody>
                    <div hidden>{{$k=1}}</div>
                    @foreach ($kliniks as $klinik)
                    <tr>
                      <td>{{$k++}}</td>
                      <td>{{$klinik->nama_klinik}}</td>
                      <td>{{$klinik->jam_buka}} - {{$klinik->jam_tutup}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grafik Kedatangan Pasien</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <h1>{{ $chart3->options['chart_title'] }}</h1>
                {!! $chart3->renderHtml() !!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jsGrid -->
<script src="../../plugins/jsgrid/demos/db.js"></script>
<script src="../../plugins/jsgrid/jsgrid.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
  {!! $chart1->renderChartJsLibrary() !!}
  {!! $chart1->renderJs() !!}

  {!! $chart2->renderChartJsLibrary() !!}
  {!! $chart2->renderJs() !!}

  {!! $chart3->renderChartJsLibrary() !!}
  {!! $chart3->renderJs() !!}
</script>
</body>
</html>