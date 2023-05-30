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
                                                <small>{{$klinik->jam_buka}} - {{$klinik->jam_tutup}}</small> <br> <br>
                                                <br> <br>
                                                <button type="button"
                                                    onClick="klinik_value('{{ $klinik->nama_klinik }}', {{$klinik->id_klinik}})"
                                                    class="btn btn-outline-light btn-sm" data-toggle="modal"
                                                    data-target="#{{$klinik->id_klinik}}">
                                                    Pilih Hari</button>
                                            </div>
                                            <form method="post" action="{{ route('dashboard.update') }}"
                                                class="mt-6 space-y-6">
                                                @csrf
                                                @method('patch')

                                                <div class="modal bd-example-modal-lg" id="{{$klinik->id_klinik}}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="row">
                                                                    <input id="nama_klinik{{$klinik->id_klinik}}"
                                                                        name="klinik_tujuan"
                                                                        class="font-semibold text-xl text-gray-800 leading-tight mb-2">

                                                                </div>

                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="modal-body">
                                                                        <!-- /.Body -->

                                                                        @foreach($days as $day)
                                                                        <div class="position-relative p-3 bg-blue mt-1"
                                                                            style="height: 180px">
                                                                            <input type="checkbox"
                                                                                name="tanggal_reservasi"
                                                                                value="{{$day['label']}}"
                                                                                id="tanggal_reservasi">
                                                                            {{$day['day']}} <br>
                                                                            {{$day['label']}} <br> <br> <br> <br>
                                                                            Antrian:
                                                                            <input class="bg-blue font-semibold text-xl text-gray-800 leading-tight mb-2" name="no_antriana" id="no_antriana"
                                                                        value="{{$user->where('klinik_tujuan', $klinik->nama_klinik)->where('role', '0')->where('tanggal_reservasi', $day['label'])->count()}}">
                                                                        <button type="submit" class="btn btn-secondary position-absolute mb-4" name="no_antrian" id="no_antrian" value="{{$user->where('klinik_tujuan', $klinik->nama_klinik)->where('role', '0')->where('tanggal_reservasi', $day['label'])->count()}}"> DAFTAR </button>
                                                                        </div>

                                                                       
                                                                        @endforeach
                                                                        {{-- <div class="col"><p class="font-semibold text-xl text-gray-800 leading-tight mb-2"
                                                                          value="{{$user->where('klinik_tujuan', $klinik->nama_klinik)->where('role', '0')->count()}}">
                                                                          Kuota:{{$klinik->quota}}</p></div>    --}}
                                                                          
                                                                                                         
                                        
                                            </form>

                                        </div>
                                    </div>
    
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
    </x-app-layout>




</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
      var $checkboxes = $('input[type=checkbox]');

$checkboxes.change(function () {
    if (this.checked) {
        if ($checkboxes.filter(':checked').length == 1) {
            $checkboxes.not(':checked').prop('disabled', true);
        }
    } else {
        $checkboxes.prop('disabled', false);
    }
});

    function klinik_value(data, id) {
        var x = data;

        document.getElementById("nama_klinik" + id).innerHTML = x;
        document.getElementById("nama_klinik" + id).value = x;


    }

</script>
