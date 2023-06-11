<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class FileUploadController extends Controller
{
  public function createForm(){
    return view('file-upload');
  }
  public function fileUpload(Request $req){
        $req->validate([
        'ktp' => 'required|mimes:pdf|max:2048',
        'bpjs' => 'required|mimes:pdf|max:2048'
        ]);
        $id = Auth::id();
        $user = User::find($id);
        if($req->file()) {

            $fileName = time().'_'.$req->ktp->getClientOriginalName();
            $filePath = $req->file('ktp')->storeAs('uploads', $fileName, 'public');

            $fileName1 = time().'_'.$req->bpjs->getClientOriginalName();
            $filePath1 = $req->file('bpjs')->storeAs('uploads', $fileName1, 'public');

            $user->ktp = time().'_'.$req->ktp->getClientOriginalName();
            $user->file_path_ktp = '/storage/' . $filePath;

            $user->bpjs = time().'_'.$req->bpjs->getClientOriginalName();
            $user->file_path_bpjs = '/storage/' . $filePath1;

            $user->jalur = 'bpjs';
            $user->save();

            return redirect()->intended(RouteServiceProvider::HOME);
        }
   }
   
   public function jalurUmum()
   {
      $id = Auth::id();
      $user = User::find($id);

      $user->jalur = 'umum';
      $user->no_antrian = null;
      $user->save();
      return redirect()->intended(RouteServiceProvider::HOME);
   }
}