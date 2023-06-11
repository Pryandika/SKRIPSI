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
use Illuminate\Support\Facades\Auth;



class DetailAntrianController extends Controller
{
    public function show(): View
    {
        $klinik = Klinik::all();
        $user = User::all();
        $auser = Auth::user();
        return view('detailAntrian', compact('klinik', 'user', 'auser'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '2',
            'alamat' => '-',
            'lahir' => '1111-11-11',
            'hp' => '-',
            'klinik_tujuan' => $request->klinik_tujuan,
        ]);
        

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

}
