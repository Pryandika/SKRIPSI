<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Klinik;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AddKlinikController extends Controller
{
    public function createKlinik(): View
    {
        $klinik = Klinik::all();
        return view('admin.tambahKlinik', ['kliniks' => $klinik]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addKlinik(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_klinik' => ['required', 'string', 'max:255'],
            'quota' => ['required', 'numeric'],
            'jam_buka' => ['required'],
            'jam_tutup' => ['required'],
        ]);

        $klinik = Klinik::create([
            'nama_klinik' => $request->nama_klinik,
            'quota' => $request->quota,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'is_active' => '1',            
        ]);
        

        event(new Registered($klinik));

        return redirect(RouteServiceProvider::ADMIN);
    }
}
