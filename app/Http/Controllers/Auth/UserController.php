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
        $days = [
            [
                'day' => Carbon::now()->addDays(0)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(0)->format('l, d F Y')
            ],
            [
                'day' => Carbon::now()->addDays(1)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(1)->format('l, d F Y')
            ],
            [
                'day' => Carbon::now()->addDays(2)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(2)->format('l, d F Y')
            ],
            [
                'day' => Carbon::now()->addDays(3)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(3)->format('l, d F Y')
            ],
            [
                'day' => Carbon::now()->addDays(4)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(4)->format('l, d F Y')
            ],
            [
                'day' => Carbon::now()->addDays(5)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(5)->format('l, d F Y')
            ],
            [
                'day' => Carbon::now()->addDays(6)->format('d-m-Y'),
                'label' => Carbon::now()->addDays(6)->format('l, d F Y')
            ],

        ];
        
        

        $user = User::all();
        $klinik = Klinik::all();

        $auser = Auth::user();
        $maxAntri = User::where('klinik_tujuan', $auser->klinik_tujuan)->where('tanggal_reservasi', $auser->tanggal_reservasi)->max('no_antrian');

            if (is_null($auser->jalur)) {
                return redirect('/upload-file');
            }
            else{
                
                return view('dashboard', ['kliniks' => $klinik, 'days' => $days], compact('user', 'klinik'));
            }
        
    }

    public function show(): View
    {
        $klinik = Klinik::all();
        $user = User::all();
        $auser = Auth::user();
        $minAntri = User::where('klinik_tujuan', $auser->klinik_tujuan)->where('tanggal_reservasi', $auser->tanggal_reservasi)->min('no_antrian');

        return view('detailAntrian', compact('klinik', 'user', 'auser', 'minAntri'));
    }
    
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, $klinik): RedirectResponse
    {
        $id = Auth::id();
        $user = User::find($id);
        $user->no_antrian = $request->input('no_antrian');
        $user->klinik_tujuan = $klinik;
        $user->tanggal_reservasi = $request->input('tanggal_reservasi');




        // $user = Auth::user();
        // $user->no_antrian = $request->input('no_antrian');
        // $user->klinik_tujuan = $request->input('klinik_tujuan');
        // $request->user()->fill($request->validated());
        // $request->user()->save();
        if (is_null($user->tanggal_reservasi)) {
            return redirect()->back()->with('alert', 'Centang hari reservasi antrian');
        }
        elseif($user->no_antrian = $user->no_antrian) {
            return redirect()->back()->with('alert', 'Anda sudah daftar');
        }
        else{
            $user->save();
            return Redirect::route('detail');
        }
        
    }

}
