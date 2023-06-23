<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Klinik;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function showKlinik()
    {
        $day = [
            [
                'day' => Carbon::now()->addDays(1)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(1)->format('l, d F Y'),
                'hari' => Carbon::now()->addDays(1)
            ],
            [
                'day' => Carbon::now()->addDays(2)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(2)->format('l, d F Y'),
                'hari' => Carbon::now()->addDays(2)
            ],
            [
                'day' => Carbon::now()->addDays(3)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(3)->format('l, d F Y'),
                'hari' => Carbon::now()->addDays(3)
            ],
            [
                'day' => Carbon::now()->addDays(4)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(4)->format('l, d F Y'),
                'hari' => Carbon::now()->addDays(4)
            ],
            [
                'day' => Carbon::now()->addDays(5)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(5)->format('l, d F Y'),
                'hari' => Carbon::now()->addDays(5)
            ],
            [
                'day' => Carbon::now()->addDays(6)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(6)->format('l, d F Y'),
                'hari' => Carbon::now()->addDays(6)
            ],
            [
                'day' => Carbon::now()->addDays(7)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(7)->format('l, d F Y'),
                'hari' => Carbon::now()->addDays(7)
            ],

        ];
        $user = User::all();
        $klinik = Klinik::all();

        $auser = Auth::user();

        $minAntri = User::where('klinik_tujuan', $auser->klinik_tujuan)->where('tanggal_reservasi', $auser->tanggal_reservasi)->min('no_antrian');
        $sisaAntri = Auth::user()->no_antrian - $minAntri;
        $waktuSekarang = Carbon::now()->format('d F Y');

        $hariIni = Carbon::now();
        

        $maxAntri = User::where('klinik_tujuan', $auser->klinik_tujuan)->where('tanggal_reservasi', $auser->tanggal_reservasi)->max('no_antrian');

            if (is_null($auser->jalur)) {
                return redirect('/upload-file');
            }
            else{
                return view('dashboard', ['kliniks' => $klinik, 'days' => $day], compact('user', 'klinik', 'auser', 'hariIni', 'waktuSekarang'));
            }
        
    }

    public function show(): View
    {
        $klinik = Klinik::all();
        $user = User::all();
        $auser = Auth::user();
        $minAntri = User::where('klinik_tujuan', $auser->klinik_tujuan)->where('tanggal_reservasi', $auser->tanggal_reservasi)->min('no_antrian');
        $sisaAntri = Auth::user()->no_antrian - $minAntri;
        $tambahanWaktuAntri = $sisaAntri * 5;

        $estimasiAntri = $sisaAntri * 5;

        return view('detailAntrian', compact('klinik', 'user', 'auser', 'minAntri', 'sisaAntri', 'estimasiAntri'));
    }
    
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, $klinik)
    {
        $id = Auth::id();
        $userall = User::all();
        $klinikT = Klinik::where('nama_klinik', $klinik)->first();
        $user = User::find($id);
        $antrian = $userall->where('klinik_tujuan', $klinik)->where('role', 'user')->where('tanggal_reservasi', $user->tanggal_reservasi)->whereNotNull('no_antrian')->count();
        $user->no_antrian = $request->input('no_antrian');
        $user->estimasi_dilayani = Carbon::create($klinikT->jam_buka)->addMinute($antrian*10)->format('H:i:s');
        $user->klinik_tujuan = $klinik;
        $user->tanggal_reservasi = $request->input('tanggal_reservasi');

        // return response()->json($estimasi_dilayani);

        $request->user()->save();


            $user->save();
            return Redirect::route('detail');

        
    }

}
