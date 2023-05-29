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

    <title>Dashboard User</title>
    @livewireStyles
</head>

<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                            <div class="card card-primary">
                              <!-- /.card-header  onclick="location.href='{url('detail') }'" -->
                              <div class="card-body">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
                                    {{ __('List Klinik') }}
                                </h2>
                                <div class="row">
                                    @foreach ($kliniks as $klinik)
                                  <div class="col-sm-4 mt-3">
                                    <div hidden> 
                                      <x-text-input id="klinik_tujuan" class="block mt-1 w-full" type="text" name="klinik_tujuan" :value="old('klinik_tujuan', $klinik->nama_klinik)" required autofocus autocomplete="klinik_tujuan" />
                                    </div>
                                    <div class="position-relative p-3 bg-blue mt-1" style="height: 180px">
                                        {{$klinik->nama_klinik}} <br>
                                      <small>{{$klinik->jam_buka}} - {{$klinik->jam_tutup}}</small> <br> <br> <br> <br>
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        Pilih Hari</button>
                                    </div>
                                  </div>
                                  @endforeach

                               <!-- Modal input start -->  
                               <form method="post" action="{{ route('dashboard.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')                           
                                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content px-4 py-4">
                                        @foreach($days as $day)
                                          <div class="position-relative p-3 bg-blue mt-1" style="height: 180px">
                                            <input type="checkbox" value="{{$day['label']}}" id="flexCheckDefault">
                                              {{$day['day']}} <br>
                                            {{$day['label']}} <br> <br> <br> <br>
                                          </div>
                                        @endforeach
                                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@livewireScripts
</body>

</html>
