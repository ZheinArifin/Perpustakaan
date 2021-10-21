<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anggota;

class LoginController extends Controller
{
    public function PostLogin (Request $request){
        $email     = $request->input('email');
        $password  = md5($request->input('password'));
        $cek = "Gagal";

        $users = User::where([
            ['email', '=', $email],
            ['password', '=', $password]
            ])->first();

        $anggota = Anggota::where([
            ['email', '=', $email],
            ['password', '=', $password]
            ])->first();    

        if(!empty($users->level)) {
            $request->session()->put('Nama', $users->nama);
            $request->session()->put('Id', $users->id);
          	$request->session()->put('Level', $users->level);
          	$request->session()->put('login', 'Berhasil');
            $cek = "Berhasil";
        }else {
            $request->session()->put('Nama', $anggota->nama);
            $request->session()->put('Id', $anggota->id);
          	$request->session()->put('Level', 'Anggota');
          	$request->session()->put('login', 'Berhasil');
            $cek = "Berhasil";
        }
            return redirect()->back()
            ->with("cek",$cek);
    }

    public function Logout(Request $request)
    {
        $request->session()->invalidate();
	    $request->session()->regenerateToken();
        return redirect('/');
    }
}
