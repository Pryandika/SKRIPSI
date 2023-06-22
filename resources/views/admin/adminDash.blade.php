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

