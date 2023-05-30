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
    public function showKlinik()
    {
        $today = Carbon::now()->format('l, d F Y');

        $user = User::all();
        $klinik = Klinik::all();
        $usercount = User::where('role', '0');
        
        return view('loket', ['users' => $user, 'kliniks' => $klinik], compact('usercount','today'));
        
    }

    public function modalLoket(Request $request)
    {
        $nama_klinik = $request->input('nama_klinik');
        $tujuan = User::where('loket_tujuan', $nama_klinik);
        dd($tujuan);
        return view('loket');
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
