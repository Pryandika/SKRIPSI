<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Klinik;
use App\Models\Polatarif;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class TarifDokterController extends Controller
{
    public function showUser(Request $request)
    {
        $currentUser = $request->user()->klinik_tujuan;
        $user = User::all();
        $klinik = Klinik::all();
        $polatarif = Polatarif::all();
        return view('tarifDokter', ['users' => $user, 'kliniks' => $klinik, 'polatarifs' => $polatarif, 'currentUser' =>$currentUser]);
    }

    public function showTambahDokter()
    {
        $user = User::all();
        $klinik = Klinik::all();
        return view('admin.tambahDokter', ['users' => $user, 'kliniks' => $klinik]);
    }

}
