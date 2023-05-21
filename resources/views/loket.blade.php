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
                                    @foreach ($kliniks as $klinik)
                                  <div class="col-sm-4">
                                    <div class="position-relative p-3 bg-blue mt-1" style="height: 180px">
                                        {{$klinik->nama_klinik}} <br>
                                      <small>{{$klinik->jam_buka}} - {{$klinik->jam_tutup}}</small> <br> <br> <br> <br>
                                      <button type="button" class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#modal-default">
                                        Detail Antrian</button>
                                    </div>
                                    <div class="modal fade bd-example-modal-lg" id="modal-default">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Klinik Gigi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="row">
                                            <div class="col">
                                          <div class="modal-body">
                                        <!-- /.Body -->
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th>Nama Pasien</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <div hidden>{{$i=1}}</div>
                                            @foreach ($users->where('role', '0' ) as $user)
                                            <tr>
                                              <td>{{$user->name}}</td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                          </div>
                                          <div class="col">
                                            <p class="h1 text-center mt-5 font-weight-bold">Antrian</p>
                                            <p class="h1 text-center mt-5 font-weight-bold">3/5</p>
                                          </div>
                                        </div>
                                          <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-outline-success">Lanjut Antrian</button>
                                          </div>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
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
                        <!-- /.row -->
                      <!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>