  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Detail Pasien') }}
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
              <div class="table-responsive-lg">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Nomor Hp</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">KTP</th>
                      <th class="text-center">BPJS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users->where('role', 'user') as $user)
                    <tr>
                      <td class="text-center">{{$user->name}}</td>
                      <td class="text-center">{{$user->alamat}}</td>
                      <td class="text-center">{{$user->hp}}</td>
                      <td class="text-center">{{$user->email}}</td>
                      <td class="text-center"><a href="{{ url('/admin/detail-pasien/view/ktp/' . $user->id) }}" target="_blank" class="btn btn-xs btn-info pull-right ">View KTP</a></td>
                      <td class="text-center"><a href="{{ url('/admin/detail-pasien/view/bpjs/' . $user->id) }}" target="_blank" class="btn btn-xs btn-info pull-right ">View BPJS</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </section>
  </x-app-layout>
