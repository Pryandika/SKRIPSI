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
        $user = User::all();
        $klinik = Klinik::all();
        $laporan = Laporan::all();

        $date1 = $request->input('date1');
        $date2 = $request->input('date2');

        $newDate1 = new DateTime($date1);
        $newDate2 = new DateTime($date2);

        $laporanUpdated = Laporan::whereBetween('created_at', [
            $newDate1,
            Carbon::parse($newDate2)->endOfDay()
        ])->get();


        return view('admin.laporan', ['users' => $user, 'kliniks' => $klinik, 'laporans' => $laporan, 'laporanUpdateds' => $laporanUpdated]);
    }

    public function updateRangeLaporan(Request $request)
    {
        $today = Carbon::now()->format('l, d F Y');
        
        $date1 = Carbon::parse($request->input('date1'))->startOfDay();
        $date2 = Carbon::parse($request->input('date2'))->endOfDay();

        $newDate1 = new DateTime($date1);
        $newDate2 = new DateTime($date2);

        $laporanUpdated = Laporan::whereDate('created_at', '>=', $date1)
        ->whereDate('created_at', '<=', $date2)
        ->get();

        $user = User::all();
        $klinik = Klinik::all();
        $laporan = Laporan::all();

        // return response()->json($laporanUpdated);
        return view('admin.laporanSearch', ['users' => $user, 'kliniks' => $klinik, 'laporans' => $laporan], compact('laporanUpdated'));
    }

    public function destroy($id)
    {
        $user = User::all();
        $klinik = Klinik::all();
        User::find($id)->delete();

        return Redirect::to('/admin/detail-dokter');
    }
}
