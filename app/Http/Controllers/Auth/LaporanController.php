<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klinik;
use App\Models\Laporan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function showLaporan()
    {
        $today = Carbon::now()->format('l, d F Y');
        $user = User::all();
        $klinik = Klinik::all();
        $laporan = Laporan::all();


        return view('admin.laporan', ['users' => $user, 'kliniks' => $klinik, 'laporans' => $laporan]);
    }


    public function destroy($id)
    {
        $user = User::all();
        $klinik = Klinik::all();
        User::find($id)->delete();

        return Redirect::to('/admin/detail-dokter');
    }
}
