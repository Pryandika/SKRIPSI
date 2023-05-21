<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klinik;
use App\Models\Polatarif;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class PolaTarifController extends Controller
{

    public function create(): View
    {
        return view('admin.polaTarif');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_klinik' => ['required', 'string', 'max:255'],
            'nama_pola' => ['required', 'string', 'max:255'],
            'biaya' => ['required'],
        ]);

        $polatarif = Polatarif::create([
            'nama_klinik' => $request->klinik_tujuan,
            'nama_pola' => $request->nama_pola,
            'biaya' => $request->biaya,           
        ]);
        
        event(new Registered($polatarif));

        return redirect(RouteServiceProvider::ADMIN);
    }

    public function show()
    {
        $klinik = Klinik::all();
        return view('admin.polaTarif', ['kliniks' => $klinik]);
    }
}
