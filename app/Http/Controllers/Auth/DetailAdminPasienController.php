<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klinik;
use Illuminate\Support\Facades\Stroage;

class DetailAdminPasienController extends Controller
{
    public function showDetailPasien()
    {
        $user = User::all();
        $klinik = Klinik::all();
        return view('admin.detail.detailPasien', ['users' => $user, 'kliniks' => $klinik]);
    }

    public function viewKtp($id)
    {
        $data=User::find($id);
        return view('admin.detail.viewktp',compact('data'));
    }

    public function viewBpjs($id)
    {
        $data=User::find($id);
        return view('admin.detail.viewbpjs',compact('data'));
    }

    public function destroy($id)
    {
        
        $data=User::find($id);
        $data->delete();

        return view('admin.detail.detailPasien');
    }
    
}
