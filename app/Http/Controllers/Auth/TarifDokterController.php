<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Klinik;
use App\Models\Polatarif;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;

class TarifDokterController extends Controller
{
    public function showUser(Request $request)
    {
        $currentUser = $request->user()->klinik_tujuan;
        $user = User::select('*')
        ->where([
            ['role', '=', '0'],
            ['klinik_tujuan', '=', Auth::user()->klinik_tujuan]
        ])
        ->get();

        
        $polatarif = Polatarif::select('*')
        ->where('nama_klinik', '=', Auth::user()->klinik_tujuan)
        ->get();

        $klinik = Klinik::all();
        return view('tarifDokter', ['users' => $user, 'kliniks' => $klinik, 'polatarifs' => $polatarif, 'currentUser' =>$currentUser]);
    }

    public function showTambahDokter()
    {
        $user = User::all();
        $klinik = Klinik::all();
        return view('admin.tambahDokter', ['users' => $user, 'kliniks' => $klinik]);
    }

        /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $request->user()->save();

        return Redirect::route('detail');
    }

}
