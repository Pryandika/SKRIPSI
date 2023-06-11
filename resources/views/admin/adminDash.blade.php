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

    <title>Admin RSUD Bangli</title>
</head>

<body>
    <x-app-layout>
        {{-- Header --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin') }}
            </h2>
        </x-slot>
        
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="py-3 px-10">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totuser }}</h3>
                                <p>Jumlah Pasien</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="{{ route('showdetailpasien')}}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="py-3 px-10">
                        <div class="small-box bg-gradient-success">
                            <div class="inner">
                                <h3>{{ $totklinik }}</h3>
                                <p>Jumlah Klinik</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <a href="{{ route('showdetailklinik')}}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="py-3 px-10">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h3>{{ $totdokter }}</h3>
                                <p>Jumlah Dokter</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <a href="{{ route('showdetaildokter')}}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                @include('admin.fitur.tabelAdmin')



    </x-app-layout>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>
