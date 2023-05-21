<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klinik;

class LoketController extends Controller
{
    public function showKlinik()
    {
        $user = User::all();
        $klinik = Klinik::all();
        return view('loket', ['users' => $user, 'kliniks' => $klinik]);
    }
}
