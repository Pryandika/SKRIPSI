  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Detail Dokter') }}
      </h2>
    </x-slot>
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title">Data Dokter </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Klinik</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users->where('role', 'dokter') as $user)
                  <tr>
                    <td class="text-center">{{$user->name}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td class="text-center">{{$user->klinik_tujuan}}</td>
                    <td class="text-center"><a href="{{ url('/admin/detail-dokter/delete/' . $user->id) }}" class="btn btn-xs btn-danger pull-right ">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </section>
  </x-app-layout>
