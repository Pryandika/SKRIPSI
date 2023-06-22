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
