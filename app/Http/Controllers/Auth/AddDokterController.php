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



class AddDokterController extends Controller
{
    public function createDokter(): View
    {
        $klinik = Klinik::all();
        return view('admin.tambahDokter', ['kliniks' => $klinik]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addDokter(Request $request): RedirectResponse
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

        return redirect(RouteServiceProvider::ADMIN);
    }

    public function show()
    {

    }
}
