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
use DateTime;

class LaporanController extends Controller
{
    public function showLaporan(Request $request)
    {
        $today = Carbon::now()->format('l, d F Y');
        $user = User::all();
        $klinik = Klinik::all();
        $laporan = Laporan::all();

        $date1 = $request->input('date1');
        $date2 = $request->input('date2');

        $newDate1 = new DateTime($date1);
        $newDate2 = new DateTime($date2);

        $laporanUpdated = Laporan::whereBetween('tanggal_reservasi', [
            $newDate1->format('l, d F Y'),
            $newDate2->format('l, d F Y'),
        ])->get();


        return view('admin.laporan', ['users' => $user, 'kliniks' => $klinik, 'laporans' => $laporan, 'laporanUpdateds' => $laporanUpdated]);
    }

    public function updateRangeLaporan(Request $request)
    {
        $today = Carbon::now()->format('l, d F Y');
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');

        $newDate1 = new DateTime($date1);
        $newDate2 = new DateTime($date2);

        $laporanUpdated = Laporan::whereBetween('tanggal_reservasi', [
            $newDate1->format('l, d F Y'),
            $newDate2->format('l, d F Y'),
        ])->get();
        $user = User::all();
        $klinik = Klinik::all();
        $laporan = Laporan::all();

        // return response()->json($laporanUpdated);
        return view('admin.laporan', ['users' => $user, 'kliniks' => $klinik, 'laporans' => $laporan, 'laporanUpdateds' => $laporanUpdated]);
    }

    public function destroy($id)
    {
        $user = User::all();
        $klinik = Klinik::all();
        User::find($id)->delete();

        return Redirect::to('/admin/detail-dokter');
    }
}
