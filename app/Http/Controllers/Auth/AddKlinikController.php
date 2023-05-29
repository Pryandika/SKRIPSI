<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Klinik;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;



class AddKlinikController extends Controller
{
    public function create(): View
    {
        $klinik = Klinik::all();
        return view('admin.tambahKlinik', ['kliniks' => $klinik]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'nama_klinik' => ['required', 'string', 'max:255'],
        //     'jam_buka' => ['required'],
        //     'jam_tutup' => ['required'],
        //     'status_klinik' => ['required', 'integer', 'max:255'],
        // ]);

        $klinik = Klinik::create([
            'nama_klinik' => $request->nama_klinik,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'status_klinik' => '1',            
        ]);
        

        event(new Registered($klinik));

        return redirect(RouteServiceProvider::ADMIN);
    }
}
