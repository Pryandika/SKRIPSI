<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Klinik;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Polatarif;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class PolaTarifController extends Controller
{

    public function createTarif(): View
    {
        $klinik = Klinik::all();
        return view('admin.polaTarif', ['kliniks' => $klinik]);
    }

    public function addTarif(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_klinik' => ['required', 'string', 'max:255'],
            'nama_pola' => ['required', 'string', 'max:255'],
            'biaya' => ['required'],
        ]);

        $polatarif = Polatarif::create([
            'nama_klinik' => $request->nama_klinik,
            'nama_pola' => $request->nama_pola,
            'biaya' => $request->biaya,           
        ]);
        
        event(new Registered($polatarif));

        return redirect(RouteServiceProvider::ADMIN);
    }
}
