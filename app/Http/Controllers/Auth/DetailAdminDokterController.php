<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klinik;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Stroage;

class DetailAdminDokterController extends Controller
{
    public function showDetailDokter()
    {
        $user = User::all();
        $klinik = Klinik::all();
        return view('admin.detail.detailDokter', ['users' => $user, 'kliniks' => $klinik]);
    }


    public function destroy($id)
    {
        $user = User::all();
        $klinik = Klinik::all();
        User::find($id)->delete();

        return Redirect::to('/admin/detail-dokter');
    }
}
