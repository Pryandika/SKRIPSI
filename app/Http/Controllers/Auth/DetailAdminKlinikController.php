<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klinik;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Redirect;

class DetailAdminKlinikController extends Controller
{
    public function showDetailKlinik()
    {
        $user = User::all();
        $klinik = Klinik::all();
        return view('admin.detail.detailKlinik', ['users' => $user, 'kliniks' => $klinik]);
    }


    public function destroy($id)
    {
        Klinik::find($id)->delete();

        return Redirect::to('/admin/detail-klinik');
    }
}
