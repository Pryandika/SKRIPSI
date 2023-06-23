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
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;

class TarifDokterController extends Controller
{
    public function showUser(Request $request)
    {
        $today = Carbon::now()->format('l, d F Y');
        $currentUser = Auth::user()->klinik_tujuan;
        $user = User::select('*')
        ->where([
            ['role', '=', '0'],
            ['klinik_tujuan', '=', Auth::user()->klinik_tujuan],
        ])
        ->whereNotNull('jalur')
        ->get();

        
        $polatarif = Polatarif::select('*')
        ->where('nama_klinik', '=', Auth::user()->klinik_tujuan)
        ->get();

        $klinik = Klinik::all();
        return view('tarifDokter', ['users' => $user, 'kliniks' => $klinik, 'polatarifs' => $polatarif ], compact('currentUser', 'today'));
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
    public function update(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);

        $laporan = Laporan::create([
            'name' => $user->name,
            'tanggal_reservasi' => $user->tanggal_reservasi,
            'klinik_tujuan' => $user->klinik_tujuan,
            'jalur' => $user->jalur,
            'status' => 'HADIR',
        ]);
        event(new Registered($laporan));

        $user->biaya = $request->input('biaya');
        $user->no_antrian = null;
        $user->estimasi_dilayani = null;
        $user->save();

        return Redirect::route('tarifdokter');
    }

    public function updateLaporan($id)
    {
        $user = User::find($id);
        
        $laporan = Laporan::create([
            'name' => $user->name,
            'tanggal_reservasi' => $user->tanggal_reservasi,
            'klinik_tujuan' => $user->klinik_tujuan,
            'jalur' => $user->jalur,
            'status' => 'TIDAK HADIR',
        ]);

        event(new Registered($laporan));
        $user->biaya = null;
        $user->no_antrian = null;
        $user->estimasi_dilayani = null;
        $user->save();

        return Redirect::route('tarifdokter');
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
