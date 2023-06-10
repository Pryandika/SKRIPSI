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

        if ($auser->tanggal_reservasi = 'NULL') {
            return redirect('/jalur');
        }
        else{
            return view('dashboard', ['users' => $user, 'kliniks' => $klinik, 'days' => $days], compact('user', 'klinik'));
        }
        
    }

    public function show(): View
    {
        $klinik = Klinik::all();
        $user = User::all();
        return view('detailAntrian', compact('klinik', 'user'));
    }
    
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->no_antrian = $request->input('no_antrian');
        $request->user()->fill($request->validated());
        $request->user()->save();

        return Redirect::route('detail');
    }

}
