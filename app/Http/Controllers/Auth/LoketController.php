<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klinik;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LoketController extends Controller
{
    public function showKlinik(Request $request)
    {
        $today = Carbon::now()->format('l, d F Y');
        $nama_klinik = $request->input('nama_klinik_hide');
        $user = User::all();
        $klinik = Klinik::all();
        $usercount = User::where('role', '0');
        
        return view('loket', ['users' => $user, 'kliniks' => $klinik], compact('usercount','today', 'nama_klinik'));
        dd($nama_klinik);
    }

    public function modalLoket($klinik)
    {
        $today = Carbon::now()->format('l, d F Y');
        $nama_klinik = $klinik;
        $tujuan = User::where('loket_tujuan', $nama_klinik);
        $user = User::all();

        // dd($klinik);
        return view('layouts.model-loket', ['users' => $user], compact('nama_klinik', 'tujuan', 'today'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $user->klinik_tujuan = NULL;
        $user->tanggal_reservasi = NULL;
        $user->biaya = NULL;
        $user->no_antrian = NULL;
        $user->save();

        return Redirect::route('loket');
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json([
            'status'=>200,
            'user'=>$user,
        ]);
    }
}
